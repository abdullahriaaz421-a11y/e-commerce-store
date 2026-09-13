<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Repositories\Interfaces\ContactInterface;

class ContactController extends Controller
{
    public function __construct(private ContactInterface $contactRepo) {}
    public function index()
    {
        return view('web.contact');
    }

    public function sendContactMessage(ContactRequest $request)
    {
        return $this->contactRepo->sendContactMessage($request->validated());
    }
}
