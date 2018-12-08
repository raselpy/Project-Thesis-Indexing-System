<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectFiles;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Session;
use DB;
use Storage;
use Illuminate\Support\Facades\Auth;


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
    public function project()
    {
        $files = ProjectFiles::paginate(18);
        $user = Auth::User();
        $file_unique = DB::table('project_files')->distinct()->select('supervisor_name')->get();
        // dd($files);
        return view('student.project',compact('files','user','file_unique'));
    }

    
    public function project_search(Request $request){
                $file_all = ProjectFiles::all();
                $user = Auth::user();
                $technology = $request->input('technology');
                $Supervisor = $request->input('Supervisor');
                $name = $request->input('name');
                $file_unique = DB::table('project_files')->distinct()->select('supervisor_name')->get();
                $files = ProjectFiles::where('required_technology','LIKE',"%$technology%")
                  ->Where('supervisor_name', 'LIKE', "%$Supervisor%")
                  ->Where('name', 'LIKE', "%$name%")
                  ->get();
                return view('student.project_search',compact('files','user','file_unique'));
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
       $user = Auth::User();
       // dd($category);

         
        return view('student.project_detail',compact('files','category','user'));
    }

   
}
