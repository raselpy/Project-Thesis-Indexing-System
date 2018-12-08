<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ProjectFiles;
use App\Idea;
use DB;

class StudentDashboardController extends Controller
{
    public function index(){
		// $files = ProjectFiles::paginate(8);
  //       $users = User::all();
    	$ideas = Auth::user()->favorite_ideas;
        // dd($ideas);
        return view('student_dashboard.favorite',compact('ideas'));
		// return view('student_dashboard.index');
	}

	public function project(){
        $file_unique = DB::table('project_files')->distinct()->select('supervisor_name')->get();
		$user = Auth::user();
		$files = ProjectFiles::all();
		return view('student_dashboard.project',compact('user','files','file_unique'));
	}

	 public function idea(){
        $user = Auth::user();
        $ideas = Idea::all();
        return view('student_dashboard.MyIdea',compact('user','ideas'));
    }

    public function file_search(Request $request){
                $file_all = ProjectFiles::all();
    	        $user = Auth::user();
                $type = $request->input('type');
                $Supervisor = $request->input('Supervisor');
                $name = $request->input('name');
                $file_unique = DB::table('project_files')->distinct()->select('supervisor_name')->get();
                $files = ProjectFiles::where('type','LIKE',"%$type%")
                  ->Where('supervisor_name', 'LIKE', "%$Supervisor%")
                  ->Where('name', 'LIKE', "%$name%")
                  ->get();
         return view('student_dashboard.file_search',compact('file_all','files','user','file_unique'));
    }

    public function idea_search(Request $request){
    	        $user = Auth::user();
                $query = $request->input('query');
                $ideas = Idea::where('name','LIKE',"%$query%")->get();
         return view('student_dashboard.idea_search',compact('ideas','query','user'));
    }

    
    public function favorite_idea_search(Request $request){
    	        
                $query = $request->input('query');
                $fav_ideas = Auth::user()->favorite_ideas;
                $ideas = Idea::where('name','LIKE',"%$query%")->get();
                // dd($ideas);
         return view('student_dashboard.favorite_idea_search',compact('fav_ideas','ideas','query','user'));
    }

	
}
