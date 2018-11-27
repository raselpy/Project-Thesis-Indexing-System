<?php

namespace App\Http\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Toastr;

class FavoriteController extends Controller
{
    public function index(){
        $ideas = Auth::user()->favorite_ideas;
        // dd($ideas);
        return view('student.favorite',compact('ideas'));
    }
    public function add($ideas)
    {
        $user = Auth::user();
        $isFavorite = $user->favorite_ideas()->where('idea_id',$ideas)->count();
        if ($isFavorite == 0)
        {
            $user->favorite_ideas()->attach($ideas);
            // Toastr::success('ideas successfully added to your favorite list :)','Success');
            return redirect()->back();
        } else {
            $user->favorite_ideas()->detach($ideas);
            // Toastr::success('ideas successfully removed form your favorite list :)','Success');
            return redirect()->back();
        }
    }
}
