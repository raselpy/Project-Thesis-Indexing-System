@extends('layouts.admin')

@section('user')
   @foreach($users as $user)
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
            <span>MY Favorite</span></a>
        </li> 
       @endif
    @endforeach    
@endsection

@section('content')
    <div class="container" style="user-select: none;margin-left:95px;">
        <div class="row justify-content-center" style="margin-left: 137px;margin-top: 44px;">
          <h3 style="font-family: 'Francois One', sans-serif;text-align: center;">Student List</h3>
            <table class="ui celled structured table">
  <thead>
    <tr>
      <th rowspan="2">Name</th>
      <th rowspan="2">Email</th>
      <th colspan="3">Action</th>
    </tr>
    <tr>
      <th>Update</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      @if($user->role==1)
      @if($user->verified==1)
    <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td class="right aligned"><a href="{{route('admin.update',$user->id)}}">Update</a></td>
      <td class="center aligned">
        <a href="{{route('admin.delete',$user->id)}}">Delete</a>
      </td>
    </tr> 
    @endif
     @endif
    @endforeach 
  </tbody>
</table>
        </div>
    </div>
@endsection
