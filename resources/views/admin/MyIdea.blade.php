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
            <span>MY Favorite</span></a>
        </li> 
       @endif
       @endauth 
@endsection

@section('content')

  <div class="container" style="user-select: none;margin-left:95px;">
        <div >
            <form class="ui form" method="GET" action="{{route('admin_myidea_search')}}">
              <div class="four fields">
                <input class="field" style="margin-left: 600px;" value="{{ isset($query) ? $query : '' }}" name="query" type="text" placeholder="File search">
                <button style="margin-left: 3px" class="src-btn" type="submit"><i class="search icon"></i></button>
              </div>  
            </form>
      </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
               
               <div>
                <h3 style="font-family: 'Francois One', sans-serif;text-align: center;">My Project/Thesis Idea List</h3>
                
                
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

                    @if($idea->status==1)
                    @if($idea->user_id == $user->id)
                        

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
                      <td class="center aligned">
                        <a href="{{route('idea.delete',$idea->id)}}">Delete</a>
                      </td>
                      

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