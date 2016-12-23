<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Input;
use App\Http\Requests;
use App\Post;
use Mail;
use Session;

class composeController extends Controller {

	public function getCompose() {
		return view('compose');
	}

	public function postCompose(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10',
			'attachment' => 'max:10240|mimes:jpeg,bmp,png,gif,zip,rar,pdf,psd,ai,cdr,rtf,doc,docx,xls,xlsx,ppt',
		  ]);
$attachment = $request->file('attachment')->getRealPath();
		$data = array(
			'email'       => $request->email,
			'subject'     => $request->subject,
			'bodyMessage' => $request->message,
			'attachment' => $request->attachment
			);



		Mail::send('emails.compose', $data, function($message) use ($data){
			$message->from('rondbadre@gmail.com');
			$message->to($data['email']);
			$message->subject($data['subject']);
			if ( isset($data['attachment']))
                    {

                        $message->attach($data['attachment']->getRealPath(),
												array(
	                            'as'    => $data['attachment']->getClientOriginalName(),
	                            'mime'  => $data['attachment']->getMimeType())
															);
                    }
		});

		Session::flash('success', 'Your Email was Sent!');

		return redirect('/compose');
	}


}
