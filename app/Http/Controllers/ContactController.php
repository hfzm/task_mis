<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactUs;
use App\Mail\Thanks;
use Session;

class ContactController extends Controller
{
    public function submitContact(Request $request){
        $data = array(
            'name'      => $request->name,
            'email'     => $request->email,
            'message'   => $request->message,
        );

        Mail::to('hafizullah.masoudi2508@gmail.com')->send(new ContactUs($data));
        Mail::to($request->email)->send(new Thanks($data));
        Session::flash('success', 'Thanks for contacting us');
        return redirect()->back();
    }
}
