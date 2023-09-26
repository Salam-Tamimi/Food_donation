@extends('Layout.master')
@section('title', 'Sub Category')
@section('content')
<ul class="my-3">
  <a href="{{ url()->previous() }}"><svg style="margin-top: -5px;" width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.19 2H7.81C4.17 2 2 4.17 2 7.81V16.18C2 19.83 4.17 22 7.81 22H16.18C19.82 22 21.99 19.83 21.99 16.19V7.81C22 4.17 19.83 2 16.19 2ZM13.92 16.13H9C8.59 16.13 8.25 15.79 8.25 15.38C8.25 14.97 8.59 14.63 9 14.63H13.92C15.2 14.63 16.25 13.59 16.25 12.3C16.25 11.01 15.21 9.97 13.92 9.97H8.85L9.11 10.23C9.4 10.53 9.4 11 9.1 11.3C8.95 11.45 8.76 11.52 8.57 11.52C8.38 11.52 8.19 11.45 8.04 11.3L6.47 9.72C6.18 9.43 6.18 8.95 6.47 8.66L8.04 7.09C8.33 6.8 8.81 6.8 9.1 7.09C9.39 7.38 9.39 7.86 9.1 8.15L8.77 8.48H13.92C16.03 8.48 17.75 10.2 17.75 12.31C17.75 14.42 16.03 16.13 13.92 16.13Z" fill="#5bc1ac"></path> </g></svg></a>
<a href="{{ url('/') }}">Home /</a>
<a href="{{ URL::current() }}"style="color: #5bc1ac">
  @php $categoryNameDisplayed = false; @endphp

  @foreach ($donations as $donation)
      @if (!$categoryNameDisplayed)
          {{ $donation->category->name }}
          @php $categoryNameDisplayed = true; @endphp
      @endif
  @endforeach 
</a>
</ul>
<section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center my-4">

        <h2>

          @php $categoryNameDisplayed = false; @endphp

          @foreach ($donations as $donation)
              @if (!$categoryNameDisplayed)
                  {{ $donation->category->name }}
                  @php $categoryNameDisplayed = true; @endphp
              @endif
          @endforeach

        </h2>
      </div>

        <div class="row grid">
          @foreach ($donations as $donation)
          <div class="col-sm-6 col-lg-4 all ">
            <div class="box">
              <div>

                <div class="img-box">
                  <img src="{{ asset($donation->image) }}" class="img-fluid" alt="{{ $donation->name }}">
                </div>
                <div class="detail-box">
                  <h5>
                    {{ $donation->name }}
                  </h5>
                  <p style="color: white">
                    {{ $donation->description }}
                  </p>
                  <div class="options d-flex justify-around">
                    <h6 class="text-light">
                      {{ $donation->price }} JOD
                    </h6>
                    @if ($donation->category->id == 3)
                    <a href="{{ route('singleDonationCoupons', $donation->id) }}"><button class="orange-button">Donate</button></a>
                    @else
                    <a href="{{ route('singleDonation2', $donation->id) }}"><button class="orange-button">Donate</button></a>

                    @endif
                  </div>

                </div>
              </div>
            </div>
          </div>
          @endforeach
          @if ($donation->category->id != 3)
            <div class="col-12 my-4 rounded-5 py-3" style="background: #f0f8ff">
              <center>
                <h4 style="color: #5a6f80">If you want to donate something else</h4>
                  <br><br>
                  
                  <div class="col-2 custom-form">
                      <a href="{{ route('other.show') }}"><button type="submit" class="form-control">click here</button></a>
                  </div>
              </center>
            </div>
          @endif  
        </div>
        


    </div> <br>
    <div style="padding-bottom: 10px;font-size: 14px;margin-left:45%;margin-top:30px;" >
      {{ $donations->links() }}
  </div>
  </section>

@endsection
