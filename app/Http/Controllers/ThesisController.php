<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\ProjectFiles;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Session;
use DB;
use Storage;


class ThesisController extends Controller
{
    public function index()
    {
        $files = ProjectFiles::paginate(8);
        // $files=DB::table('project_files')->get();
        // dd($files);
        return view('student.thesis',compact('files'));
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

         
    	return view('student.thesis_detail',compact('files','category'));
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
