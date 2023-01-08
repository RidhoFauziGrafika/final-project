<?php

namespace App\Http\Controllers;

use App\Mail\ContactMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        // $data = array(
        //     'email' => $request->email,
        //     'name' => $request->name,
        //     'subject' => $request->subject,
        //     'email_body' => $request->email_body
        // );

        $validatedData = $request->validate([
            'email' => 'required|email',
            'name' => 'required|max:255',
            'subject' => 'required|max:255',
            'email_body' => 'required|max:255',
        ]);

        Mail::to('renfieeld@gmail.com')->send(new ContactMe($validatedData));

        return redirect('/contact')->with('flash', 'Message send successfully');
    }

    public function sendEmailToCustomer(Request $request)
    {
        $email = $request->email;
        // $subject = $request->subject;
        $data = array(
            // 'email' => $request->email, 
            'name' => $request->name,
            'subject' => $request->subject,
            'email_body' => $request->email_body
        );

        Mail::send('email_template', $data, function ($mail) use ($email) {
            $mail->from('renfieeld@gmail.com', 'Testing');
            $mail->to($email, 'no reply')->subject("tes");
        });

        if (Mail::flushMacros()) {
            return 'Gagal Mengirim pesan';
        }

        return redirect('/reply')->with('flash', 'Message send successfully');
    }
}
