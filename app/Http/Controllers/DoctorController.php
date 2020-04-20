<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;

class DoctorController extends Controller
{
    public function index() {

      $doctors = Doctor::all();

      return view('doctors.index',
        ['doctors' => $doctors,
      ]);
    }

    public function show($slug) {
        $doctor = \DB::table('doctors')->where('slug', $slug)->first();

        return view('doctors.show', [
          'doctor' => $doctor
        ]);
    }

}
