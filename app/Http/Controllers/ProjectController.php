<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectFiles;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Session;
use DB;
use Storage;


class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = ProjectFiles::paginate(18);
        // dd($files);
        return view('student.project',compact('files'));
    }

    public function detail($id){
        // $user = Auth::user();
        $files = ProjectFiles::find($id);
        $filesKey = 'files_' . $files->id;
        if (!Session::has($filesKey)) {
            $files->increment('view_count');
            Session::put($filesKey,1);
        }

       $category = Category::find($id);
       // dd($category);

         
        return view('student.project_detail',compact('files','category'));
    }

   
}
