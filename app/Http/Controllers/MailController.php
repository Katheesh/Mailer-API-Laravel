<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\NewMail;
class MailController extends Controller
{
    public function new_mail(Request $request)
	{

	    $details = [
	        'title' => 'Contact Form Mail',
	        "name" 	=> $request->name,	
			"email" 	=> $request->email,
	    	"phone" 	=> $request->phone,
	    	"message" 	=> $request->message
	    ];
   
    	\Mail::to('ikatheesh@gmail.com')->send(new \App\Mail\NewMail($details));

		return response()->json([
			'status'  => true,
			'data'    => $details,
			'message' => 'Your contact details mailed successfully'
		]);

		/*$details = $request->all();

	    $messageBody = new NewMail($details);

	    Mail::raw($messageBody, function ($message) {
	        $message->from('no-reply@gitleaf.com', 'GitLeaf');
	        $message->to('ikatheesh@gmail.com');
	        $message->subject('Learning Laravel test email');
	    });

	    if (Mail::failures()) {
	        return response()->json([
				'status'  => false,
				'data'    => $details,
				'message' => 'Now can not sending mail.. re try again...'
			]);
	    }
    	return response()->json([
			'status'  => true,
			'data'    => $details,
			'message' => 'Your details mailed successfully'
		]);
		
	    }*/

	}
    	
}
