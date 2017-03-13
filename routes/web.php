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

use Illuminate\Http\Request;
use App\TimeRecord;
use App\EmployeeSchedule;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/employee', 'EmployeesController@index');
Route::get('/employee/add_shift_sched', 'EmployeesController@add_shift_sched');
Route::get('/employee/timesheet/{id}', 'EmployeesController@timesheet');

Route::post('/employee/update', function(Request $request) {
  $user = Auth::user();
  $user->update($request->all());
  return back();
});

Route::post('/home/time_in', function (Request $request) {
  $time_data = array('time_in' => Carbon\Carbon::now(),
                    'user_id' => Auth::user()->id,
                    'time_out' => 0,
                    'remarks' => 'New',
  );
  TimeRecord::create($time_data);
  return back();
});

Route::post('/employee/create_shift', function (Request $request) {
  $user_data = array('user_id' => Auth::user()->id,
                    'position' => $request->position,
                    'department' => $request->department,
                    'shift_schedule' => $request->shift_schedule,
  );
  // return $user_data;
  EmployeeSchedule::create($user_data);
  return back();
});

Route::post('/home/time_out', function (Request $request) {
  $time_data = array('time_out' => Carbon\Carbon::now());
  $time_record = DB::table('time_records')->where('id', $request->time_record_id);
  $time_record->update($time_data);
  return back();
});