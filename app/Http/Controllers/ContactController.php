<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'max:255',
            'message' => 'required'
        ]);
    
        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $contact = new Contact;
        $contact->firstname = filter_var($request->firstname, FILTER_SANITIZE_STRING);
        $contact->lastname = filter_var($request->lastname, FILTER_SANITIZE_STRING);
        $contact->email = filter_var($request->email, FILTER_SANITIZE_EMAIL);
        if (!empty($request->phone)) $contact->phone = filter_var($request->phone, FILTER_SANITIZE_STRING);
        $contact->message = $request->message;
       
        $contact->save();
        return redirect('/');
     }
}
