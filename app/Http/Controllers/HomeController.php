<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\TimeRecord;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $time_record = DB::table("time_records")->where('user_id', Auth::user()->id)->get();
        // $last_time_record = DB::table("time_records")->where('user_id', Auth::user()->id)->order_by('id', 'desc')->first();
        $last_time_record = TimeRecord::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        return view('home', compact('time_record', 'last_time_record'));
    }
}
