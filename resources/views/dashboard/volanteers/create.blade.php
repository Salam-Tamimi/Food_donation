@extends('dashboard.dashboard_layouts.master')

@section('title','Create New volanteer')


@section('css')
@endsection

@section('title_page1')
Volunteers
@endsection

@section('title_page2')
Create New volanteer
@endsection

@section('content')


    <form method="POST" style="width: 80%;margin: 50px auto" action="{{ route('volanteers.store') }}">
        @csrf
        @method('post')
        <div class="form-group" >
          <label for="name">Volanteer Name:</label>
          <input type="text" name="name" class="form-control" id="name"  placeholder="Enter volanteer name">
          @error('name') <span class="text-danger">{{ $message }}</span>   @enderror

        </div>
        
        <div class="form-group">
          <label  for="email">volanteer email:</label>
          <input type="email" name="email" class="form-control" id="email"  placeholder="Enter volanteer email ">
          @error('email') <span class="text-danger">{{ $message }}</span>   @enderror
        </div>
        <div class="form-group">
          <label  for="job">volanteer job:</label>
          <input type="text" name="job" class="form-control" id="job"  placeholder="Enter volanteer job ">
          @error('job') <span class="text-danger">{{ $message }}</span>   @enderror
        </div>
        <div class="form-group">
          <label  for="comments">volanteer comments:</label>
          <input type="text" name="comments" class="form-control" id="comments"  placeholder="Enter volanteer comments ">
          @error('comments') <span class="text-danger">{{ $message }}</span>   @enderror
        </div>
        <div class="form-group">
          <label  for="mobile">volanteer mobile:</label>
          <input type="text" name="mobile" class="form-control" id="mobile"  placeholder="Enter volanteer mobile ">
          @error('mobile') <span class="text-danger">{{ $message }}</span>   @enderror
        </div>


          
        <br>
        <input type="submit" value="Add Volunteer" class="btn btn-success"><br>
      </form>
 
              
         
          
        
   
@endsection

@section('scripts')

@endsection