<footer class="footer-area">
    <div class="ftr-top">
        <div class="container">
            <div class="row">

                <div class="ftr__logo col-md-2">
                    <a href="/"><img src="{{ asset('assets/web/images/ftr-logo.png') }}" alt="logo"></a>
                </div>

                <div class="ftr__links check-nav col-md-5">
                    <div class="row justify-content-around">
                        <div class="col col__first">
                            <ul>
                                <li><a class="scroller" href="{{ route('/', [ '#aboutUs' ]) }}">ABOUT CHIRONS</a></li>
                                <li><a class="scroller" href="{{ route('/', [ '#howItWork' ]) }}">HOW IT WORKS</a></li>
                                <li><a href="{{ route('search_trainers') }}">TRAINERS</a></li>
                            </ul>
                        </div>
                        <div class="col col__second">
                            <ul>
                                <li><a class="scroller" href="{{ route('/', [ '#contactUs' ]) }}">CONTACT US</a></li>
                                <li><a href="#">BOOKING & PAYMENT</a></li>
                                <li><a href="{{ route('privacy') }}">PRIVACY POLICY</a></li>
                                <li><a href="{{ route('termsConditions') }}">TERMS & CONDITIONS</a></li>
                                <li><a href="{{ route('faqss') }}">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="ftr__access col-md-5">
                    <div class="row justify-content-around">
                        <div class="col">
                            <h3>PAYMENT METHOD</h3>
                            <img src="{{ asset('assets/web/images/payment.png') }}" alt="payment">
                        </div>
                        <div class="col">
                            <h3>REACH US</h3>
                            <a href="mailto:info@chirons.ca">info@chirons.ca</a>
                        </div>
                    </div>
                </div>

                <a href="" class="scrollToTop"><i class="fas fa-arrow-up"></i></a>

            </div>
        </div>
    </div>

    <div class="ftr-btm">
        <div class="row m-0">
            <div class="col">
                <p>© Chirons Wellness Inc. 2021</p>
            </div>
            <div class="col-auto">
                <ul class="list-group list-group-horizontal">
                    <li><a target="__blank" href="https://www.instagram.com"><i class="fab fa-instagram"></i></a></li>
                    <li><a target="__blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
                    <li><a target="__blank" href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
</footer>

@push('scripts')
<script type="text/javascript">
    $('.scrollToTop').on('click', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 200);
        return false;
    });

</script>
@endpush
