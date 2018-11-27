@extends('layouts.app')

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
               
               <form class="ui form" method="post" action="{{route('store_idea')}}" enctype="multipart/form-data">
                   @csrf

                   <div class="row" style="margin-bottom: 30px">
                     <div class="col-lg-4"></div>
                     <div class="col-lg-4">
                         <h4 class="ui dividing header text-center">Project/Thesis Idea Form</h4>
                     </div>
                     <div class="col-lg-4"></div>
                   </div>
                   
                   <div class="two fields">
                       <div class="form-group field ">
                            <select name="type" class="form-control" >
                              <option>Select Type</option>
                                <option value="project">Project</option>
                                <option value="thesis">Thesis</option>
                            </select> 
                       </div>


                       <div class="form-group field">
                           <select id="catagory" name="catagory" class="form-control">
                            <option>Select Idea Area</option>
                                @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name}}</option>
                                @endforeach
                           </select>
                       </div>
                   </div>

                    <label class="ui dividing ">Idea Info</label>
                   <div class="two fields">
                       <div class="form-group field">
                        <input type="textarea" name="name" class="form-control" placeholder="name">
                       </div>
                       <div class="form-group field">
                           <input type="text" name="required_technology" class="form-control" placeholder="Enter required technology">
                       </div>
                   </div>


                    <label >Idea discussion</label>
                   <div class="form-group">
                          
                          <textarea class="form-control" placeholder="description" id="description" name="description">{{old('description')}}</textarea>
                   </div>

                   
                   

                   <div style="margin-left: 15px; margin-top: 20px" class="row"> 
                       <div class="col-lg-4 col-md-4"></div>
                       <div class="col-lg-4 col-md-4"><button type="submit" class="ui button">Submit</button> </div>
                       <div class="col-lg-4 col-md-4"><a class="nav-link item ui button" href="{{route('category')}}">Create New Idea Area</a></div> 
               </form>
                        
            </div>
        </div>
    </div>

   

        <script>
            CKEDITOR.replace( 'description' );
        </script>
@endsection