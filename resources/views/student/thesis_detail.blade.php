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
<div class="container" style="user-select: none;">
        <div class="row justify-content-center">
            <div class="col-md-12">
               
               <div>
                
            
                   <div class="card">
                    <!-- @if($files->type=="thesis") 
                       <div class="card-header">{{"Thesis"}}</div>
                    @endif
                    @if($files->type=="project") 
                       <div class="card-header">{{"Project"}}</div>
                    @endif -->
                    <div class="card-header text-center" style="text-align: center;">
                      <h5 style="font-family: 'Francois One', sans-serif;">Thesis</h5><i class="fas fa-angle-double-down"></i>
                      <h5 style="font-family: 'Comfortaa', cursive;"> {{$files->name}}</h5>
                    </div>

                    <div class="card-body">

                      
                        <div class="row">
                          <div class="col-md-6 col-lg-6">
                            <h5 style="padding-left: 76px; font-family: 'Oswald', sans-serif; padding-bottom: 20px">Thesis Member/Members</h5>
                             <div class="row">
                                 <div class="col-lg-6 col-md-6">
                              <p><i class="fas fa-user-circle"> {{$files->contributor_name1}} </i></p>
                              <p><i class="fas fa-id-card"> {{$files->contributor_id1}}</i></p>
                            </div>
                            <div class="col-lg-6 col-md-6">
                              <p><i class="fas fa-user-circle"> {{$files->contributor_name2}} </i></p>
                              <p><i class="fas fa-id-card"> {{$files->contributor_id2}}</i></p>
                            </div>
                             </div>
                          </div>
                          <div class="col-md-6 col-lg-6">
                            <h5 class="text-center" style="font-family: 'Oswald', sans-serif; padding-bottom: 20px">Thesis Supervisor</h5>
                            <p class="text-center"><i class="fas fa-user-alt">  {{$files->supervisor_name}}</i></p>
                          </div>
                        </div>
                        
                        
                    </div>
                   
                    <div class="card-body" style="background-color: #f5f5f5">
                        <div class="row">
                            <div class="col-lg-8 col-md-8" style="background-color: white;padding-top: 25px">
                                    <dt><span style="color: #3955F7;font-size: 20px">P</span>roject Detail : </dt>
                                    <p style="text-align: justify;font-family: 'Noto Sans TC', sans-serif;"> {{$files->description}}</p>
                            </div>

                                <div class="col-lg-4 col-md-4" style="background-color:  white;padding-top: 25px">
                                <div class="ui tall stacked segment">
                                 <div class="column">
                                      <div class="ui">
                                          @php
                                            $req_tech = $files->required_technology;
                                            $names = explode(",", $req_tech);
                                          @endphp
                                                
                                                
                                               <dt><span style="color: #3955F7;font-size: 20px">R</span>equied Technology </dt>

                                              <div class="ui secondary segment service-hov">
                                                @foreach($names as $name)
                                                  <dd style="color: black;padding-left: 15px"><i class="fas fa-angle-double-right">{{$name}}</i></dd>
                                                @endforeach
                                              </div>
                                          

                                      </div>
                                  </div>
                                </div>
                                </div>
                        </div>                                                                      
                        
                    </div>
                    <div class="card-body">
                      <h4 class="text-center" style="font-family: 'Oswald', sans-serif;">Thesis Screenshot</h4>
                        <div class="row" style="padding-top: 25px">
                            
                                    @php
                                      $req_img = $files->image;
                                      $images = explode(",", $req_img);

                                    @endphp


                                    @foreach($images as $image)
                                    
                                       
                                      <div style="padding-left: 10px">
                                           <img class="rounded mx-auto d-block" src="/storage/images/{{$image}}" max-height="300px" width="340px">
                                      </div>

                                     
                                    @endforeach

                            
                            
                        </div>                                                                      
                    </div>
                     <hr>
                    <div class="card-body">
                        <div class="row">

                                                                                 
                                <!-- <form action="{{route('downloadDocFile')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="fileId" value="{{$files->id}}">
                                    <button  class="btn btn-primary">
                                    <i class="glyphicon glyphicon-download">
                                        Download Doc
                                    </i>
                                    </button>
                                </form>

                                <form action="{{route('downloadZipFile')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="fileId" value="{{$files->id}}">
                                    <button  class="btn btn-primary">
                                    <i class="glyphicon glyphicon-download">
                                        Download Zip
                                    </i>
                                    </button>
                                </form> -->
                            <!-- </a> -->

                            <hr>
                        
                    
                        <div class="col-lg-4">
                                    @php
                                      $req_time = $files->created_at;
                                      $names = explode(" ", $req_time);
                                      $times = $names[0];
                                    @endphp

                            <p style="font-family: 'Pontano Sans', sans-serif;">Created At: {{$times}}</p>
                        </div>
                        <div class="col-lg-4">
                            <a href="#"><i class="fas fa-eye"></i></a> <span style="font-family: 'Pontano Sans', sans-serif;">Total views: {{ $files->view_count }} </span>
                        </div>
                        <div class="col-lg-4">
                            
                        </div>
                                                   
                        </div>
                    </div>
                    
                                   
                </div>           
               
               </div> 


                        
            </div>

            




            
            
        </div>
    </div>
@endsection