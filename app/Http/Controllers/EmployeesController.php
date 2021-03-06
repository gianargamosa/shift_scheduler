<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\TimeRecord;
use Illuminate\Support\Facades\DB;
class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_data = Auth::user();
        return view('employee.index', compact('user_data'));
    }

    public function add_shift_sched()
    {
        return view('employee.add_shift_sched', compact('user_data'));
    }

    public function timesheet($id)
    {
        $user_data = DB::table('users')->select('users.id', 'users.first_name', 'users.last_name', 'users.middle_name', 'time_records.time_in', 'time_records.time_out', 'time_records.created_at', 'employee_schedules.shift_schedule_in', 'employee_schedules.shift_schedule_out')->join('time_records', 'time_records.user_id', '=', 'users.id')->join('employee_schedules', 'employee_schedules.id', '=', 'users.id')->where('users.id', $id)->get();
        // return $user_data;
        return view('employee.timesheet', compact('user_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
