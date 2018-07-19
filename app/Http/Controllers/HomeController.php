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
        if($user){
            return view('first',[
                'title'=>'Home',
                'user' => $user
            ]);
        }else{
            return redirect('/');
        }

    }
    public function view_reports(){
        $user = Auth::user();
        if($user->role == 1){
            $all_report = DB::table('report_data')
                ->join('project_data', 'project_data._id','report_data.project_id')
                ->where('project_data.user_id', $user->id)
                ->select('project_data.title', 'report_data.*')
                ->get();
            $project_list = DB::table('project_data')
                ->where('user_id', $user->id)
                ->get();
            $all_project = DB::table('project_data')
                ->get();
            $owner_list = DB::table('report_data')
                ->groupby('owner_group')
                ->get();
            $address_list = DB::table('report_data')
                ->groupby('address')
                ->get();
            return view('report.reports',[
                'title'=>'All Reports',
                'user' => $user,
                'all_reports' => $all_report,
                'project_list' => $project_list,
                'all_projects' => $all_project,
                'owner_list' => $owner_list,
                'address_list' => $address_list
            ]);
        }else{
            $all_report = DB::table('report_data')
                ->join('project_data', 'project_data._id','report_data.project_id')
                ->select('project_data.title', 'report_data.*')
                ->get();
            $project_list = DB::table('project_data')
                ->get();
            $all_project = DB::table('project_data')
                ->get();
            $owner_list = DB::table('report_data')
                ->groupby('owner_group')
                ->get();
            $address_list = DB::table('report_data')
                ->groupby('address')
                ->get();
            return view('report.reports',[
                'title'=>'All Reports',
                'user' => $user,
                'all_reports' => $all_report,
                'project_list' => $project_list,
                'all_projects' => $all_project,
                'owner_list' => $owner_list,
                'address_list' => $address_list
            ]);
        }
    }
    public function new_report(){
        $user = Auth::user();
        $all_project = DB::table('project_data')
            ->get();
        return view('report.new_report',[
            'title'=>'New Report',
            'user' => $user,
            'all_projects' => $all_project
        ]);
    }
    public function user_profile(){
        $user = Auth::user();
        return view('user.profile',[
            'title'=>'Profile',
            'user' => $user
        ]);
    }


    public function add_report(Request $request){
        $user = Auth::user();
        DB::table('report_data')
            ->insert([
                'user_id' => $user->id,
                'project_id' => $request->project_id,
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
                'user_id' => $user->id,
                'project_id' => $request->project_id,
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
        $project_id = $request->my_projects;
        $filter_result = DB::table('report_data')
            ->where([
                ['project_id', $project_id],
                ['owner_group','like', '%'.$f_owner.'%'],
                ['address', 'like', '%'.$f_address.'%']
            ])
            ->get();
        $project_list = DB::table('project_data')
            ->where('user_id', $user->id)
            ->get();
        $all_project = DB::table('project_data')
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
            'project_list' => $project_list,
            'owner_list' => $owner_list,
            'address_list' => $address_list,
            'project_id' => $project_id,
            'f_owner' =>$f_owner,
            'f_address' => $f_address,
            'all_projects' => $all_project
        ]);

    }

    public function update_profile(Request $request){
        $user = Auth::user();
        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'name' => $request->username,
                'email' => $request->email,
                'phone'=> $request->phone,
                'address' => $request->street,
                'city' => $request->city,
                'state' => $request->state,
                'zipcode' => $request->zipcode,
                'message' => $request->message
            ]);
        return redirect('profile');
    }

    public function user_manage(){
        $user = Auth::user();
        $all_users = DB::table('users')
            ->get();
        return view('user.user_manage',[
            'title'=>'All Users',
            'user' => $user,
            'all_users' =>  $all_users
        ]);
    }
    public function edit_role(Request $request){
        DB::table('users')
            ->where('email', $request->email)
            ->update([
                'role'=> $request->role
            ]);
        return redirect('all_user');
    }

    public function view_projects(){
        $user = Auth::user();
        $all_projects = DB::table('project_data')
            ->join('users','project_data.user_id', 'users.id')
            ->select('users.name', 'project_data.*')
            ->get();
        return view('project.projects',[
            'title'=>'All Projects',
            'user' => $user,
            'all_projects' =>  $all_projects
        ]);
    }
    public function new_project(){
        $user = Auth::user();
        return view('project.new_project',[
            'title'=>'New Project',
            'user' => $user
        ]);
    }
    public function add_project(Request $request){
        $user = Auth::user();
        $date_range = explode(' - ',$request->daterange);
        $start_date = date('Y-m-d', strtotime($date_range[0]));
        DB::table('project_data')
            ->insert([
                'user_id' =>  $user->id,
                'title' => $request->title,
                'description' => $request->description,
                'budget' => $request->budget,
                'start_date' => date('Y-m-d', strtotime($date_range[0])),
                'end_date' => date('Y-m-d', strtotime($date_range[1]))
            ]);
        return redirect('view_projects');
    }
}
