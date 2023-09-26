@extends('Layout.master')
@section('title', 'Money Donation')
@section('content')
<ul class="my-3">
    <a href="{{ url()->previous() }}"><svg style="margin-top: -5px;" width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM13.92 16.13H9C8.59 16.13 8.25 15.79 8.25 15.38C8.25 14.97 8.59 14.63 9 14.63H13.92C15.2 14.63 16.25 13.59 16.25 12.3C16.25 11.01 15.21 9.97 13.92 9.97H8.85L9.11 10.23C9.4 10.53 9.4 11 9.1 11.3C8.95 11.45 8.76 11.52 8.57 11.52C8.38 11.52 8.19 11.45 8.04 11.3L6.47 9.72C6.18 9.43 6.18 8.95 6.47 8.66L8.04 7.09C8.33 6.8 8.81 6.8 9.1 7.09C9.39 7.38 9.39 7.86 9.1 8.15L8.77 8.48H13.92C16.03 8.48 17.75 10.2 17.75 12.31C17.75 14.42 16.03 16.13 13.92 16.13Z" fill="#5bc1ac"></path> </g></svg></a>
    <a href="{{ url('/') }}">Home /</a>
    <a href="{{ route('subcategory', $donations->category->id) }}">
        {{ $donations->category->name}} /
    </a>
    <a href="{{ route('singleDonation2', $donations->id) }}">Single item / </a>
    <a href="{{ URL::current() }}"style="color: #5bc1ac">Donation</a>
</ul>
    <main>
        <section class="donate-section">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 mx-auto">
                        <form class="custom-form donate-form" action="{{ route('paypal') }}" method="post" role="form">
                            @csrf
                            @method('post')


                            <input type="hidden" name="donation_id" value="{{ $donations->id }}">
                            <h3 class="mb-4">Make a donation</h3>
                            <div class="d-flex px-10">
                                <div class="col-lg-6">
                                    <img src="{{ asset($donations->image) }}" alt="" width="150px">
                                </div>
                                <div class="col-lg-6">
                                    <p>Donation name:  {{ $donations->name }}</p>
                                    <p>Donation amount:  {{ $donations->price }} JOD</p>
                                    <p>{{ $donations->description }}</p>
                                </div>
                            </div>
                            <br>
                            <div class="row">

                                <div class="col-lg-12 col-12">
                                    <h5 class="mt-2 mb-3">Select an amount</h5>
                                </div>

                                <div class="col-lg-12 col-12 form-check-group">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"
                                            name="price">{{ $donations->price }} JOD</span>

                                        <input type="number" class="form-control" placeholder="select quantity"
                                            aria-label="Username" aria-describedby="basic-addon1" min="1"
                                            value="1" name="quantity" id="quantityInput">
                                    </div>
                                    <!-- Hidden input field to store the price -->
                                    <input type="hidden" id="priceInput" name="donationPrice" value="{{ $donations->price }}">
                                </div>

                                <div class="col-lg-12 col-12">
                                    <h5 class="mt-1">Personal Info</h5>
                                </div>

                                <div class="col-lg-6 col-12 mt-2">
                                    <label id="basic-addon1" for="donation-phone">Phone</label>
                                    <input type="text" name="donation-phone" id="donation-phone" class="form-control"
                                        placeholder="">
                                        @if ($errors->has('donation-phone'))
                                        <span class="text-danger">{{ $errors->first('donation-phone') }}</span>
                                        @endif
                                </div>
                                <div class="col-lg-6 col-12 mt-2">
                                    <label id="basic-addon1" for="donation-address">Address</label>
                                    <input type="text" name="donation-address" id="donation-address" class="form-control"
                                        placeholder="">
                                        @if ($errors->has('donation-address'))
                                        <span class="text-danger">{{ $errors->first('donation-address') }}</span>
                                        @endif
                                </div>

                                <input type="hidden" name="price" id="hiddenPrice" value="{{ $donations->price }}">
                                <div class="col-lg-12 col-12">
                                    <div class="form-check" style="padding-left: 0">
                                        <br>
                                        <button class="col-lg-12 col-12 mt-2" type="submit"
                                            style="text-decoration: none; border: #555555 1px solid; background-color: white;padding:10px; border-radius:30px; color:black;"
                                            name="paypal" value="Paypal"><i
                                                class="bi-paypal custom-icon ms-1"></i>Paypal</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
