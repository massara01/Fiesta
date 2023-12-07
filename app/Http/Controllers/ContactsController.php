<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use App\Mail\ContactMail;

class ContactsController extends Controller
{
    public function view(){
        return view('front.contact');
    }

    public function send(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $from_message = $request->input('message');

        // Send email using Laravel's built-in email functionality
        Mail::send(new ContactMail($name, $email, $phone, $from_message));

        // Redirect the user back to the contact form with a success message
        return redirect()->back()->with('success', 'Votre Message est envoyé');
    }
}
