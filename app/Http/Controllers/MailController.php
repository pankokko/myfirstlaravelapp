<?php

namespace App\Http\Controllers;

use App\Mail\SampleMail;
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
        $contact = $request;
        Mail::to($contact->email)->send(new SampleMail($contact));
    }
}
