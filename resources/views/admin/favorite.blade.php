@extends('layouts.admin')

@section('user')
       @auth
            
        
       @if($user->role==3)
           <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="users icon"></i>
                <span>Users</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <h6 class="dropdown-header">Users:</h6>
                <a class="dropdown-item" href="{{route('admin.student')}}">Students</a>
                <a class="dropdown-item" href="{{route('admin.teacher')}}">Teachers</a>
              </div>
         </li>
       @endif
       @if($user->role==2)
           <li class="nav-item">
          <a class="nav-link" href="{{route('admin.favorite')}}">
            <i class="file icon"></i>
            <span>Favorite</span></a>
        </li> 
       @endif
       @endauth   
@endsection

@section('content')
<div class="container" style="margin-left:191px;margin-top:auto;">
        <div class="row justify-content-center">
           <h2 style="font-family: 'Francois One', sans-serif; margin-bottom: 40px">My Favorite Idea List</h2>
            <table class="ui celled padded table">
  <thead>
    <tr><th scope="col" style="text-align: center;" class="single line">Idea Type</th>
    <th scope="col" style="text-align: center;">Name</th>
    <th scope="col" style="text-align: center;">Idea Detail</th>
    
  </tr></thead>
  <tbody>
    @foreach($ideas as $idea)
    <tr>
      <td class="text-center">
        @if($idea->type=="project")
            <h5>
              Project
            </h5>
         @endif

         @if($idea->type=="thesis")
             <h5>
               Thesis
             </h5>         
          @endif
      </td>
      <td>
        <div> {{$idea->name}}</div>
      </td>
      <td class="right aligned text-center ">

         @if($idea->type=="project")
            <a class="ui button" href="{{url('project_idea/details/' . $idea->id)}}">View Idea Detail</a>
         @endif

         @if($idea->type=="thesis")
             <a class="ui button" href="{{url('thesis_idea/details/' . $idea->id)}}">View Idea Detail</a>
         @endif
      </td>
      
    </tr>
    @endforeach 
  </tbody>

</table>
        </div>
    </div>
@endsection