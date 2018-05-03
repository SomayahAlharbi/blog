<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    /**
     * Send Email
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name'=>'required',
          'email'=>'required',
          'emailBody'=>'required'
        ]);

        //return $request->all();
        $data = $request->except('_token');

        Mail::send('emails.send', $data, function($message){

          $message->to('somayah.alharbi@yahoo.com','Ms. Somayah')->subject('Somayah Blog');

        });
        // if email sent successfully
        if (count(Mail::failures()) !=1) {
        return view('emails.success');
    }
    }
}
