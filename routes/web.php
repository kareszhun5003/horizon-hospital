<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/doctors', 'DoctorController@index');
//Route::post('/doctors', 'DoctorController@show');


Route::get('/doctors/{doctor}', 'DoctorController@show');

Route::get('public/img/{name}', function ($name) {

    $path = img($name);

    $mime = \File::mimeType($path);

    header('Content-type: ' . $mime);

    return readfile($path);

})->where('name', '(.*)');

Auth::routes();

Route::post('/profile', 'ProfileController@show');
Route::get('/profile', function(){
  return abort(404);
});

Route::get('/appointments', 'AppointmentController@index');
Route::post('/appointments', 'AppointmentController@store');
Route::delete('/appointments', 'AppointmentController@destroy');
