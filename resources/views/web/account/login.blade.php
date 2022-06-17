@extends('web.layouts.app')
@section('content')

    <section class="acc-login">
        <div class="loaderSignUp" id="loaderShow">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                 style="margin: auto; background: rgba(241, 242, 243, 0); display: block; shape-rendering: auto;"
                 width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                <g transform="rotate(0 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.9166666666666666s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(30 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.8333333333333334s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(60 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s"
                                 repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(90 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.6666666666666666s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(120 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.5833333333333334s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(150 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s"
                                 repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(180 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.4166666666666667s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(210 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.3333333333333333s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(240 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s"
                                 repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(270 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.16666666666666666s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(300 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.08333333333333333s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(330 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s"
                                 repeatCount="indefinite"></animate>
                    </rect>
                </g>
            </svg>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="login__box col-md-5">
                    <h2>Welcome To <br/> <span>Chirons</span></h2>
                    @include('flash-message')
                    <div id="errors"></div>
                    <form id="login-form-s" name="login-form-s" method="post" class="form">
                        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"/> --}}
                        <div class="form-group">
                            <label for="">Email<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="email"
                                   placeholder="name@domain.com" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password<span class="text-danger">*</span></label>
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            <input type="password" class="form-control" name="password" id="password"
                                   required="required" placeholder="atleast 8 characters">

                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="remember_me" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Remember Me
                                </label>
                            </div>
                            <a class="float-end" href="{{ route('forgot') }}">Forgot Password?</a>
                        </div>
                        <div class="form-group">
                            <button id="submit" type="submit" class="btn btn-primary w-100">Login <i
                                    class="fas fa-long-arrow-alt-right"></i></button>
                        </div>

                    </form>
                    <div class="form-group">
                        <h5>Don't have an account? <a href="{{ route('accountType') }}">Signup</a></h5>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <style>
        .loaderSignUp {
            background: #00000070;
            height: 344%;
            width: 100%;
            position: absolute;
            z-index: 10;
            top: 0;
            vertical-align: middle;
            display: none;
        }

        .loaderSignUp svg {
            position: relative;
            top: 10%;
        }
    </style>



<script type="text/javascript">

$(document).ready(function() {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#login-form-s").validate({
        errorClass: "error text-danger" ,
        validClass: "valid success-alert",
        rules: {
            email: {
                required: true,
                email: true
            },
            password:{
                required:true,
                // strong_password: true,
                // minlength: 8
            },
        },
        messages : {
            email: {
                email: "The email should be in the format: abc@domain.tld"
            },
            password: {
                required: "The password field is required"
            }
        },
        submitHandler: function(form) {

            $("#submit").html('Loading...');
            let formData = new FormData();
            
            $("form input").each(function (i) {
                formData.append($(this).attr("name"), $(this).val());
            });

            $.ajax({
                url: '{{ route('loginAttempt') }}',
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (response) {
                    $("#submit").html('Login <i class="fas fa-long-arrow-alt-right"></i>');
                    let html = ''
                    html += '<div class="alert alert-success alert-dismissable alert-sticky">'
                    html += '<div class="cont">'
                    html += '<ul>'
                    html += '<li>' + response.message + '</li>'
                    html += '</ul>'
                    html += '</div>'
                    html += '</div>'
                    $('#errors').empty().html(html)
                    setTimeout(function () {
                        window.location.href = response.url
                    }, 100);
                },
                error:function (err){
                    $("#submit").html('Login <i class="fas fa-long-arrow-alt-right"></i>');
                    let html = ''
                    html += '<div class="alert alert-danger alert-dismissable alert-sticky">'
                    html += '<div class="cont">'
                    html += '<ul>'
                    html += '<li>' + err.responseJSON.message + '</li>'
                    html += '</ul>'
                    html += '</div>'
                    html += '</div>'
                    $('#errors').empty().html(html)
                }
            });
            return false;
            // form.submit();
        }
    });
});
</script>




    <script type="text/javascript">

        function countdownTimeStart(){

            var countDownDate = new Date("Sep 25, 2025 15:00:00").getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get todays date and time
                var now = new Date().getTime();

                // Find the distance between now an the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Output the result in an element with id="demo"
                document.getElementById("demo").innerHTML = hours + "h "
                    + minutes + "m " + seconds + "s ";

                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                }
            }, 1000);
        }
        $(".toggle-password").click(function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>

@endsection
