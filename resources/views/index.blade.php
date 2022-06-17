@extends('web.layouts.app')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <section class="home-banner">
        <div class="container">

            <div class="row align-items-center">
                <div class="caro">
                    <h1 class="w-100">Find A Personal Trainer <br/>
                        <span>In Your Area Today!</span></h1>
                    <div class="caro__search dropdown col-md-5">
                        <form class="personal__form w-100" action="{{ route('search_trainers') }}" method="get">
                            <input type="text" name="keyword" placeholder="Search trainer in your area" id="myInput">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="about-us" id="aboutUs">
        <div class="container">
            <div class="row">
                <div class="hed top__bdr col-md-12">
                    <h2>About<span class="highlight"> Us</span></h2>
                </div>
            </div>

            @if ($message = Session::get('error'))
                <div class="alert alert-success alert-block" id="mydiv">
{{--                    <button type="button" class="close" data-dismiss="alert">×</button>--}}
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="row">
                <div class="about__cont col-md-8">
                    @if(isset($cms_about))
                        {!! $cms_about->page_body ?? '' !!}
                    @else
                        Content Is Comming Soon
                    @endif

                </div>
                <div class="about__img col-md-4">
                    <img src="{{ asset('assets/web/images/home/about.png') }}" alt="about-us">
                </div>
            </div>

        </div>
    </section>


    <section class="our-mission">
        <div class="container">
            <div class="row">
                <div class="mission__cont col-md-8 order-md-2">
                    <div class="hed top__bdr">
                        <h2>Our<span class="highlight"> Mission</span></h2>
                    </div>
                    @if(isset($cms_mission))
                        {!! $cms_mission->page_body ?? '' !!}
                    @else
                        Content Is Comming Soon
                    @endif

                </div>
                <div class="mission__img col-md-4">
                    <img src="{{ asset('assets/web/images/home/mission.png') }}" alt="our-mission">
                </div>

            </div>

        </div>
    </section>

    <section class="how-it-works" id="howItWork">
        <div class="container">
            <div class="row">
                <div class="hed top__bdr">
                    <h2>How It<span class="highlight"> Works</span></h2>
                </div>
            </div>
            <div class="row">

                <div class="trainer__points col-md-5 col-sm-6">
                    <h3>TRAINER</h3>


                    {{--                    howitworks_trainer', 'howitworks_user'--}}

                    @if(isset($howitworks_trainers))
                        @foreach($howitworks_trainers as $howitworks_trainer)
                            <div class="child__box child__box1">

                                {{--                                {{dd($howitworks_trainer->file ?? '')}}--}}
                                <h4>
                                    <div class="__img">
                                        @if( !empty($howitworks_trainer->file)  )
                                            @if( file_exists('uploads/web/howitworks/' . $howitworks_trainer->file ))
                                                <img
                                                    src="{{ asset('uploads/web/howitworks/'.$howitworks_trainer->file) }}"
                                                    alt="icon" height="18px">
                                            @endif
                                        @else
                                            <img src="{{ asset('assets/web/images/home/icons/add.png') }}"
                                                 alt="icon">
                                        @endif
                                    </div>
                                    {{$howitworks_trainer->title ?? ''}}
                                </h4>
                                <p>
                                    {{$howitworks_trainer->description ?? ''}}
                                </p>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="trainer__count col-md-2 d-md-block d-sm-none">
                    <div class="count count__1"><span class="pulse">1</span></div>
                    <div class="count count__2"><span class="pulse">2</span></div>
                    <div class="count count__3"><span class="pulse">3</span></div>
                </div>

                <div class="user__points col-md-5 col-sm-6">
                    <h3>USER</h3>

                    @if(isset($howitworks_users))
                        @foreach($howitworks_users as $howitworks_user)
                            <div class="child__box child__box1">
                                <h4>
                                    <div class="__img"><img src="{{ asset('assets/web/images/home/icons/add.png') }}"
                                                            alt="icon">
                                    </div> {{$howitworks_user->title ?? ''}} </h4>

                                <p>{{$howitworks_user->description ?? ''}}</p>
                            </div>
                        @endforeach
                    @endif


                </div>
            </div>
        </div>
    </section>

    <section class="contact-us" id="contactUs">
        <div class="container">
            <div class="row">
                <div class="hed top__bdr">
                    <h2>Contact<span class="highlight"> Us</span></h2>
                </div>
            </div>
            <div class="row">
                <div class="contact__cont col-md-6">

                    {{--       cms_contact'   --}}

                    @if(isset($cms_contact))

                        {!! $cms_contact->page_body ?? '' !!}
                    @else
                        Content Is Comming Soon

                    @endif

                    <ul class="list-group list-group-horizontal">
                        <li><a target="__blank" href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li><a target="__blank" href="https://www.linkedin.com"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li><a target="__blank" href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-6 contact__fom">
                    <form id="contact_form_validation">
                        <div id="errors"></div>
                        <div id="success"></div>
                        <meta name="csrf-token" content="{{ csrf_token() }}"/>
                        <div class="form mb-3">
                            <input type="email" id="email" name="email" class="form-control" id="floatingInput" placeholder="Email">
                        </div>
                        <div class="form mb-3">
                            <input type="text" name="subject" id="subject" class="form-control amoos" placeholder="Subject">
                        </div>
                        <div class="form form__textarea mb-3">
                        <textarea class="form-control" name="message" id="message" placeholder="Write Your Message Here..."></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary xl w-100" id="submitContactForm">
                                <div class="spinner-grow spinner-grow-sm send-email" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                SEND
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <section class="get-started">
        <div class="container">
            <div class="row align-items-center">
                <div class="caro caro__btn">
                    <h2>FIND YOUR CHIRON TODAY</h2> <br/>
                    <a href="{{ route('accountType') }}" class="btn btn-primary xl">GET STARTED</a>
                </div>
            </div>
        </div>
    </section>

    <script>setTimeout(function () {
            $('#mydiv').fadeOut('fast');
        }, 5000);</script>
    <script>
        $(document).ready(function () {  // <-- ensure form's HTML is ready

            $(".send-email").hide()

            var contactForm = $("#contact_form_validation").validate({
                errorClass: "error text-danger",
                validClass: "valid success-alert",
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    subject: {
                        required: true,
                        maxlength: 30,
                    },
                    message: {
                        required: true,
                        maxlength: 150,
                    }
                },
                messages: {
                    // email: "invalid pattern ",
                    // subject: "Subject Is Required",
                    // message: "Message Is Required",
                },
                submitHandler: function (form) {
                    let email = $('#email').val()
                    let subject = $('#subject').val()
                    let message = $('#message').val()
                    let formData = new FormData();

                    formData.append('email', email);
                    formData.append('subject', subject);
                    formData.append('message', message)
                    console.log(formData);

                    // $.ajaxSetup({
                    //     headers: {
                    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //     }
                    // });
                    $.ajax({
                        url: '{{ route('contactusmail') }}',
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        beforeSend: function () {
                            $("#submitContactForm").attr("disabled", true)
                            $(".send-email").show()
                        },
                        success: function (response) {
                            
                            $(".send-email").hide()
                            $("#submitContactForm").attr("disabled", false)
                            let html = ''
                            html += '<div class="alert alert-success alert-dismissable alert-sticky">'
                            html += '<div class="cont">'
                            html += '<ul>'
                            html += '<li>' + response.message + '</li>'
                            html += '</ul>'
                            html += '<div class="alert__icon"><span></span></div>'
                            html += '</div>'
                            html += '</div>'
                            $('#success').html(html).fadeOut(3000)
                            
                            // setTimeout(() => {
                                // contactForm[0].resetForm()
                                $("#contact_form_validation")[0].reset();
                                // $('#success').empty()
                            // }, 2000);
                        },
                        error: function (response) {
                            console.log(respose);
                            let html = ''
                            html += '<div class="alert danger alert-dismissable alert-sticky">'
                            html += '<div class="cont">'
                            html += '<ul>'
                            html += '<li>' + response + '</li>'
                            html += '</ul>'
                            html += '<div class="alert__icon"><span></span></div>'
                            html += '</div>'
                            html += '</div>'
                            $('#errors').html(html)

                        }
                    })
                }
            });

        });
    </script>

@endsection

@push('scripts')
    <script type="text/javascript">
        function clickSearchResult() {
            document.getElementById("searchResult").classList.toggle("show");
            document.getElementById("myInput").value = "";
        }

        function filterSearchResult() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("searchResult");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
    </script>
    <script>
        {{--$("#submitContactForm").on('click', function (e) {--}}
        {{--    let email = $('#email').val()--}}
        {{--    let subject = $('#subject').val()--}}
        {{--    let message = $('#message').val()--}}
        {{--  --}}
        {{--    let formData = new FormData();--}}
        {{--    formData.append('email', email);--}}
        {{--    formData.append('subject', subject);--}}
        {{--    formData.append('message', message);--}}
        {{--    $.ajaxSetup({--}}
        {{--        headers: {--}}
        {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
        {{--        }--}}
        {{--    });--}}
        {{--    $.ajax({--}}
        {{--        url: '{{ route('contactusmail') }}',--}}
        {{--        data: formData,--}}
        {{--        processData: false,--}}
        {{--        contentType: false,--}}
        {{--        type: 'POST',--}}
        {{--        success: function (response) {--}}
        {{--            let html = ''--}}
        {{--            html += '<div class="alert alert-success alert-dismissable alert-sticky">'--}}
        {{--            html += '<div class="cont">'--}}
        {{--            html += '<ul>'--}}
        {{--            html += '<li>' + response + '</li>'--}}
        {{--            html += '</ul>'--}}
        {{--            html += '<div class="alert__icon"><span></span></div>'--}}
        {{--            html += '</div>'--}}
        {{--            html += '</div>'--}}
        {{--            $('#success').html(html)--}}
        {{--        }--}}
        {{--    })--}}
        {{--})--}}
    </script>
@endpush
