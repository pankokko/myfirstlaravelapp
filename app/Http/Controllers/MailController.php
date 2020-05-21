<?php

namespace App\Http\Controllers;

use App\Mail\CotactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{

    public function index()
    {
        return view('contact.send');
    }


    public function store(Request $request)
    {
        $contact = $request->all();
        Mail::to($contact->email)->send(new ContactMail($contact));
    }
}
