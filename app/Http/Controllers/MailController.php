<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function add_message(Request $request)
	{

	    $details = [
	        'title' => 'Contact Form Mail from GitLeaf.com',
	        "name" 	=> $request->name,	
			"email" 	=> $request->email,
	    	"phone" 	=> $request->phone,
	    	"message" 	=> $request->message
	    ];
   
    	\Mail::to('ikatheesh@gmail.com')->send(new \App\Mail\ContactMail($details));

		return response()->json([
			'status'  => true,
			'data'    => $details,
			'message' => 'Your contact details mailed successfully'
		]);
    	
    }
    	
}
