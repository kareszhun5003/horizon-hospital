<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Appointment;

class UserController extends Controller
{
    public function profile(){

      if(auth()->user()->type != 'doctor'){
        $appointments = Appointment::all();

        return view('auth.profile', array('user' => Auth::user(),'appointments' => $appointments));

      } else {

        return view('auth.profile', array('user' => Auth::user()));
      }
    }

    public function update_avatar(Request $request){
      if($request->hasFile('avatar')){
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/img/uploads/avatars/' . $filename) );

        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();

        return view('home', array('user' => Auth::user()));
      }
    }
}
