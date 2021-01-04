<?php


namespace App\Http\Controllers;


use App\Mail\sendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController
{
    function send(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'     => 'required',
            'email'    => 'required|email',
            'message' => 'required',
        ]);
        if($validator->failed()){
            return response()->json([
                'message' => $validator->messages()->toJson(),
            ], 422);
        }else{
            $data = array(
                'name' => $request->get('name'),
                'message' => $request->get('message')
            );
            Mail::to($request->get('email'))
                ->send(new sendMail($data));
            return response()->json([
                'message' => 'Send email success !!',
            ], 200);
        }

    }

}
