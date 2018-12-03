@extends('layouts.app')

@section('dashboard')
        @auth
            @if($user->role==1)
               <a class="nav-link item" href="{{route('student.dashboard')}}">{{ __('Student Dashboard') }}</a>
            @endif

            @if($user->role==3)
               <a class="nav-link item" href="{{route('admin')}}">{{ __('Admin Dashboard') }}</a>
            @endif
            @if($user->role==2)
               <a class="nav-link item" href="{{route('admin')}}">{{ __('Teacher Dashboard') }}</a>
            @endif
        @endauth
@endsection

@section('content')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-6" style="background-color:  white">
               
               <form method="post" action="{{route('submit_category')}}">
                @csrf
                  <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Category">
                        
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>
                        
            </div>
        </div>
    </div>
@endsection
