@extends('web.layouts.app')
@section('content')

<section class="trainee-signup">
<div class="loaderSignUp" id="loaderShow">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgba(241, 242, 243, 0); display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
            <g transform="rotate(0 50 50)">
              <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite"></animate>
              </rect>
            </g><g transform="rotate(30 50 50)">
              <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite"></animate>
              </rect>
            </g><g transform="rotate(60 50 50)">
              <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite"></animate>
              </rect>
            </g><g transform="rotate(90 50 50)">
              <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite"></animate>
              </rect>
            </g><g transform="rotate(120 50 50)">
              <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite"></animate>
              </rect>
            </g><g transform="rotate(150 50 50)">
              <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite"></animate>
              </rect>
            </g><g transform="rotate(180 50 50)">
              <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite"></animate>
              </rect>
            </g><g transform="rotate(210 50 50)">
              <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite"></animate>
              </rect>
            </g><g transform="rotate(240 50 50)">
              <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite"></animate>
              </rect>
            </g><g transform="rotate(270 50 50)">
              <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite"></animate>
              </rect>
            </g><g transform="rotate(300 50 50)">
              <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite"></animate>
              </rect>
            </g><g transform="rotate(330 50 50)">
              <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animate>
              </rect>
            </g>
        </svg>
    </div>


    <div class="container">
        <div class="row justify-content-center">

            <div class="signup__fom steps__fom col-md-8">
                <div class="hed d-flex justify-content-center">
                    <h2><span class="highlight">Create</span> Account</h2>
                </div>
                @include('flash-message')
                <div id="errors"></div>
                <form class="form stripe_trainee_payment" id="trainerRegFom">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                    <div class="fom__steps__count">
                        <div class="step__box">
                            <span class="step"></span>
                            <span class="heading">Personal Information</span>
                        </div>
                        <div class="step__box">
                            <span class="step"></span>
                            <span class="heading">Add Payment Method</span>
                        </div>
                    </div>
                    <!-- One "tab" for each step in the form: -->
                    <div class="tab">
                        <div class="row m-0">
                            <div class="form-group col-md-6">
                                <label for="">Full Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" oninput="this.className = 'form-control'"
                                    name="fullname" placeholder="john">
                            </div>
                            <div class="form-group col-md-6">
                                <div id="result" class="error-email"></div>
                                <label for="">Email</label>
                                <input type="text" class="form-control" oninput="this.className = 'form-control'" name="email" id="email" placeholder="john@email.com">
                            </div>
                            <!-- <div class="form-group col-md-6">
                                <label for="">Municipality</label>
                                <input type="text" class="form-control" oninput="this.className = 'form-control'"
                                    name="state" placeholder="State">
                            </div> -->
                            <div class="form-group col-md-6 ">
                                <label for="">Location</label>
                                <select class="form-select form-control" name="country" id="country" oninput="this.className = 'form-select form-control'" aria-label="example">
                                    <option value="">Select</option>
                                    @foreach($countries as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Address</label>
                                <input type="text" class="form-control" oninput="this.className = 'form-control'"
                                    name="address" placeholder="Address">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Postal Code</label>
                                <input type="text" class="form-control" oninput="this.className = 'form-control'"
                                    name="postalCode" placeholder="75100">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">D.O.B</label>
                                <input placeholder="mm/dd/yyyy" class="form-control" name="Dob"  type="text"
                                oninput="this.className = 'form-control'" onfocus="(this.type='date')" onblur="(this.type='text')"
                                id="date" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Password</label>
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                <input type="password" id="password" class="form-control" oninput="this.className = 'form-control'"
                                    name="password" placeholder="atleast 8 characters">
                            </div>
                            <div class="form-group col-md-6">
                                    <label for="">Confirm Password<span class="text-danger">*</span></label>
                                    <span toggle="#password2" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                                    <input type="password" class="form-control" id="password2"
                                           oninput="this.className = 'form-control'"
                                           name="password_confirmation" placeholder="xxxxxxx" required>
                                </div>


                        </div>
                    </div>
                    <div class="tab">
                        <div class="row m-0">
                            <div class="stripe__img col-md-12">
                                <img src="{{asset('assets/web/images/account/stripe.png')}}" alt="">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Full Name</label>
                                <input type="text" class="form-control" name="card_name" oninput="this.className = 'form-control'"
                                     placeholder="John">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Card Number</label>
                                <input type="text" class="form-control" name="card" oninput="this.className = 'form-control'"
                                     placeholder="xxxx xxxx xxxx xxxx">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Expire Month</label>
                                <input type="text" class="form-control" name="exp_month" oninput="this.className = 'form-control'"
                                     placeholder="MM">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Expire Year</label>
                                <input type="text" class="form-control" oninput="this.className = 'form-control'"
                                name="exp_year" placeholder="YY">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">CSV</label>
                                <input type="text" class="form-control" oninput="this.className = 'form-control'"
                                name="cvv" placeholder="XXX">
                            </div>
                            <div class="form-group col-md-6">
                            <div class="card-wrapper"></div>
                            </div>

                            <div class="form-group form-checkboxes form-privacy col-md-12" id="traine_signupp">
                                <input class="form-check-input-1 form-control0 mt-1 me-1" required type="checkbox" name="privacy" id="privacy">
                                <label class="form-check-label d-inline" for="privacy">By clicking <strong>Finish</strong> you
                                    agree to the Terms of Use Agreement and the Privacy Policy which are available at
                                    the bottom of the website.
                                    This will be considered to be an electronic form of signature on your behalf.
                                </label>
                                <span id="privacy_error"></span>
                            </div>
                        </div>

                    </div>



                    <div class="actions__btn">
                        <button class="btn btn-primary-o mr-3" type="button" id="prevBtn"
                            onclick="nextPrev(-1)">Back</button>
                        <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        <button class="btn btn-primary d-none" type="submit" id="finishForm">Finish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script type="text/javascript">
     $(document).ready(function() {
        $("#trainerRegFom").validate({
            errorClass: "error text-danger" ,
            validClass: "valid success-alert",
            rules:{
                fullname:{
                    required:true,
                },
                email:{
                    required:true,
                    email:true,
                    remote: {
                        url: "{{ route('checkEmailForReg') }}",
                        type: "post",
                        data:{
                            _token: $('#_token').val()
                        }
                    }
                },
                password:{
                    required:true,
                    strong_password: true,
                    minlength: 8
                },
                password_confirmation:{
                    required:true,
                    equalTo: "#password"
                },
                country:{
                    required:true,
                },
                address:{
                    required:true,
                },
                postalCode:{
                    required:true,
                },
                Dob:{
                    required:true,
                    validDOB:true
                },
                card_name:{
                    required:true,
                },
                card:{
                    required:true,
                },
                exp_month:{
                    required:true,
                },
                exp_year:{
                    required:true,
                    min: new Date().getFullYear()
                },cvv:{
                    required:true,
                },
                privacy:{
                    required:true,
                },
            },
            messages:{
                email: {
                    email: "Please enter a valid email address.",
                    remote: "The email has already been taken."
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "location" || element.attr("name") == "location1" ) {
                    $('#location_erorr').html(error)
                }
                else if (element.attr("name") == "training_session" || element.attr("name") == "training_session1" ) {
                    $('#training_session_erorr').html(error)
                }
                else if (element.attr("name") == "privacy") {
                    $('#privacy_error').html(error)
                }
                else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                let formData = new FormData();
            $("form input").each(function(i) {
                formData.append($(this).attr("name"), $(this).val());
            });
            var country = document.getElementById("country").value;
            formData.append('country', country);
            $.ajax({
                url: '{{ route('traineeSignup') }}',
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (response) {
                    if(response.code == 200){
                        window.location.href = response.url
                    }
                },error:function(err) {

                    window.location.reload();
                    let html = ''
                        html += '<div class="alert alert-danger alert-dismissable alert-sticky">'
                        html += '<div class="cont">'
                        html += '<ul>'
                        html += '<li> '+err.responseJSON.message+' sdfsdf</li>'
                        html += '</ul>'
                        html += '</div>'
                        html += '</div>'
                        $('#errors').html(html)
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                }
            });
            }
        });
        $("#country").change(function () {
            let id = $(this).val()
        });
    })
    var currentTab = 0;
    showTab(currentTab);

    function showTab(n) {
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            $('#nextBtn').addClass('d-none');
            $('#finishForm').removeClass('d-none');
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
            $('#nextBtn').removeClass('d-none');
            $('#finishForm').addClass('d-none');
        }
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        var x = document.getElementsByClassName("tab");
        if (n == 1 && !validateForm()) return false;
        x[currentTab].style.display = "none";
        currentTab = currentTab + n;
        if (currentTab >= x.length) {
            return false;
        }
        showTab(currentTab);
    }

    function validateForm() {

        if ($('#trainerRegFom').valid()) {
            return true
        }
        return false;
    }

    function fixStepIndicator(n) {
        var i, x = document.getElementsByClassName("step__box");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        x[n].className += " active";
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
    $(".toggle-password2").click(function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });


</script>

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
    top: 20%;
}
</style>
@endpush
