@extends('web.layouts.app')
@section('content')

    <section class="trainer-signup">
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
                <div class="signup__fom steps__fom col-md-8">
                    <div class="hed d-flex justify-content-center">
                        <h2><span class="highlight">Submit</span> Personal Details</h2>
                    </div>
                    @include('flash-message')
                    <div id="errors"></div>
                    <form class="form" id="trainerRegFom" method="POST">
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                        <div class="fom__steps__count">
                            <div class="step__box">
                                <span class="step"></span>
                                <span class="heading">Personal Information</span>
                            </div>
                            <div class="step__box">
                                <span class="step"></span>
                                <span class="heading">Documents</span>
                            </div>
                            <div class="step__box">
                                <span class="step"></span>
                                <span class="heading">Add Services</span>
                            </div>
                        </div>
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">
                            <div class="row m-0">
                                <div class="form-group col-md-6">
                                    <label for="">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" required class="form-control" oninput="this.className = 'form-control'"
                                           name="fullname" maxlength="15" placeholder="john">
                                </div>
                                <div class="form-group col-md-6">
                                    <div id="result" class="error-email"></div>
                                    <label for="">Email<span class="text-danger">*</span></label>
                                    <input type="email" id="email" class="form-control" autocomplete="off"
                                           oninput="this.className = 'form-control'" name="email"
                                           placeholder="john@email.com">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Password<span class="text-danger">*</span></label>
                                    <span toggle="#password" class="fa fa-fw field-icon toggle-password fa-eye"></span>
                                    <input type="password" id="password" class="form-control"
                                           oninput="this.className = 'form-control'"
                                           name="password" placeholder="xxxxxxx" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Confirm Password<span class="text-danger">*</span></label>
                                    <span toggle="#password2" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
                                    <input type="password" id="password2" class="form-control"
                                           oninput="this.className = 'form-control'"
                                           name="confirm_password" placeholder="xxxxxxx" required>
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label for="">Location<span class="text-danger">*</span></label>
                                    <select class="form-select form-control" name="country" id="country"
                                            oninput="this.className = 'form-select form-control'" aria-label="example">
                                        <option value="">Select</option>
                                        @foreach($countries as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Address<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" oninput="this.className = 'form-control'"
                                           name="Address" placeholder="Address">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Postal Code<span class="text-danger">*</span></label>
                                    {{-- <input type="number" class="form-control" oninput="this.className = 'form-control'"
                                           name="PostalCode" maxlength="7" onkeypress="return /[0-9a-zA-Z]/i.test(event.key)" placeholder="12346"> --}}
                                           <input type="text" class="form-control" oninput="this.className = 'form-control'"
                                           name="PostalCode"   placeholder="7015">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">D.O.B<span class="text-danger">*</span></label>
                                    <input placeholder="mm/dd/yyyy" class="form-control" name="Dob" type="text"
                                           oninput="this.className = 'form-control'" onfocus="(this.type='date')"
                                           onblur="(this.type='text')"
                                           id="date"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Years of Experience<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" oninput="this.className = 'form-control'"
                                           onkeyup="years_validate(this)"  id="year_exp"
                                           name="exp" placeholder="10" min="0">
                                </div>
                            </div>


                        </div>
                        <div class="tab">
                            <div class="row m-0">
                                <div class="form-group form-file col-md-12">
                                    <label for="formFileLg" class="form-label">Personal Training Certificate<span class="text-danger">*</span></label>
                                    <input class="form-control" accept="image/png,image/jpg,image/jpeg,.pdf" name="personal_training_certificate"
                                           oninput="this.className = 'form-control'" id="personal_training_certificate"
                                           type="file">
                                </div>
                                <div class="form-group form-file col-md-12">
                                    <label for="formFileLg" class="form-label">CPR Training Certificate<span class="text-danger">*</span></label>
                                    <input class="form-control" accept="image/png,image/jpg,image/jpeg,.pdf" name="cpr_training_certificate"
                                           oninput="this.className = 'form-control'" id="cpr_training_certificate"
                                           type="file">
                                </div>
                                <div class="form-group form-file col-md-12">
                                    <label for="formFileLg" class="form-label">Government Identification<span class="text-danger">*</span></label>
                                    <input class="form-control" accept="image/png,image/jpg,image/jpeg,.pdf" name="govt_identification"
                                           oninput="this.className = 'form-control'" id="govt_identification"
                                           type="file">
                                </div>
                                <div class="form-group form-file col-md-12">
                                    <label for="formFileLg" class="form-label">Utility Bill<span class="text-danger">*</span></label>
                                    <input class="form-control" accept="image/png,image/jpg,image/jpeg,.pdf" name="utility_bill"
                                           oninput="this.className = 'form-control'" id="utility_bill" type="file">
                                </div>
                            </div>

                        </div>
                        <div class="tab">
                            <div class="form-group form-checkboxes col-md-12">
                                <h5>Select Location</h5>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="location" id="location"
                                           onchange="validate()"
                                        {{--                                       value="myLocation"--}}
                                    >
                                    <label class="form-check-label" for="location">My Location</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="location1" id="location1"
                                        {{--                                       value="clientlocation"--}}
                                        onchange="validate()"                                    >
                                    <label class="form-check-label" for="location1">Travel to Client</label>
                                </div>

                            </div>
                            <div id="location_erorr"></div>
                            <div class="form-group form-checkboxes col-md-12">
                                <h5>Training Session</h5>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="training_session" type="checkbox" id="Session"
                                    {{--                                       value="1 on 1"--}}
                                        onchange="validate()"  >
                                        <label class="form-check-label" for="Session">1 on 1</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="training_session1" type="checkbox"
                                    id="Session1"
                                        {{--                                       value="2 on 1"--}}
                                        onchange="validate()"  >
                                        <label class="form-check-label" for="Session1">2 on 1</label>
                                    </div>

                                </div>
                                <div id="training_session_erorr"></div>

                            <div class="form-group form-privacy col-md-12 pt-2" id="signupp_tranie">
                                <input class="form-check-input-1 form-control0 mt-1 me-1" required type="checkbox" name="privacy" id="privacy">
                                    <label class="form-check-label d-inline" for="privacy">By clicking <strong>Finish</strong> you
                                        agree to the Terms of Use Agreement and the Privacy Policy which are available at
                                        the bottom of the website.
                                        This will be considered to be an electronic form of signature on your behalf.
                                    </label>
                                    <span id="privacy_error"></span>
                            </div>
                        </div>
                        <div class="actions__btn">
                            <button class="btn btn-primary-o mr-3" type="button" id="prevBtn"
                                    onclick="nextPrev(-1)">Back
                            </button>
                            <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next

                            </button>
                            <button class="btn btn-primary d-none" type="type" id="submitForm">Submit</button>
                        </div>
                        <!-- Circles which indicates the steps of the form: -->
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')


<script>

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
                confirm_password:{
                    required:true,
                    equalTo: "#password"
                },
                country:{
                    required:true,
                },
                Address:{
                    required:true,
                },
                PostalCode:{
                    required:true,
                },
                Dob:{
                    required:true,
                    validDOB:true
                },
                exp:{
                    required:true,
                },
                personal_training_certificate:{
                    required:true,
                },
                cpr_training_certificate:{
                    required:true,
                },
                govt_identification:{
                    required:true,
                },
                utility_bill:{
                    required:true,
                },
                privacy:{
                    required:true,
                },
                location:{
                    required: function (element) {
                        if(!$("#location1").is(':checked')){
                            return true;
                        }
                        else
                        {
                            return false;
                        }
                    }
                },
                location1:{
                    required: function (element) {
                        if(!$("#location").is(':checked')){
                            return true;
                        }
                        else
                        {
                            return false;
                        }
                    }
                },
                training_session:{
                    required: function (element) {
                        if(!$("#Session1").is(':checked')){
                            return true;
                        }
                        else
                        {
                            return false;
                        }
                    }
                },
                training_session1:{
                    required: function (element) {
                        if(!$("#Session").is(':checked')){
                            return true;
                        }
                        else
                        {
                            return false;
                        }
                    }
                },
            },
            messages:{
                email: {
                    required: "  your email address.",
                    email: "Please enter a valid email address.",
                    remote: "The email has already been taken."
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "location" || element.attr("name") == "location1" ) {
                    $('#location_erorr').html(error)
                }else if (element.attr("name") == "training_session" || element.attr("name") == "training_session1" ) {
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
                
                let formObj = $("#trainerRegFom").serializeArray()

                let formData = new FormData();
                $.each(formObj, (index, item) => {
                    formData.append(item.name, item.value);
                })

                var country = document.getElementById("country").value;
                formData.append('country', country);
                
                // var state = document.getElementById("state").value;
                // formData.append('state', state);

                formData.append('personal_training_certificate', $('#personal_training_certificate')[0].files[0]);
                formData.append('cpr_training_certificate', $('#cpr_training_certificate')[0].files[0]);
                formData.append('govt_identification', $('#govt_identification')[0].files[0]);
                formData.append('utility_bill', $('#utility_bill')[0].files[0]);
                $("#loaderShow").css({'display': 'block'});

                $.ajax({
                    url: '{{ route('trainerSignup') }}',
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (response) {
                        console.log(response)
                        if (response.code == 200) {
                            $("#loaderShow").css({'display': 'none'});
                            window.location.href = response.url
                        } else if (response.code == 404) {
                            $("#loaderShow").css({'display': 'none'});
                            let html = ''
                            html += '<div class="alert alert-danger alert-dismissable alert-sticky">'
                            html += '<div class="cont">'
                            html += '<ul>'
                            html += '<li> ' + response.message + ' </li>'
                            html += '</ul>'
                            html += '</div>'
                            html += '</div>'
                            $('#errors').html(html)
                            $('html, body').animate({scrollTop: 0}, 'slow');
                        }
                    }
                    ,error:function(err){
                        
                        console.log(err.responseJSON)

                        let html = '<div class="alert alert-danger" role="alert">'
                        html += '<h5 class="alert-heading">'+err.responseJSON.message+'</h5>'
                        html += '<ul>'
                        $.each(err.responseJSON.errors, function (item, values) {
                            html += '<li>'+values[0]+'</li>'
                        })
                        html += '</ul>'
                        html += '</div>'

                        $("#loaderShow").css({'display': 'none'});
                        // let html = ''
                        // html += '<div class="alert alert-danger alert-dismissable alert-sticky">'
                        // html += '<div class="cont">'
                        // html += '<ul>'
                        // html += '<li> '+err.responseJSON.message+' </li>'
                        // html += '</ul>'
                        // html += '</div>'
                        // html += '</div>'

                        nextPrev(-1)
                        $('#errors').empty().html(html)
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                    }
                });

                // return false;
            }
        });
    });
        $(document).ready(function () {
            $("#country").change(function () {
                let id = $(this).val()
            });
        })
        let vv = 0;

        function validate() {
            $("#trainerRegFom").valid();
        }

        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                // document.getElementById("nextBtn").innerHTML = "Submit";
                $('#nextBtn').addClass('d-none');
                $('#submitForm').removeClass('d-none');
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
                $('#nextBtn').removeClass('d-none');
                $('#submitForm').addClass('d-none');
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {


            console.log('currentTab---' + currentTab);
            $('#errors').html('')
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...

            if (currentTab >= x.length) {
                return false;
            } else {
                showTab(currentTab);
            }

        }

        function validateForm() {

            if ($("#trainerRegFom").valid()) {
                return true
                //document.getElementsByClassName("step__box")[currentTab].className += " finish";
            }
            return false; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step__box");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }

        function years_validate(element) {
            var max_chars = 2;
            if (element.value.length > max_chars) {
                element.value = element.value.substr(0, max_chars);
            }
            // var x = document.getElementById("year_exp");
            // x.value = x.value.toUpperCase();
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


