<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Message;

class PDFController extends Controller
{
    public function getPDF($id){
      //retreive the actual message using the id
      $message = Message::find($id);
      $pdf = PDF::loadView('pdfs.message', ['message'=>$message]);
      return $pdf->stream('email.pdf');
    }
}
