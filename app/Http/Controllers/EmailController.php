<?php

namespace App\Http\Controllers;

use Illuminate\Mail\Mailer;
use Mail;
use App\Mail\Newsletter;

use App\Email;
use Illuminate\Http\Request;

use App\NewsletterSubscriber;

use App\Jobs\SendNewsletterEmail;

class EmailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $emails = Email::get();

        return view('emails.index', compact('emails'));
    }

    public function create()
    {
        $subscribers = NewsletterSubscriber::get();
        return view('emails.create', compact('subscribers'));
    }

    public function store(Request $request)
    {
        $email = new Email;

        $email->to = request('to');
        $email->subject = request('subject');
        $email->content = request('content');

        $email->save();

        $subscribers = NewsletterSubscriber::get();

            foreach($subscribers as $subscriber)
            {
                Mail::to($subscriber->email)->send(new Newsletter($email));
            }

        return redirect('emails/'.$email->id);
    }

    public function show($id)
    {
        $email = Email::find($id);
        return new \App\Mail\Newsletter($email);
    }

    public function destroy(Email $email)
    {
        //
    }
}
