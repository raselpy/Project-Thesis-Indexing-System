<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\ProjectFiles;
use App\Category;
use File;
use Illuminate\Support\Facades\Auth;


class FileSubmitController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }
     public function submit_files_form(){
        $categories = Category::all();
        $user = Auth::user();
        // return view('submit_files_form');
        return view('student.submit_files_form',compact('categories','user'));
    }

    public function store_files(Request $request){

        $this->validate($request,[
            'name' => 'required'
            // 'path' => 'required',
            // 'path.*' => 'mimes:doc,pdf,docx,zip',
            // 'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('doc')){
            $docNameExt = $request->file('doc')->getClientOriginalName();
            $docName = pathinfo($docNameExt,PATHINFO_FILENAME);
            $docExt = $request->file('doc')->getClientOriginalExtension();
            $docNameToStore = $docName . '_' .time() . '.' . $docExt;
            $doc = $request->file('doc')->storeAs('public/docs',$docNameToStore);
        }else{
            $docNameToStore = 'Nothing';
        }
        

        if ($request->hasFile('image')){

            $images = array();

            foreach($request->file('image') as $image)
             {
                $tempName = $image->getClientOriginalName();

                $name = explode(".", $tempName);

                $originalName = $name[0];

                $imageExt = $image->getClientOriginalExtension();

                $imageNameToStore = $originalName . '_' .time() . '.' . $imageExt;

                $image->storeAs('public/images',$imageNameToStore);

                array_push($images, $imageNameToStore);
            }

            $imageString = implode(",", $images);

            // dd($imageString);
        }else{
            $imageString = 'Nothing';
        }
        


        if ($request->hasFile('path')){
            $fileNameExt = $request->file('path')->getClientOriginalName();
            $fileName = pathinfo($fileNameExt,PATHINFO_FILENAME);
            $fileExt = $request->file('path')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' .time() . '.' . $fileExt;
            $path = $request->file('path')->storeAs('public/uploads',$fileNameToStore);
        }else{
            $fileNameToStore = 'Nothing';
        }

        $ProjectFiles = new ProjectFiles;
        $ProjectFiles->type = $request->input('type');
        $ProjectFiles->catagory = $request->input('catagory');
        $ProjectFiles->contributor_name1 = $request->input('contributor_name1');
        $ProjectFiles->contributor_id1 = $request->input('contributor_id1');
        $ProjectFiles->contributor_name2 = $request->input('contributor_name2');
        $ProjectFiles->contributor_id2 = $request->input('contributor_id2');
        $ProjectFiles->supervisor_name = $request->input('supervisor_name');
        $ProjectFiles->name = $request->input('name');
        $ProjectFiles->description = $request->input('description');
        $ProjectFiles->required_technology = $request->input('required_technology');
        $ProjectFiles->user_id = $request->input('user');
        $ProjectFiles->doc = $docNameToStore;
        $ProjectFiles->image = $imageString;
        // $ProjectFiles->image = json_encode($data);
        $ProjectFiles->path = $fileNameToStore;
        $ProjectFiles->created_at = Carbon::now()->toDateTimeString();
         // dd($ProjectFiles);
        $ProjectFiles->save();

        return redirect('/project/submit/form');
    }

}
