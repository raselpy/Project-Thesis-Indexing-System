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
@push('css')
    
    <style>
        .favorite_posts{
            color: blue;
        }
    </style>
@endpush
<div class="container" style="user-select: none;">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div>
            <div class="card">
               <div class="card-header"><p style="font-size: 15px;font-family: 'Ropa Sans', sans-serif;"> Idea Name <i class="fas fa-angle-right"></i> {{$ideas->name}} </p></div>
               

               <div class="card-body" style="background-color: #f5f5f5">
                        <div class="row">
                            <div class="col-lg-8 col-md-8" style="background-color: white;padding-top: 25px">
                                    <dt><span style="color: #3955F7;font-size: 20px">T</span>hesis Idea Detail : </dt>
                                    <div style="text-align: justify;font-family: 'Noto Sans TC', sans-serif;"> {{$ideas->description}}</div>
                            </div>

                                <div class="col-lg-4 col-md-4" style="background-color:  white;padding-top: 25px">
                                <div class="ui tall stacked segment">
                                 <div class="column">
                                      <div class="ui">
                                          @php
                                            $req_tech = $ideas->required_technology;
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
               <!-- <div class="card-body">
                  <div class="row">
                     <div class="col-lg-8 col-md-8">{{$ideas->required_technology}}</div>
                     <div class="col-lg-2 col-md-2">{{$ideas->type}}</div>
                     <div class="col-lg-2 col-md-2">{{$ideas->catagory}}</div>
                  </div>
               </div> -->
               <hr>
               <div>
                   <ul class="post-footer">
                   
                        @guest
                            <a href="javascript:void(0);" onclick="toastr.info('To add favorite list. You need to login first.','Info',{
                                closeButton: true,
                                progressBar: true,
                            })"><i class="thumbtack icon"></i>{{ $ideas->favorite_to_users->count() }}</a>
                        @else
                            <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $ideas->id }}').submit();"
                               class="{{ !Auth::user()->favorite_ideas->where('pivot.idea_id',$ideas->id)->count()  == 0 ? 'favorite_ideas' : ''}}"><i class="thumbtack icon"></i>{{ $ideas->favorite_to_users->count() }}</a>

                            <form id="favorite-form-{{ $ideas->id }}" method="POST" action="{{ route('idea.favorite',$ideas->id) }}" style="display: none;">
                                @csrf
                            </form>
                        @endguest

                    
                       
                         
                       
                   </ul>

               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<section class="comment-section">
        <div class="container">
            <h4 style="text-align: center;margin-top: 29px"><b>POST COMMENT</b></h4>
            <div class="row justify-content-center">

                <div class="col-lg-8 col-md-12">
                    <div class="comment-form">
                        @guest
                            <p>For post a new comment. You need to login first. <a href="{{ route('login') }}">Login</a></p>
                        @else
                            <form method="post" action="{{ route('comment.store',$ideas->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 ui placeholder">
                                        <textarea name="comment" rows="2" class="text-area-messge form-control ui very padded segment"
                                                  placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
                                    </div><!-- col-sm-12 -->
                                   
                                    <div class="col-sm-12 " style="margin-top: 20px">
                                        <button class="submit-btn ui button" type="submit" id="form-submit"><b>POST COMMENT</b></button>
                                    </div><!-- col-sm-12 -->

                                </div><!-- row -->
                            </form>
                        @endguest
                    </div><!-- comment-form -->

                   <h4><b>COMMENTS({{ $ideas->comments()->count() }})</b></h4>
                    @if($ideas->comments->count() > 0)
                        @foreach($ideas->comments as $comment)
                            <div class="commnets-area ui raised segment">

                                <div class="comment">

                                    <div class="post-info">
                                        <div class="middle-area">
                                            <a class="name" href="#"><b>{{ $comment->user->name }}</b></a>
                                            <h6 class="date line-height: 0.8" style="font-size: 10px;">on {{ $comment->created_at->diffForHumans()}}</h6>
                                        </div>

                                    </div><!-- post-info -->

                                    <p style="font-size: 15px;">{{ $comment->comment }}</p>

                                </div>

                            </div><!-- commnets-area -->
                        @endforeach
                    @else

                    <div class="commnets-area ">

                        <div class="comment">
                            <p>No Comment yet. Be the first :)</p>
                    </div>
                    </div>

                    @endif

                </div><!-- col-lg-8 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section>



@endsection
@push('js')

@endpush
