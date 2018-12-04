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
<div class="container" style="user-select: none;">
        <div >
            <form class="ui form" method="GET" action="{{route('idea_thesis.search')}}">
              <div class="four fields">
                <input class="field" style="margin-left: 800px;" value="{{ isset($query) ? $query : '' }}" name="query" type="text" placeholder="File search">
                <button style="margin-left: 3px" class="src-btn" type="submit"><i class="search icon"></i></button>
              </div>  
            </form>
      </div>
        <div class="row justify-content-center">
            

            <h2 style="font-family: 'Francois One', sans-serif; margin-bottom: 40px">Thesis Idea List</h2>
           @foreach($ideas as $idea)
                @if($idea->type=="thesis")
                    @if($idea->status==1)
            <div class="ui" style="margin-bottom: 20px">
                <div class="ui ui tall stacked segment">
                    <div class="ui items">
                  <div class="item">
                    <div class="middle aligned content">
                      <div class="header">
                       <p style="font-size: 15px;font-family: 'Ropa Sans', sans-serif;"> Idea Name <i class="fas fa-angle-right"></i> {{$idea->name}} </p>
                        
                      </div>
                      <div class="description row" >
                        
                        <div class="col-lg-10 text-justify" style="margin-left: 35px">
                                <p style="font-family: 'Noto Sans TC', sans-serif;">
                                {{ str_limit($idea->description,220) }}
                            </p>
                        </div>
                        
                        
                      </div>
                      <div class="extra">
                        <div class="ui right floated button">
                          <a href="{{url('thesis_idea/details/' . $idea->id)}}">View Idea Detail</a>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
                </div>
            </div>

            @endif
            @endif
                @endforeach  

              


        </div>
    </div>
@endsection
