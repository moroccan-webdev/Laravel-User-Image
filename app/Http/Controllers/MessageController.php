<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Purifier;
use App\Message;
use Mail;
use Storage;

class MessageController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {

       if($request->has('titlesearch')){
       		$messages = Message::search($request->titlesearch)
       			->orderBy('id','desc')->paginate(10);
       }else{
       		$messages = Message::orderBy('id','desc')->paginate(10);
       }
       return view('messages.index',compact('messages'));
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'email' => 'required|email',
        'subject' => 'min:3',
        'message' => 'min:10',
        'attachment' => 'max:10240|mimes:jpeg,bmp,png,gif,zip,rar,pdf,psd,ai,cdr,rtf,doc,docx,xls,xlsx,ppt',
        ]);


  //$attachment = $request->file('attachment')->getRealPath();
      $data = array(
        'email'        => $request->email,
        'subject'      => $request->subject,
        'bodyMessage'  => $request->message,
        'attachment'   => $request->attachment
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


              $message = new message;

              if($request->hasFile('attachment')){
                $attachment = $request->file('attachment');
                //create a file path
                $path = base_path() . '/public/uploads/files/';
                //get the file name
                $filename = $attachment->getClientOriginalName();
                $message->attachment = $filename;
                $message->size = $attachment->getClientSize();
                //save the file to your path
                $attachment->move($path , $filename);
                //save that to your database


              };

              $message->email = $request->email;
              $message->subject = $request->subject;
              $message->message = Purifier::clean($request->message);

              $message->save();

      Session::flash('success', 'Your Email was succesfully Sent!');

      return redirect('message/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //retreive the actual message using the id
      $message = Message::find($id);
      // get previous message id
      $previous = Message::where('id', '<', $message->id)->max('id');
      // get next message id
      $next = Message::where('id', '>', $message->id)->min('id');
      //return the show view with variables
      return view('messages.show')->with('message', $message)->with('previous', $previous)->with('next', $next);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //find the item which will be deleted
      $message = Message::find($id);

      //detete the item
      $message->delete();

      //create a session flash
      Session::flash('success','The email was successfully deleted !');


      //redirect to the index page
      return redirect()->route('message.index');
    }
}
