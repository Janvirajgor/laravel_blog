<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function sendingmail(Request $request)
    {
        $data = ["Welcome: " . $request->name];
        $user['to'] = $request->email;

        Mail::send('emails.maildata', $data, function ($mesaage) use ($user) {
            $mesaage->to($user['to']);
            $mesaage->subject('Helo This is demo for email sending in laravel');
        });
        return "mail Send success";
    }
}
