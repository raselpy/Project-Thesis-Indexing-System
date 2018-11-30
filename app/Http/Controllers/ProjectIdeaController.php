<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use DB;

class ProjectIdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::all();;
        // $ideas= DB::table('ideas')->orderBy('created_at', 'desc');
        // // $ideas = Idea::latest();
        // dd($idea);
        return view('student.project_idea',compact('ideas'));
    }

    public function detail($id){
        $ideas = Idea::find($id);
        return view('student.project_idea_detail',compact('ideas'));
    }
}
