<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Doctor;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

  public function show(Request $request) {

    $doctors = new Doctor();
    $doctors->name = $request->input('name');
    $doctors->email = $request->input('email');
    $doctors->specialty = $request->input('specialty');
    $doctors->languages =  $request->input('languages');
    $doctors->education_at_uni = $request->input('education_at_uni');
    $doctors->education_at_quali = $request->input('education_at_quali');
    $doctors->img = $request->input('img');

    $name = $doctors->name;
    $email = $doctors->email;
    $specialty = $doctors->specialty;
    $languages =  $doctors->languages;
    $education_at_uni = $doctors->education_at_uni;
    $education_at_quali = $doctors->education_at_quali;
    $img = $doctors->img;

    return view('profile', compact('name', 'email', 'specialty', 'languages', 'education_at_uni', 'education_at_quali', 'img'));
  }

  public function myProfile() {

    $user_id = auth()->user()->id;
    $doctor = Doctor::find($user_id);

    return $doctor;
  }
}
