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
	    	'to' => $request->to,
	    	'from' => $request->from,
	    	'subject' => $request->subject,
	        'title' => $request->title,
	        "body" 	=> $request->body
	    ];
   
    	\Mail::to($request->to)->send(new \App\Mail\NewMail($details));

	    if (Mail::failures()) {
	        return response()->json([
				'status'  => false,
				'data'    => $details,
				'message' => 'Nnot sending mail.. retry again...'
			]);
	    }
    	return response()->json([
			'status'  => true,
			'data'    => $details,
			'message' => 'Your details mailed successfully'
		]);
	}

	public function new_mail_md (Request $request)
	{
	    $details = [
	    	'to' => $request->to,
	    	'from' => $request->from,
	    	'subject' => $request->subject,
	        'title' => $request->title,
	        "body" 	=> $request->body
	    ];
   
    	\Mail::to($request->to)->send(new \App\Mail\MdMail($details));

	    if (Mail::failures()) {
	        return response()->json([
				'status'  => false,
				'data'    => $details,
				'message' => 'Nnot sending mail.. retry again...'
			]);
	    }
    	return response()->json([
			'status'  => true,
			'data'    => $details,
			'message' => 'Your details mailed successfully'
		]);

	}
    	
}
