<!doctype html>
<html lang="en">

<head>
    <title>register</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="{{ asset('css/sign.css') }}">
</head>

<body>
<br><br><br>




    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="register-form" action="{{ route('register') }}">
                        @csrf
                        {{-- start name --}}
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"
                                    ></i></label>
                            <input type="text" name="name" id="name" placeholder="Your Name"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        {{-- end name --}}

                        {{-- start email --}}
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"
                                 />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        {{-- end email --}}

                        {{-- start password --}}
                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" id="password" placeholder="Password" name="password"  />
                          <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        {{-- end password --}}
                        {{-- start c password --}}
                        <div class="form-group">
                            <label for="password_confirmation"><i class="zmdi zmdi-lock-outline"
                                   ></i></label>
                            <input type="password" id="password_confirmation" placeholder="Repeat your password"
                                name="password_confirmation"  />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        {{-- end c password --}}
                        {{-- <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div> --}}


                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                        </div>

                    </form>
                </div>
                <div class="signup-image">
                    <figure>
                        <img src="images/reg2.png" alt="">
                    </figure>
                    <a href="login" class="signup-image-link">Already a member?</a>
                </div>
            </div>
        </div>
    </section>




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
