@extends('layouts.studentDashboard')



@section('content')

  <div class="container" style="user-select: none;margin-left:95px;">
    <div >
            <form class="ui form" method="GET" action="{{route('student.search.idea')}}">
              <div class="four fields">
                <input class="field" style="margin-left: 650px;" value="{{ isset($query) ? $query : '' }}" name="query" type="text" placeholder="File search">
                <button style="margin-left: 3px" class="src-btn" type="submit"><i class="search icon"></i></button>
              </div>  
            </form>
      </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
               
               <div>
                <h3 style="font-family: 'Francois One', sans-serif;text-align: center;">Project/Thesis Idea List</h3>
                
                
                <table class="table" style="margin-top:40px">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Type</th>
                      <th scope="col">Name</th>
                      <th scope="col">View</th>
                      <!-- <th scope="col">Action</th> -->
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
                      <!-- <td class="center aligned">
                        <a href="{{route('idea.delete',$idea->id)}}">Delete</a>
                      </td> -->
                      

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