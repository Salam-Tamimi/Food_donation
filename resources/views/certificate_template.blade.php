<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        
.navbar-brand {
  color: var(--primary-color);
  font-size: var(--h6-font-size);
  font-weight: var(--font-weight-bold);
}

.navbar-brand span {
  display: inline-block;
  vertical-align: middle;
}

.navbar-brand small {
  color: var(--secondary-color);
  display: block;
  font-size: 10px;
  line-height: normal;
  text-transform: uppercase;
}

.logo {
  width: 80px;
  height: auto;
}

.navbar-expand-lg .navbar-nav .nav-link {
  margin-right: 0;
  margin-left: 0;
  padding: 20px;
}
.navbar-brand {
  color: #5bc1ac;
  font-weight: bolder;
}
    </style>
    </head>

<body>
    <!-- resources/views/pdf.blade.php -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">

                        <div class="row">
                            <div class="col-6">
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    <img src="{{ public_path('images/logo.png') }}" class="logo img-fluid" alt="Kind Heart Charity">
                                    <span>
                                        FoodSHare
                                        <small style="font-size: 12px; color:#5a6f80">Non-profit Organization</small>
                                    </span>
                                </a>
                            </div><br>
                            <div>
                                <center><h2>Donations Report</h2></center>
                            </div>
                            <h6>
                                Name: {{auth()->user()->name}}
                            </h6>
                        </div><br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="padding: 20px">NAME</th>
                                    <th style="padding: 20px">Description</th>
                                    <th style="padding: 20px">Price</th>
                                    <th style="padding: 20px">Quantity</th>
                                    <th style="padding: 20px">Total</th>
                                    {{-- <th style="padding: 20px">image</th> --}}
                                    <!-- Add more columns if needed -->
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                // $user_id = auth()->user()->id;
                                // $test = UserDonation::where('user_id', $user_id)->get();
                                $total = 0;
                                ?>
                                @foreach ($donation as $item)
                                    <tr>
                                        <td>{{ $item->donation->name }}</td>
                                        <td>{{ $item->donation->description }}</td>
                                        <td>{{ $item->donation->price }} </td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->donation->price * $item->quantity }} JOD</td>
                                        {{-- <td>{{ $donation->donation->image }}</td> --}}
                                        <!-- Add more columns if needed -->
                                        
                                            {{$total += $item->donation->price * $item->quantity}}
                                        
                                    </tr>
                                @endforeach

                                @foreach ($others as $donation)
                                            <tr>
                                                <td>(Other Donation)</b>
                                                </td>
                                                <td>{{ $donation->content }}</td>
                                                <td>--</td>
                                                <td>--</td>
                                                <td>--</td>
                                            </tr>
                                        @endforeach
                            </tbody>
                        </table>
                        <div>
                            <b>Total:
                                {{$total}}
                             JOD</b>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> <br><br><br><br><br>
    @php
        use Carbon\Carbon;
        $currentDate = Carbon::now();
        $formattedDate = Carbon::now()->format('Y-m-d');

    @endphp
    <center>
        <div style="display: flex; justify-content:space-between ; margin-left:300px">
            <div>
                <img src="{{ public_path('images/signature.png') }}" style="width: 200px" alt="Kind Heart Charity">
            </div>
            <div>
                CEO: Mohammad Bany Saleh 
                <br>
                Date: {{$formattedDate}}
            </div>
        </div>
    </center>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
