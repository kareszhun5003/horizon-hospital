<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Table;

class AppointmentController extends Controller
{
  public function index() {

    $appointments = Appointment::all();

    return view('appointment',
      ['appointments' => $appointments,
    ]);
  }

  public function destroy(Request $request) {

    $appointment = new Appointment();

    $appointment->id = request('id');
    $appointment->user_name = request('user_name');
    $appointment->doctor_name = request('doctor_name');
    $appointment->date = request('picker2') . " " . request('picker1');

    $id = $appointment->id;
    $user_name = $appointment->user_name;
    $doctor_name = $appointment->doctor_name;
    $date = $appointment->date;

    $appointment = Appointment::findOrFail($id);
    $appointment->delete();
    return redirect()->back()->with('alert', 'Appointment deleted successfully!');

  }

  public function store() {

    request()->validate([
      'picker1' => 'required',
      'picker2' => 'required'
    ]);

    $appointment = new Appointment();

    $appointment->user_id = request('user_id');
    $appointment->doctor_id = request('doctor_id');

    $appointment->date = request('picker2') . " " . request('picker1');

    $data = DB::table('appointments')->select('date')->get();
    $contains = Str::contains($data, $appointment->date);

    if($contains == 1){
      return redirect()->back()->with('alert', 'Appointment already exists!');
    } else {
      $appointment->save();
      return redirect()->back()->with('alert', 'Appointment added successfully!');
    }
  }
}
