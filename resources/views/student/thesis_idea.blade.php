@extends('layouts.app')

@section('content')
<div class="container" style="user-select: none;">
        <div class="row justify-content-center">
            

            <h2 style="font-family: 'Francois One', sans-serif; margin-bottom: 40px">Thesis Idea List</h2>
           @foreach($ideas as $idea)
                @if($idea->type=="thesis")

            <div class="ui" style="margin-bottom: 20px">
                <div class="ui ui tall stacked segment">
                    <div class="ui items">
                  <div class="item">
                    <div class="middle aligned content">
                      <div class="header">
                       <p style="font-size: 15px;font-family: 'Ropa Sans', sans-serif;"> Idea Name <i class="fas fa-angle-right"></i> {{$idea->name}} </p>
                        
                      </div>
                      <div class="description row" >
                        
                        <div class="col-lg-10 text-justify" style="margin-left: 35px">
                                <p style="font-family: 'Noto Sans TC', sans-serif;">
                                {{ str_limit($idea->description, 320) }}
                            </p>
                        </div>
                        
                        
                      </div>
                      <div class="extra">
                        <div class="ui right floated button">
                          <a href="{{url('thesis_idea/details/' . $idea->id)}}">View Idea Detail</a>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
                </div>
            </div>

            @endif
                @endforeach  

                <div>
                    {{$ideas->links()}}
                </div>


        </div>
    </div>
@endsection