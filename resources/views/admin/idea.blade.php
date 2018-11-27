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
    @endforeach    
@endsection

@section('content')
     <div class="container" style="user-select: none;margin-left:95px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
               
               <div>
                <h3 style="font-family: 'Francois One', sans-serif;text-align: center;">Project/Thesis Idea List</h3>
                
                
                <table class="table" style="margin-top:40px">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Type</th>
                      <th scope="col">Name</th>
                      <th scope="col">View</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($ideas as $idea)
                        

                    <tr>
                      <th scope="row">
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
                      </th>
                      <td>
                          {{$idea->name}}
                      </td>
                      <td>
                         @if($idea->type=="project")
				            <a class="ui button" href="{{url('project_idea/details/' . $idea->id)}}">View Idea Detail</a>
				         @endif

				         @if($idea->type=="thesis")
				             <a class="ui button" href="{{url('thesis_idea/details/' . $idea->id)}}">View Idea Detail</a>
				         @endif  
                      </td>
                      <td>{{$idea->supervisor_name}}</td>
                      

                    </tr>
                @endforeach
                    
                  </tbody>
                </table>
                   
                
               </div>

               <div class="row">
                   <div class="col-lg-5 col-md-5"></div>
                   <div class="col-lg-3 col-md-3">
                       {{$ideas->links()}}
                   </div>
                   <div class="col-lg-4 col-md-4"></div>
               </div>
                        
               </div>
        </div>
    </div>


@endsection