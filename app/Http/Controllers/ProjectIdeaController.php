<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;

class ProjectIdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::paginate(3);
        // dd($idea);
        return view('student.project_idea',compact('ideas'));
    }

    public function detail($id){
        $ideas = Idea::find($id);
        return view('student.project_idea_detail',compact('ideas'));
    }
}
