<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Idea;
use App\User;

class ThesisIdeaController extends Controller
{
    

    public function index()
    {
        $ideas = Idea::all();
        // dd($ideas);
        // return view('thesis_idea',compact('ideas'));
        $user = Auth::User();
        return view('student.thesis_idea',compact('ideas','user'));
    }

    public function detail($id){
         $user = Auth::user();
    	$ideas = Idea::find($id);

    	return view('student.thesis_idea_detail',compact('ideas','user'));
    }

    public function idea_thesis_search(Request $request){
                $user = Auth::User();
                $query = $request->input('query');
                $ideas = Idea::where('name','LIKE',"%$query%")->get();
                return view('student.idea_thesis_search',compact('ideas','user'));
    }

    
}