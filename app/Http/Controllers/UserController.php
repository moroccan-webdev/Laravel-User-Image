<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Session;
use Image;

class UserController extends Controller
{
  public function index(Request $request)
  {

    if($request->has('titlesearch')){
       $users = User::search($request->titlesearch)
         ->orderBy('id','desc')->paginate(10);
    }else{
       $users = User::orderBy('id','desc')->paginate(10);
    }
    return view('users.index',compact('users'));
    }

    public function profile(){
      return view('profile', array('user'=> Auth::user()));
    }

    public function update_avatar(Request $request){
    	// Handle the user upload of avatar

      $this->validate($request, array(
        'name' => 'required|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required|min:6|confirmed',
        'phone' => 'min:12',
        'address' => 'min:4',
        'city' => 'min:4',
        'role' => 'min:4',
      ));



      //save the data to the database
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->role = $request->role;

        //sava the avatar variable in the database
        if($request->hasFile('avatar')){
          $avatar = $request->file('avatar');
          $filename = time() . '.' . $avatar->getClientOriginalExtension();
          Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
          //$user = Auth::user();
          $user->avatar = $filename;
          $user->save();
        };
        //end avatar saving
        $user->save();
      //set flash data with success message



    	return view('profile', array('user' => Auth::user()) );
    }

    public function show($id)
    {
      $user = User::find($id);
      // get previous message id
      $previous = User::where('id', '<', $user->id)->max('id');
      // get next message id
      $next = User::where('id', '>', $user->id)->min('id');
      // return the show view
      return view('users.show')->with('user', $user)->with('previous', $previous)->with('next', $next);;
    }

    public function destroy($id)
    {
      //find the user which will be deleted
      $user = User::find($id);

      //detete the user
      $user->delete();

      //create a session flash
      Session::flash('success','This client was successfully deleted !');


      //redirect to the index page
      return redirect()->route('user.index');
    }
}
