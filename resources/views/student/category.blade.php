@extends('layouts.app')

@section('content')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-6" style="background-color:  white">
               
               <form method="post" action="{{route('submit_category')}}">
                @csrf
                  <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Category">
                        
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
               </form>
                        
            </div>
        </div>
    </div>
@endsection
