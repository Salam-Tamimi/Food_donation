@if (session('success'))
    <div id="vola_message" class="alert alert-primary">{{ session('success') }}</div>
@endif
@extends('Layout.master')
@section('title', 'Restuarant Copouns')
@section('content')
<ul class="my-3">
  <a href="{{ url()->previous() }}"><svg style="margin-top: -5px;" width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM13.92 16.13H9C8.59 16.13 8.25 15.79 8.25 15.38C8.25 14.97 8.59 14.63 9 14.63H13.92C15.2 14.63 16.25 13.59 16.25 12.3C16.25 11.01 15.21 9.97 13.92 9.97H8.85L9.11 10.23C9.4 10.53 9.4 11 9.1 11.3C8.95 11.45 8.76 11.52 8.57 11.52C8.38 11.52 8.19 11.45 8.04 11.3L6.47 9.72C6.18 9.43 6.18 8.95 6.47 8.66L8.04 7.09C8.33 6.8 8.81 6.8 9.1 7.09C9.39 7.38 9.39 7.86 9.1 8.15L8.77 8.48H13.92C16.03 8.48 17.75 10.2 17.75 12.31C17.75 14.42 16.03 16.13 13.92 16.13Z" fill="#5bc1ac"></path> </g></svg></a>

    <a href="{{ url('/') }}">Home /</a>
    <a href="{{ URL::current() }}">
        {{ $singleDonation->category->name }} /
    </a>
    <a href="{{ URL::current() }}">
        {{ $singleDonation->name }}
    </a>
</ul>
    <main>

        <section class="news-section section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12">
                        <div class="news-block">
                            <div class="news-block-top">
                                <img src="{{ asset($singleDonation->image) }}"
                                    class="news-image img-fluid col-lg-12" >

                                <div class="news-category-block">
                                    <a href="#" class="category-block-link">
                                        You can help turn hunger into hope!
                                    </a>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="col-lg-6 col-12 mx-auto mt-4 mt-lg-0">
                        <div class="news-block-info">


                                <div class="news-block-title mb-2">
                                    <h4>{{ $singleDonation->name }}</h4>
                                </div>

                                <div class="news-block-body">
                                    <p>{{ $singleDonation->description }}</p>
                                </div>
<div class="row">
    <h5 class="mb-3 col-2">{{ $singleDonation->price }} JOD</h5>
                                <div class="col-10" style="height: 45px;">                    
                                        <a href="{{ route('money.show', ['id' => $singleDonation->id]) }}">
                                        <div class="plans2"><img src="{{ asset('images/moneydonate.png') }}" style="height: 35px; width: 35px;"><br>
                                            <h6 class="pt-2"><a href="{{ route('money.show', ['id' => $singleDonation->id]) }}"><span style="color:#5c5c5c;"><strong>Donate</strong></span></a></h6>
                                        </div>
                                        </a>
                                </div>
</div>
                                
                            </div>
                            
                    </div>
                    
                </div>
                <br><br>
                
            </div>
        </section>

    </main>

@endsection
