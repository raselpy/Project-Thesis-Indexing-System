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

<div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-8" style="background-color:  white">

               @if (count($errors) > 0)
                      <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                      </div>
                      @endif

                        @if(session('success'))
                        <div class="alert alert-success">
                          {{ session('success') }}
                        </div> 
                @endif
               
               <form class="ui form" method="post" action="{{route('store_files')}}" enctype="multipart/form-data">
                   @csrf

                   <div class="row" style="margin-bottom: 30px">
                     <div class="col-lg-4"></div>
                     <div class="col-lg-4">
                         <h4 class="ui dividing header text-center">Project/Thesis Information Form</h4>
                     </div>
                     <div class="col-lg-4"></div>
                   </div>
              
                   <div class="two fields">
                       <div class="form-group  field">
                        <select name="type" class="form-control" >
                          <option>Select Type</option>
                            <option value="project">Project</option>
                            <option value="thesis">Thesis</option>
                        </select> 
                   </div>


                   <div class="form-group field">
                       <select id="catagory" name="catagory" class="form-control">
                        <option>Select Category</option>
                            @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name}}</option>
                            @endforeach
                       </select>
                   </div>
                   </div>

                   <!-- contributer1 -->
                   <label>Team</label>
                   <div class="two fields">
                       
                       <div class="form-group field">
                            <input type="textarea" name="contributor_name1" class="form-control" placeholder="contributor_name1">
                       </div>
                       <div class="form-group field">
                            <input type="textarea" name="contributor_id1" class="form-control" placeholder="contributor_id1">
                       </div>
                       <!-- end1 -->

                        
                   </div>

                   <div class="two fields">
                    <!-- contributer2 -->
                       <div class="form-group field">
                            <input type="textarea" name="contributor_name2" class="form-control" placeholder="contributor_name2">
                       </div>
                       <div class="form-group field">
                            <input type="textarea" name="contributor_id2" class="form-control" placeholder="contributor_id2">
                       </div>
                   </div>
                   <!-- end2 -->
                   
                   
                   <!-- superviser -->
                   <div class="two fields">
                       <div class="form-group field">
                        <label>Supervisor</label>
                        <input type="textarea" name="supervisor_name" class="form-control" placeholder="supervisor_name">
                       </div>

                       <div class="form-group field">
                       </div>
                   </div>
                   
                   <!-- endsuperviser -->

                      <div class="two fields">
                          <div class="form-group field">
                        <label>Project Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Project name">
                       </div>
                       <div class="form-group field">
                        <label>RequiredTechnology</label>
                       <input type="text" name="required_technology" class="form-control" placeholder="Enter required technology">
                   </div>
                      </div>

                      <div class="form-group field">
                        <input type="hidden" name="user" value="{{ $user->id }}">
                       </div>

                   


                   <div class="form-group">
                          <label>Abstract / Project summary</label>
                          <textarea class="form-control" placeholder="description" id="description" name="description">{{old('description')}}</textarea>
                   </div>

                   <label class="ui dividing header">Files Section</label>
                   <div class="two fields">
                        
                         <div class="form-group field">
                          <label>Upload Doc file</label>
                             <input type="file" name="doc" class="form-control" placeholder="Enter doc">
                         </div>

                         

                         
                         <div class="form-group field">
                          <label>Upload source file</label>
                             <input type="file" name="path" class="form-control" placeholder="Enter files">
                         </div>
                   </div>

                   <label>Upload Image file</label>
                         <div class="form-group field">
                             <input type="file" name="image[]" class="form-control" placeholder="Enter image" multiple>
                         </div>

                         <!-- <label>Upload source image</label>
                         <div class="form-group">
                             <input type="file" name="images" class="form-control" placeholder="Enter files" >
                         </div> -->

                   <div style="margin-left: 15px; margin-top: 20px" class="row"> 
                       <div class="col-lg-4 col-md-4"></div>
                       <div class="col-lg-4 col-md-4"><button type="submit" class="ui button">Submit</button> </div>
                       <div class="col-lg-4 col-md-4"><a class="nav-link item ui button" href="{{route('category')}}">Create New Category</a></div>
                                  
                   </div>   
               </form>
                        
            </div>
        </div>
    </div>




   


@endsection