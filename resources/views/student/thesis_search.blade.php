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
            <form class="ui form" method="GET" action="{{route('thesis_search')}}">
              <div class="four fields">
                <input class="field" style="margin-left: 800px;" value="{{ isset($query) ? $query : '' }}" name="query" type="text" placeholder="File search">
                <button style="margin-left: 3px" class="src-btn" type="submit"><i class="search icon"></i></button>
              </div>  
            </form>
      </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
               
               <div>
                <h3 style="font-family: 'Francois One', sans-serif;text-align: center;">Thesis List</h3>
                
                
                <table class="table" style="margin-top:40px">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Thesis Name</th>
                      <th scope="col">Used Technology</th>
                      <th scope="col">Team Member</th>
                      <th scope="col">Thesis supervisor</th>
                      <th scope="col">View Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($files as $file)
                        @if($file->type=="thesis") 
                        @if($file->status==1)

                    <tr>
                      <th scope="row">{{$file->name}}</th>
                      <td>
                          @php
                                    $req_tech = $file->required_technology;
                                    $names = explode(",", $req_tech);
                                @endphp
                                @foreach($names as $name)
                                 <dd style="color: black;padding-left: 15px"><i class="fas fa-angle-double-right"> {{$name}}</i></dd>
                                 @endforeach
                      </td>
                      <td>
                          {{$file->contributor_name1}} <i class="fas fa-angle-right"></i>
                          {{$file->contributor_id1}} <br> 
                          {{$file->contributor_name2}} <i class="fas fa-angle-right"></i>
                          {{$file->contributor_id2}}
                      </td>
                      <td>{{$file->supervisor_name}}</td>
                      <td><a href="{{url('thesis/details/' . $file->id)}}">More</a></td>
                    </tr>
                    @endif
                    @endif
                @endforeach
                    
                  </tbody>
                </table>
                   
                
               </div>

            
                        
               </div>
        </div>
    </div>
@endsection
