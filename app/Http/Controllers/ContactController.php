<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display the contact form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Handle the form submission.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'your_message' => 'required|min:5|max:1000',
        ]);

        // Insert data into the database
        Contact::create([
            'email' => $request->email,
            'message' => $request->your_message,
        ]);

        Mail::send([], [], function ($message) use ($request) {
            $message->to('david.phalla@codexe.dev') // Replace with the recipient's email
                    ->subject('New Contact Message')
                    ->from($request->email)
                    ->setBody('Message: ' . $request->your_message);
        });

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent!');
    }

    // Remove this method if not needed
    /*
    public function store(Request $request)
    {
        //
    }
    */
}
