<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

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
    public function index(){
        $user = Auth::user();
        return view('first',[
            'title'=>'Home',
            'user' => $user
        ]);
    }
    public function view_reports(){
        $user = Auth::user();
        $all_report = DB::table('report_data')
            ->get();
        return view('report.reports',[
            'title'=>'All Reports',
            'user' => $user,
            'all_reports' => $all_report
        ]);
    }
}
