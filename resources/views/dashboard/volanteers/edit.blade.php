@extends('dashboard.dashboard_layouts.master')

@section('title','Edit vo')


@section('css')
@endsection

@section('title_page1')
Edit 

@endsection
@section('title_page2')
Edit volanteer
@endsection

@section('content')

<div class="container-fluid">
    <h2>Edit volanteer Information</h2>
     
    <form action="{{ route('volanteers.update', $volanteers->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">volanteer Name:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required
                value="{{ old('name', $volanteers->name) }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">volanteer email:</label>
            <input type="email" name="email" class="form-control " required
                value="{{ old('email', $volanteers->email) }}">
            {{-- @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror --}}
        </div>
        <div class="form-group">
            <label for="mobile">volanteer job:</label>
            <input type="text" name="job" class="form-control-file @error('job') is-invalid @enderror"
            value="{{ old('job', $volanteers->job) }}">
            @error('job')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="comments">volanteer comments:</label>
            <input type="text" name="comments" class="form-control-file @error('comments') is-invalid @enderror"
            value="{{ old('comments', $volanteers->comments) }}">
            @error('comments')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="mobile">volanteer mobile:</label>
            <input type="text" name="mobile" class="form-control-file @error('mobile') is-invalid @enderror"
            value="{{ old('mobile', $volanteers->mobile) }}">
            @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        
        <button type="submit" class="btn btn-primary">Update</button>
        {{-- <input type="submit" value="Update" class="btn btn-primary"> --}}
    </form>
    </div>
</div>
        


@endsection

@section('scripts')

@endsection