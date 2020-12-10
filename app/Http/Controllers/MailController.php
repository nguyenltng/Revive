<?php


namespace App\Http\Controllers;


use App\Factories\FileImportFactory;
use App\Http\Requests\MailRequest;
use App\Mail\sendMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController
{
    /**
     * @param MailRequest $request
     * @throws \Exception
     */
    function send(MailRequest $request)
    {
        $fileImport = new FileImportFactory();
        $data = (new ImportFileController($fileImport))->read($request);

        $this->sendTo($request, $data);
    }

    function sendTo(MailRequest $request, Array $user)
    {
        foreach ($user as $item) {
            $data = array(
                'name' => $item['name'],
                'message' => $request->get('message')
            );
            Mail::to($item['email'])
                ->send(new sendMail($data));
        }

        return response()->json([
            'message' => 'Send email success !!',
        ], 200);

    }

}
