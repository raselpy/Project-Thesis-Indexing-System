@extends('layouts.studentDashboard')

@section('content')
 
 <div class="container" style="user-select: none;margin-left:55px;">
    <div >
            <form class="ui form" method="GET" action="{{route('student.search.file')}}">
              <div class="four fields">
                <input class="field" style="margin-left: 742px;" value="{{ isset($query) ? $query : '' }}" name="query" type="text" placeholder="File search">
                <button style="margin-left: 3px" class="src-btn" type="submit"><i class="search icon"></i></button>
              </div>  
            </form>
      </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
               
               <div>
                <h3 style="font-family: 'Francois One', sans-serif;text-align: center;">My Project/Thesis List</h3>
                
                
                <table class="table" style="margin-top:40px">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Type</th>
                      <th scope="col">Namey</th>
                      <th scope="col">Team Member</th>
                      <th scope="col">Thesis supervisor</th>
                      <th scope="col">Doc</th>
                      <th scope="col">Source File</th>
                      <!-- <th scope="col">Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($files as $file)
                    @if($file->status==1)
                    @if($file->user_id == $user->id)

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

                      <!-- <td class="center aligned">
                        <a href="{{route('file.delete',$file->id)}}">Delete</a>
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