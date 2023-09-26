<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 mb-4">
                <img src="{{ asset('images/logo.png') }}" class="logo img-fluid" alt="">
                <a class="navbar-brand">
                    <span>
                        FoodSHare
                        <small>Non-profit Organization</small>
                    </span>
                </a>
                <br><br><br>
                <h5 style="color: white">You can help turn hunger <br> into hope!</h5>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <h5 class="site-footer-title mb-3">Quick Links</h5>

                <ul class="footer-menu d-flex flex-column">
                    <li class="footer-menu-item"><a href="#ourStory" class="footer-menu-link">Our Story</a></li>

                    <li class="footer-menu-item"><a href="#" class="footer-menu-link">Causes</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <h5 class="site-footer-title mb-3">Volunteer now</h5>

                <ul class="footer-menu">

                    <li class="footer-menu-item"><a href="{{ url('/#becomeVol') }}" class="footer-menu-link">Become a volunteer <br>
                        Partner with us
                    </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-6 col-12 mx-auto">
                <h5 class="site-footer-title mb-3">Contact Infomation</h5>

                <p class="text-white d-flex mb-2">
                    <i class="bi-telephone me-2"></i>

                    <a href="tel: 305-240-9671" class="site-footer-link">
                        +962 7 9987 6142
                    </a>
                </p>

                <p class="text-white d-flex">
                    <i class="bi-envelope me-2"></i>

                    <a href="mailto:info@yourgmail.com" class="site-footer-link">
                        donate@gmail.com
                    </a>
                </p>

                <p class="text-white d-flex mt-3">
                    <i class="bi-geo-alt me-2"></i>
                    Irbid, Jordan
                </p>

                <a href="{{url('contact-us')}}" class="custom-btn btn mt-3">Contact Us</a>
            </div>
        </div>
    </div>

    <div class="site-footer-bottom">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-7 col-12">
                    <p class="copyright-text ">Copyright © 2036 <a href="#">FoodSHare</a>
                    </p>
                </div>

                <div class="col-lg-6 col-md-5 col-12 d-flex justify-content-center align-items-center mx-auto">
                    <ul class="social-icon">
                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-twitter"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-facebook"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-instagram"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href="#" class="social-icon-link bi-linkedin"></a>
                        </li>

                        <li class="social-icon-item">
                            <a href=" class="social-icon-link bi-youtube"></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>

<!-- JAVASCRIPT FILES -->

{{-- <script src="{{ asset('js/session-messages.js') }}"></script> --}}
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.sticky.js') }}"></script>
<script src="{{ asset('js/click-scroll.js') }}"></script>
<script src="{{ asset('js/counter.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/donation.js') }}"></script>
{{-- <script src="{{ asset('js/partners.js') }}"></script> --}}

<script>
    $(document).ready(function() {
        // Check if the success message is present
        var successMessage = $('#vola_message');

        if (successMessage.length) {
            // Hide the success message after 5 seconds
            setTimeout(function() {
                successMessage.fadeOut('slow');
            }, 5000);
        }
    });
</script>

</body>

</html>
