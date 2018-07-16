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
        $owner_list = DB::table('report_data')
            ->groupby('owner_group')
            ->get();
        $address_list = DB::table('report_data')
            ->groupby('address', 'city', 'state', 'zip')
            ->get();
        return view('report.reports',[
            'title'=>'All Reports',
            'user' => $user,
            'all_reports' => $all_report,
            'owner_list' => $owner_list,
            'address_list' => $address_list
        ]);
    }
    public function new_report(){
        $user = Auth::user();
        $all_report = DB::table('report_data')
            ->get();
        return view('report.new_report',[
            'title'=>'New Report',
            'user' => $user,
            'all_reports' => $all_report
        ]);
    }
    public function add_report(Request $request){
        $user = Auth::user();
        DB::table('report_data')
            ->insert([
                'owner_group' => $request->owner_group,
                'priority' => $request->priority,
                'parcels' => $request->parcels,
                'total_acerage' => $request->total_acerage,
                'land_agent' => $request->land_agent,
                'change_land_agent' => $request->change_land_agent,
                'status' =>  $request->status,
                'opposition' => $request->opposition,
                'status_date' => $request->status_date,
                'notes' => $request->notes,
                'primary_contact' => $request->primary_contact,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'phone' => $request->phone,
                'additional' => $request->additional
            ]);
        return redirect('view_reports');
    }
    public function edit_report(Request $request){
        $user = Auth::user();
        DB::table('report_data')
            ->where('_id', $request->report_id)
            ->update([
                'owner_group' => $request->owner_group,
                'priority' => $request->priority,
                'parcels' => $request->parcels,
                'total_acerage' => $request->total_acerage,
                'land_agent' => $request->land_agent,
                'change_land_agent' => $request->change_land_agent,
                'status' =>  $request->status,
                'opposition' => $request->opposition,
                'status_date' => $request->status_date,
                'notes' => $request->notes,
                'primary_contact' => $request->primary_contact,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'phone' => $request->phone,
                'additional' => $request->additional
            ]);
        return redirect('view_reports');
    }
    public function filter_report(Request $request){
        $user = Auth::user();
        $f_owner = $request->f_owner;
        $f_address = $request->f_address;

        $filter_result = DB::table('report_data')
            ->where([
                ['owner_group','like', '%'.$f_owner.'%'],
                ['address', 'like', '%'.$f_address.'%']
            ])
            ->get();
        $owner_list = DB::table('report_data')
            ->groupby('owner_group')
            ->get();
        $address_list = DB::table('report_data')
            ->groupby('address')
            ->get();
        return view('report.reports',[
            'title'=>'Filter Reports',
            'user' => $user,
            'all_reports' => $filter_result,
            'owner_list' => $owner_list,
            'address_list' => $address_list
        ]);
    }
}
