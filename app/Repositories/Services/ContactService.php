<?php

namespace App\Repositories\Services;

use App\Mail\ContactMail;
use App\Repositories\Interfaces\ContactInterface;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactService implements ContactInterface
{
    public function __construct()
    {
        //
    }
    public function sendContactMessage(array $data)
    {
        Contact::create($data);
        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($data));
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

}
