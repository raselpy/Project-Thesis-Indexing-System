<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectFiles;
use App\Idea;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Session;
use DB;
use Storage;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('admin');
    }

	public function index(){
		$files = ProjectFiles::paginate(8);
        $user = Auth::User();
		return view('admin.index',compact('files','user'));
	}
    public function project(){
        $user = Auth::user();
        $files = ProjectFiles::all();
        return view('admin.MyProject',compact('user','files'));
    }

    
    public function favorite(){
        $ideas = Auth::user()->favorite_ideas;
        $user = Auth::User();
        // dd($ideas);
        return view('admin.favorite',compact('ideas','user'));
    }

    
    public function my_idea(){
        $user = Auth::user();
        $ideas = Idea::all();
        return view('admin.MyIdea',compact('user','ideas'));
    }

    public function idea(){
        $ideas = Idea::paginate(8);
         $user = Auth::User();
        return view('admin.idea',compact('ideas','user'));
    }
    public function idea_delete($id){
        $idea = Idea::find($id);
        $idea->status = 0;
        $idea->save();
        return redirect()->back(); 
    }

    public function file_delete($id){
        $idea = ProjectFiles::find($id);
        $idea->status = 0;
        $idea->save();
        return redirect()->back(); 
    }
    
    
    public function student(){
        $users = User::paginate(8);
        return view('admin.student',compact('users'));
    }

    public function teacher(){
        $users = User::paginate(8);     
        return view('admin.teacher',compact('users'));
    }

    public function delete($id){
        $user = User::find($id);
        $user->verified = 0;
        $user->save();
        return redirect()->back();   
    }
    public function update($id){
        $user = User::find($id);
        $user->role = 2;
        $user->save();
        return redirect()->back();   
    }




	public function downloadDocFile(Request $request)
    {
        $request->validate([
            'fileId' => 'required|integer'
        ]);

        $res = DB::table('project_files')->select('doc')->where('id', $request->input('fileId'))->get();

        foreach ($res as $key => $value) {
            $fileName = $value->doc;
        }

        $DownloadPath = storage_path('app/public/docs/'.$fileName);
        

        return response()->download($DownloadPath);


    }
    public function downloadZipFile(Request $request)
    {
        $request->validate([
            'fileId' => 'required|integer'
        ]);

        $res = DB::table('project_files')->select('path')->where('id', $request->input('fileId'))->get();

        foreach ($res as $key => $value) {
            $fileName = $value->path;
        }

        $DownloadPath = storage_path('app/public/uploads/'.$fileName);

        return response()->download($DownloadPath);


    }
	
    
}
