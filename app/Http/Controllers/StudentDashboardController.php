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

	
}
