@extends('layouts.studentDashboard')

@section('content')
<div class="container" style="margin-left:99px;margin-top:auto;">
    <div >
            <form class="ui form" method="GET" action="{{route('student.search.farorite.idea')}}">
              <div class="four fields">
                <input class="field" style="margin-left: 650px;" value="{{ isset($query) ? $query : '' }}" name="query" type="text" placeholder="File search">
                <button style="margin-left: 3px" class="src-btn" type="submit"><i class="search icon"></i></button>
              </div>  
            </form>
      </div>
        <div class="row justify-content-center">
           <h2 style="font-family: 'Francois One', sans-serif; margin-bottom: 40px">My Favorite Idea List</h2>
            <table class="ui celled padded table">
  <thead>
    <tr><th scope="col" style="text-align: center;" class="single line">Idea Type</th>
    <th scope="col" style="text-align: center;">Name</th>
    <th scope="col" style="text-align: center;">Idea Detail</th>
    
  </tr></thead>
  <tbody>
    @foreach($fav_ideas as $fav_idea)
    @foreach($ideas as $idea)
    @if($idea->id==$fav_idea->id)
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
   
    @endif
    @endforeach 
    @endforeach 
  </tbody>

</table>
        </div>
    </div>
@endsection