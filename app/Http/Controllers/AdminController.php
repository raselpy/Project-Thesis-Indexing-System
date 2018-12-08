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
        $file_unique = DB::table('project_files')->distinct()->select('supervisor_name')->get();
        $user = Auth::User();
		return view('admin.index',compact('files','user','file_unique'));
	}

    public function project_search(Request $request){
                $file_all = ProjectFiles::all();
                $user = Auth::User();
                $type = $request->input('type');
                $Supervisor = $request->input('Supervisor');
                $name = $request->input('name');
                $file_unique = DB::table('project_files')->distinct()->select('supervisor_name')->get();
                $files = ProjectFiles::where('type','LIKE',"%$type%")
                  ->Where('supervisor_name', 'LIKE', "%$Supervisor%")
                  ->Where('name', 'LIKE', "%$name%")
                  ->get();
                return view('admin.project_search',compact('file_all','files','user','file_unique'));
    }

    public function project(){

        $user = Auth::user();
        $file_unique = DB::table('project_files')->distinct()->select('supervisor_name')->get();
        $files = ProjectFiles::all();
        return view('admin.MyProject',compact('user','files','file_unique'));
    }

    public function myfile_search(Request $request){
                $file_all = ProjectFiles::all();
                $user = Auth::User();
                 $type = $request->input('type');
                $Supervisor = $request->input('Supervisor');
                $name = $request->input('name');
                $file_unique = DB::table('project_files')->distinct()->select('supervisor_name')->get();
                $files = ProjectFiles::where('type','LIKE',"%$type%")
                  ->Where('supervisor_name', 'LIKE', "%$Supervisor%")
                  ->Where('name', 'LIKE', "%$name%")
                  ->get();
                return view('admin.myfile_search',compact('files','user','file_all','file_unique'));
    }

    
    public function favorite(){
        $ideas = Auth::user()->favorite_ideas;
        $user = Auth::User();
        // dd($ideas);
        return view('admin.favorite',compact('ideas','user'));
    }
    
    public function myfavorite_search(Request $request){
                $user = Auth::User();
                $query = $request->input('query');
                $fav_ideas = Auth::user()->favorite_ideas;
                $ideas = Idea::where('name','LIKE',"%$query%")->get();
        return view('admin.myfavorite_idea_search',compact('fav_ideas','ideas','query','user'));
    }

    
    public function my_idea(){
        $user = Auth::user();
        $ideas = Idea::all();
        return view('admin.MyIdea',compact('user','ideas'));
    }
    
    public function myidea_search(Request $request){
                $user = Auth::User();
                $query = $request->input('query');
                $ideas = Idea::where('name','LIKE',"%$query%")->get();
                return view('admin.myidea_search',compact('ideas','user'));
    }

    public function idea(){
        $ideas = Idea::paginate(8);
         $user = Auth::User();
        return view('admin.idea',compact('ideas','user'));
    }

    public function idea_search(Request $request){
                $user = Auth::User();
                $query = $request->input('query');
                $ideas = Idea::where('name','LIKE',"%$query%")->get();
                return view('admin.idea_search',compact('ideas','user'));
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

    public function submit_idea_form(){
        $categories = Category::all();
        // dd($categories);
        // return view('submit_files_form');
        $user = Auth::User();
        return view('admin.submit_idea_form',compact('categories','user'));
    }

    public function submit_file_form(){
        $categories = Category::all();
        $user = Auth::user();
        // return view('submit_files_form');
        return view('admin.submit_file_form',compact('categories','user'));
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
