<style>
    .signup__fom.steps__fom .tab {
        display: none;
    }

    .trainee-signup {
        padding: 60px 0;
    }

    .trainee-signup .fom__steps__count {
        margin-bottom: 40px;
    }

    .trainee-signup .fom__steps__count .step__box:first-child .step:after {
        width: 200px;
        margin-left: 16px;
    }

    .trainee-signup .stripe__img {
        text-align: center;
        margin-bottom: 20px;
    }

    .trainer-signup {
        padding: 60px 0;
    }

    .trainer-signup .fom__steps__count .step__box:nth-child(2) .step:after {
        content: "";
        width: 203px;
        height: 3px;
        display: block;
        background: #D4E7F1;
        position: absolute;
        top: 8px;
        margin-left: 15px;
    }

    .fom__steps__count {
        text-align: center;
        margin-bottom: 50px;
    }

    .fom__steps__count .step__box {
        display: inline-block;
        position: relative;
        text-align: center;
        width: 220px;
    }

    .fom__steps__count .step__box .heading {
        display: block;
        margin-top: 30px;
        color: #6B6B6B;
        font-weight: 500;
        font-size: 15px;
    }

    .fom__steps__count .step__box .step {
        height: 10px;
        width: 10px;
        margin: 0 2px;
        background-color: #0092D9;
        border: none;
        border-radius: 50%;
        display: inline-block;
    }

    .fom__steps__count .step__box:first-child .step:after {
        content: "";
        width: 208px;
        height: 3px;
        display: block;
        background: #D4E7F1;
        position: absolute;
        top: 8px;
        margin-left: 10px;
    }

    .fom__steps__count .step__box.active .step {
        box-shadow: 0 0 0 25px #d4e7f1;
    }

    .fom__steps__count .step__box.active .heading {
        font-weight: 600;
    }

