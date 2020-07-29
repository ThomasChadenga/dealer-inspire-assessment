<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactSaved;

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
       
        try {
            $contact->save();

            //mail contact
            Mail::to('guy-smiley@example.com')->send(new ContactSaved($contact));

            return response()->json('Contact successfully saved', 200);
        } catch (\Exception $e) {
            return response()->json('Error saving message', 400);
        }
    }
}
