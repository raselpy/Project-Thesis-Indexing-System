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
    <div class="container" style="user-select: none;margin-left:55px;">

      <div >
            <form class="ui form" method="GET" action="{{route('admin_project_search')}}">
              <h4> <span class="ui dividing header "> Enter Necessary Info For Search </span></h4>
              <div class="three fields ">

                
                       <select name="type" style="margin-left: 40px;" class="form-control">
                        <option selected disabled>Select type</option>
                            @foreach ($file_all as $file)
                              <option value="{{ $file->type }}">{{ $file->type}}</option>
                            @endforeach
                       </select>
                       <select name="Supervisor" style="margin-left: 40px;" class="form-control">
                        <option selected disabled>Select Supervisor</option>
                            @foreach ($file_unique as $file)
                              <option value="{{ $file->supervisor_name }}">{{ $file->supervisor_name}}</option>
                            @endforeach
                       </select>

                       <input class="field" style="margin-left: 40px;" value="{{ isset($name) ? $name : '' }}" name="name" type="text" placeholder="File name">
                       
                      <button style="margin-left: 3px" class="src-btn" type="submit"><i class="search icon"></i></button>
                   </div> 
            </form>
      </div>
      
        <div class="row justify-content-center">
            <div class="col-md-12">

               
               <div>
                <h3 style="font-family: 'Francois One', sans-serif;text-align: center;">Project/Thesis List</h3>
                
                
                <table class="table" style="margin-top:40px">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Type</th>
                      <th scope="col">Namey</th>
                      <th scope="col">Team Member</th>
                      <th scope="col">Thesis supervisor</th>
                      <th scope="col">Doc</th>
                      <th scope="col">Source File</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($files as $file)
                    @if($file->status==1)

                    <tr>
                      <th scope="row">
                        @if($file->type=="project")
                    <h5>
                      Project
                    </h5>
                    @endif

                 @if($file->type=="thesis")
                     <h5>
                       Thesis
                     </h5>         
                  @endif
                      </th>
                      <td>
                          
                             {{$file->name}}
                                 
                      </td>
                      <td>
                          {{$file->contributor_name1}}<br> 
                          {{$file->contributor_id1}} <br> 
                          {{$file->contributor_name2}} <br> 
                          {{$file->contributor_id2}}
                      </td>
                      <td>{{$file->supervisor_name}}</td>
                      <td>
                        <form action="{{route('downloadDocFile')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="fileId" value="{{$file->id}}">
                                    <button  class="btn btn-primary">
                                    <i class="glyphicon glyphicon-download">
                                        Download Doc
                                    </i>
                                    </button>
                                </form>
                      </td>
                      <td>
                        
                              @if($file->type=="project")
                                <form action="{{route('downloadZipFile')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="fileId" value="{{$file->id}}">
                                    <button  class="btn btn-primary">
                                    <i class="glyphicon glyphicon-download">
                                        Download Zip
                                    </i>
                                    </button>
                                </form>
                                @endif
                            
                      </td>

                      <td class="center aligned">
                        <a href="{{route('file.delete',$file->id)}}">Delete</a>
                      </td>

                    </tr>
                    @endif
                @endforeach
                    
                  </tbody>
                </table>
                   
                
               </div>

              
                        
               </div>
        </div>
    </div>
@endsection
