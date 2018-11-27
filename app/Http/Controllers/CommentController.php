<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Comment;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    
    public function store(Request $request,$idea){
     

        $this->validate($request,[
            'comment' => 'required'
        ]);
        $comment = new Comment();
        $comment->idea_id = $idea;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();
        // Toastr::success('Comment Successfully Published :)','Success');
        return redirect()->back();
        
        
    }

}
