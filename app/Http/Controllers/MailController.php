<?php


namespace App\Http\Controllers;


use App\Http\Requests\MailRequest;
use App\Mail\sendMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController
{
    function send(MailRequest $request)
    {
        $users[] = User::query()->find(5)->toArray();
        $this->sendTo($request, $users);
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
