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

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

Route::get('/doctorProfile', 'DoctorProfileController@myProfile');
/*
Route::post('/profile', 'ProfileController@show');
Route::get('/profile', function(){
  return abort(404);
});
*/
Route::get('/appointments', 'AppointmentController@index');
Route::post('/appointments', 'AppointmentController@store');
Route::delete('/appointments', 'AppointmentController@destroy');
Route::delete('/profile', 'AppointmentController@destroy');
Route::get('/symptom-checker', 'SymptomCheckerController@index');
Route::resource('/diseases', 'DiseaseController');
Route::resource('/symptoms', 'SymptomController');

Route::prefix('api')->group(function () {
	Route::get('symptoms/{id}', 'DiseaseController@getSymptomsByDiseaseId');
	Route::post('diseases_by_symptoms', 'SymptomCheckerController@getDiseasesBySymptoms');
	Route::patch('save/symptons_for_disease', 'DiseaseController@saveSymptomsForDisease');
	Route::delete('delete/symptons_for_disease', 'DiseaseController@deleteSymptomForDisease');
});

Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/auth/google/callback', 'SocialAuthGoogleController@callback');
