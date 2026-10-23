<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('pages.contact');
    }

    public function send(Request $request)
    {
        // Honeypot: real visitors leave this empty, bots fill it in.
        if ($request->filled('website')) {
            return redirect()->route('contact')->with('success', 'Thanks for your message!');
        }

        $data = $request->validate([
            'name'    => ['required', 'string', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'subject' => ['nullable', 'in:freelance,job,collaboration,other'],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
        ]);

        Mail::to(config('portfolio.email'))->send(new ContactMessage($data));

        return redirect()->route('contact')->with('success', 'Thanks! I usually reply within 2 business days.');
    }
}
