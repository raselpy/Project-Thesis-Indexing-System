<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ProjectFiles;
use App\Idea;

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
		$user = Auth::user();
		$files = ProjectFiles::all();
		return view('student_dashboard.project',compact('user','files'));
	}

	 public function idea(){
        $user = Auth::user();
        $ideas = Idea::all();
        return view('student_dashboard.MyIdea',compact('user','ideas'));
    }

    public function file_search(Request $request){
    	        $user = Auth::user();
                $query = $request->input('query');
                $files = ProjectFiles::where('name','LIKE',"%$query%")->get();
         return view('student_dashboard.file_search',compact('files','query','user'));
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