</style>
<section class="trainee-signup">

    <div class="container">
        <div class="row justify-content-center">

            <div class="signup__fom steps__fom col-md-8">
                <!-- <div class="hed d-flex justify-content-center">
                    <h2><span class="highlight">Create</span> Account</h2>
                </div> -->
                <!-- @include('flash-message') -->
                <div class="fom__steps__count">
                    <div class="step__box">
                        <span class="step"></span>
                        <span class="heading">Appointment</span>
                    </div>
                    <div class="step__box">
                        <span class="step"></span>
                        <span class="heading">Confirm Payment</span>
                    </div>
                </div>
                <!-- One "tab" for each step in the form: -->
                <form class="form stripe_trainee_Confirm Paymentment stripe_trainee_payment" id="appointment_reg">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $trainer->id ?? '' }}" name="trainerId" id="trainerId">
                    <div class="tab">
                        <?php $date = \Carbon\Carbon::now();
                        $min_date = $date->format('Y-m-d'); ?>
                        <div class="row m-0">
                            <div class="form-group col-md-6">
                                <label for="">Select Date<span class="text-danger">*</span></label>
                                <input type="date" id="appiontment__calendar" class="form-control" name="selectedDate"
                                    placeholder="john" min="{{ $min_date ?? '' }}" max="" value="{{ $min_date ?? '' }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Time<span class="text-danger">*</span></label>
                                <select name="start_time" class="form-control" id="start"></select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Location<span class="text-danger">*</span></label>
                                <select id="preferedLocation" name="preferedLocation" class="form-control"
                                    onchange="show_rates()">
                                    <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                    <option disabled value="" selected> Select Location</option>
                                    @if ($trainer->getAddress->location == 'myLocation,clientlocation')
                                        <option value="myLocation">
                                            @if (isset($trainer->getAddress))
                                                {{-- {{ $trainer->getAddress->address ?? '' }} --}}
                                            @endif <span> Trainer Location</span>
                                        </option>
                                        <option value="clientlocation">
                                            @if (Auth::check())
                                                @if (isset(Auth::user()->getAddress))
                                                    {{-- {{ Auth::user()->getAddress->address }} --}}
                                                @endif
                                            @endif
                                            <span>My Location </span>
                                        </option>
                                    @endif

                                    @if ($trainer->getAddress->location == 'myLocation')
                                        <option value="myLocation">
                                            @if (isset($trainer->getAddress))
                                                {{-- {{ $trainer->getAddress->address ?? '' }} --}}
                                            @endif <span> Trainer Location</span>
                                        </option>
                                    @endif
                                    @if ($trainer->getAddress->location == 'clientlocation')

                                        <option value="clientlocation">
                                            @if (Auth::check())
                                                @if (isset(Auth::user()->getAddress))
                                                    {{-- {{ Auth::user()->getAddress->address }} --}}
                                                @endif
                                            @endif
                                            <span>Trainee  Location</span>
                                        </option>
                                    @endif
                                </select>
                            </div>


                            {{-- {{dump($trainer->getAddress )}} --}}
                            <div class="form-group col-md-6">
                                <label class="w-100"> &nbsp; </label>
                                <div id="radio_s"></div>
                                <div id="trainingPreference_erorr"></div>
                            </div>
                        </div>
                    </div>


                    <div class="tab">

                        <input type="hidden" value="{{ Auth::user()->last_four_card_digits ? 1 : 0 }}" name="card_data"
                            class="card_exists">
                        <div id="errors"></div>
                        <div class="form-group col-md-12 text-left" id="savedCard">
                            <div class="row show_stripe {{ Auth::user()->last_four_card_digits ? '' : 'd-none' }}">
                                <div class="col-md-9 ">
                                    <span class="text-primary">Already Saved Card</span>: Card **** ****
                                    **** {{ Auth::user()->last_four_card_digits }} Expire
                                    date {{ Auth::user()->exp_month ?? '' }}/{{ Auth::user()->exp_year ?? '' }}
                                </div>
                                <div class="col-md-3">
                                    <span class="btn btn-link " type="button" id="changeConfirm Paymentment"
                                        onclick="show_stripe_form()" style=" width: 120%">
                                        Change Method
                                    </span>
                                </div>
                            </div>
                        </div>


                        <div class="row m-0 stripe_form {{ !Auth::user()->last_four_card_digits ? '' : 'd-none' }}">
                            <button type="button"
                                class="btn btn-primary {{ Auth::user()->last_four_card_digits ? '' : 'd-none' }}"
                                onclick="old_stripe_form()" style="width: 30%">Cancel
                            </button>

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="stripe__img col-md-12">
                                        <img src="{{ asset('assets/web/images/account/stripe.png') }}" alt="Stripe">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Full Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="card_name" placeholder="John">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Card Number<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="card"
                                            placeholder="xxxx xxxx xxxx xxxx">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Expire Month<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="exp_month" placeholder="MM" maxlength="2" minlength="2">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Expire Year<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="exp_year" placeholder="YYYY" maxlength="4" minlength="4">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">CSV<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="cvv" placeholder="XXX"
                                            maxlength="3" minlength="3">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 d-none">
                                <div class="card-wrapper"></div>
                            </div>

                        </div>


                    </div>
                    <div class="actions__btn col-md-12">
                        <button class="btn btn-primary-o mr-3" type="button" id="prevBtn" onclick="nextPrev(-1)"
                            style="border: solid 2.5px;"><i class="fa fa-arrow-left"></i> Back to details
                        </button>
                        <button class="btn btn-primary" type="button" disabled id="nextBtn" onclick="nextPrev(1)"
                            style="width: 30%">Next</button>
                        <button class="btn btn-primary d-none" type="submit" id="finishForm">Book Appointment {{-- <span
                                class="amount">$10</span> --}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
</section>


<script>
    // alert('asdf');
    // document.getElementById("one_on_one").disabled = true;
    // document.getElementById("two_on_one").disabled = true;
    // console.log(document.getElementsByClassName('one_on_one_radio').disabled);

    // document.getElementsByClassName("one_on_one_radio").disabled = true ;

    jQuery("[name='trainingPreference']").attr("disabled", true)

    $(".one_on_one_price").empty();
    $(".two_on_one_price").empty();

    function show_rates() {
        preferedLocation = $("#preferedLocation").val();
        $.ajax({
            url: '{{ route("get-price-by-location") }}',
            type: 'POST',
            cache: false,
            data: {
                preferedLocation,
                trainer_id:'{{ $trainer->id }}',
                trainee_id:'{{ auth()->id() }}'
            },
            datatype: 'html',
            beforeSend: function() {
                $('#radio_s').html('Loading...');
                $('#nextBtn').attr('disabled',true);
            },
            success: function(data) {
                if (data.success == true) {
                    $('#nextBtn').attr('disabled',false);
                    $('#radio_s').html(data.html);
                }
            },
            error: function(xhr, textStatus, thrownError) {
                $('#radio_s').html(xhr.responseJSON.html);
                $('#nextBtn').attr('disabled',true);
                // alert(xhr + "\n" + textStatus + "\n" + thrownError);
            }
        });
    }

</script>


<script>
    $(document).ready(function() {
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        $("#appointment_reg").validate({
            errorClass: "error text-danger",
            validClass: "valid success-alert",
            rules: {
                selectedDate: {
                    required: true,
                    date: true
                },
                start_time: {
                    required: true
                },
                preferedLocation: {
                    required: {
                        depends: function(elem) {
                            return true;
                        }
                    },
                },
                trainingPreference: {
                    required: {
                        depends: function(elem) {
                            return true;
                        }
                    },
                },
                card_name: {
                    required: true,
                },
                card: {
                    required: true,
                },
                exp_month: {
                    required: true,
                    max: 12
                },
                exp_year: {
                    required: true,
                    min: new Date().getFullYear()
                },
                cvv: {
                    required: true,
                },
            },
            messages: {
                selectedDate: {
                    required: "This field is required66",
                    date: "The date should be in the format: 12-02-2022"
                },
                start_time: {
                    required: "This field is required"
                },
                preferedLocation: {
                    required: "This field is required"
                },
                start_time: {
                    required: "This field is required"
                },
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "trainingPreference") {
                    $('#trainingPreference_erorr').html(error)
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                $("#finishForm").html('Loading...');
                let formData = new FormData();
                // formData.append('start_time', $('#start').val());
                // formData.append('preferedLocation', $('#preferedLocation').val());

                $.each($('form').serializeArray(), function(i, field) {
                    formData.append(field.name, field.value);
                });
                $.ajax({
                    url: '{{ route('bookappointmentWithStripe') }}',
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(response) {
                        console.log("response", response)
                        $("#finishForm").html('Finish');
                        let html = ''
                        html +=
                            '<div class="alert alert-success alert-dismissable alert-sticky">'
                        html += '<div class="cont">'
                        html += '<ul>'
                        html += '<li>Appointment is booked successfully</li>'
                        html += '</ul>'
                        html += '</div>'
                        html += '</div>'
                        $('#errors').empty().html(html)
                        setTimeout(function() {
                            window.location.href = response.url
                        }, 500);
                    },
                    error: function(err) {
                        if (err.responseJSON.stripe_response) {
                            $("#finishForm").html('Finish');
                            let html = ''
                            html +=
                                '<div class="alert alert-danger alert-dismissable alert-sticky">'
                            html += '<div class="cont">'
                            html += '<ul>'
                            html += '<li>' + err.responseJSON.stripe_response.message +
                                '</li>'
                            html += '</ul>'
                            html += '</div>'
                            html += '</div>'
                            $('#errors').empty().html(html)
                        } else {
                            $('#errors').empty().html('')
                        }
                    }
                });

                // form.submit();

                return false;
            }
        });
    });

    function show_stripe_form() {
        $('.stripe_form').removeClass('d-none');
        $('.show_stripe').addClass('d-none');
        $(".card_exists").val("0");
    }

    function old_stripe_form() {
        $('.stripe_form').addClass('d-none');
        $('.show_stripe').removeClass('d-none');
        $(".card_exists").val("1");
    }

    let vv = 0;
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
            // document.getElementById("nextBtn").innerHTML = "Finish";
            $('#nextBtn').addClass('d-none');
            $('#finishForm').removeClass('d-none');
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
            $('#nextBtn').removeClass('d-none');
            $('#finishForm').addClass('d-none');
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
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
            // ... the form gets submitted:

            // document.getElementById("trainerRegFom").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        var valid = false;
        if (
            $('#appointment_reg').valid()

        ) {
            return true
        }
        return valid; // return the valid status
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

    function appointDateFunction(now, date) {
        // if (date >= now) {
        if (true) {
            var getSelectedValue = $('#appiontment__calendar').val();
            // var getSelectedValue = date;
            let d = new Date(date);

            let formData = new FormData();
            let trainer_id = $("#trainerId").val();
            formData.append('trainer_id', trainer_id);
            let day = d.getDay();
            formData.append('selectedDay', day);
            formData.append('selectedDate', getSelectedValue);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('getTrainerSessionTimings') }}',
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(response) {
                    $('#start').empty()
                    $('#start').append($('<option>', {
                        value: '',
                        text: 'Select Time Slot'
                    }));
                    if (response.length > 0) {
                        for (i = 0; i < response.length; i++) {
                            $('#start').append($('<option>', {
                                value: response[i],
                                text: response[i]
                            }));
                        }
                    } else {
                        $('#start').empty()
                        $('#start').append($('<option>', {
                            value: '',
                            text: 'No Slots Available'
                        }));
                    }
                }
            })
        } else {
            return false;
        }
    }

    let now = new Date();
    let date = new Date();
    now.toISOString()
    date.toISOString()
    appointDateFunction(now, date);

    jQuery("#appiontment__calendar").on("change", function($event) {
        // $('#appiontment__calendar').change(function ($event) {

        now = new Date();
        date = new Date($event.target.value);

        console.log(now, date)

        now.toISOString()
        date.toISOString()
        appointDateFunction(now, date);

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
