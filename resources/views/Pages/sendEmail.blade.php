@extends('Layout.master')
@section('title', 'Sens Email To All Users')
@section('content')
    <br><br><br><br><br><br><br>
    <div class="container">
        <form method="POST" action="{{ url('send-email-to-all-users') }}">
            @csrf
            @if (session('success'))
                <div id="vola_message" class="alert alert-primary">{{ session('success') }}</div>
            @endif
            <div class="mb-3">
                <h2>Send Eamil to all users</h2>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Subject</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="subject">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Message</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="message">
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
    <br><br><br><br><br><br><br>
@endsection
