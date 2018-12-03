<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::User();
    return view('student.category',compact('user'));
    }
    public function submit_category(Request $request){
    	$this->validate($request,[
            'name'=>'required:min:3'
    	]);
    	Category::insert([
            'name'=> $_POST['name'],

    	]);
    	return redirect('/category');
    }
}
