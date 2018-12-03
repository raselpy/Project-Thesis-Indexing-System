<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProjectIdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::all();
        $user = Auth::User();
        // $ideas= DB::table('ideas')->orderBy('created_at', 'desc');
        // // $ideas = Idea::latest();
        // dd($user);
        return view('student.project_idea',compact('ideas','user'));
    }

    public function detail($id){
        $ideas = Idea::find($id);
        $user = Auth::User();
        return view('student.project_idea_detail',compact('ideas','user'));
    }
}
