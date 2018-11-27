@extends('layouts.admin')

@section('content')
    <div class="container" style="user-select: none;margin-left:95px;">
        <div class="row justify-content-center">
        	@if (\Session::has('success'))
			    <div class="alert alert-success">
			        <ul>
			            <li>{!! \Session::get('success') !!}</li>
			        </ul>
			    </div>
			@endif
            <table class="ui celled structured table">

  <thead>
    <tr>
      <th rowspan="2">Name</th>
      <th rowspan="2">Email</th>
      <th colspan="3">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($users as $user)
      @if($user->role==2)
      @if($user->verified==1)
    <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>
	        
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
