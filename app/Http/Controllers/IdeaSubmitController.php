<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Idea;
use App\Category;

class IdeaSubmitController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function submit_idea_form(){
        $categories = Category::all();
        // dd($categories);
        // return view('submit_files_form');
        return view('student.submit_idea_form',compact('categories'));
    }

    public function store_idea(Request $request){

        $this->validate($request,[
            'name' => 'required'
        ]);

        $insert=Idea::insert([
             'type'=> $_POST['type'],
             'catagory'=> $_POST['catagory'],
             'name'=> $_POST['name'],
             'description'=> $_POST['description'],
             'required_technology'=> $_POST['required_technology'],
             'created_at' => Carbon::now()->toDateTimeString(),


        ]);

        if($insert){
            
            return redirect('/idea/submit/form');
        }else{
            return redirect('/idea/submit/form');
        }
    }
}
