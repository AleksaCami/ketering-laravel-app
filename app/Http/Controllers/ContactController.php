<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Mail;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Contact::create($request->all());
        Mail::send('pages.email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function($message)
            {
                $message->from('ketering.app.laravel@gmail.com');
                $message->to('ketering.app.laravel@gmail.com', 'Ketering')
                    ->subject('Contact Form Query');
            });
        return redirect('/contact')->with('success', 'Hvala sto ste nas kontaktirali!');
    }
}
