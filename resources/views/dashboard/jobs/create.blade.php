@extends('dashboard.dashboard_layouts.master')

@section('title','Create New Category')


@section('css')
@endsection

@section('title_page1')
Jobs
@endsection

@section('title_page2')
Create New Job
@endsection

@section('content')


    <form method="POST" style="width: 80%;margin: 50px auto" action="{{ route('jobs.store') }}">
        @csrf
        @method('post')
        <div class="form-group" >
          <label for="name">Job Name:</label>
          <input type="text" name="name" class="form-control" id="name"  placeholder="Enter Category name">
          @error('name') <span class="text-danger">{{ $message }}</span>   @enderror

        </div>
          
        <br>
        <input type="submit" value="Add Job" class="btn btn-success"><br>
      </form>
 
              
         
          
        
   
@endsection

@section('scripts')

@endsection