<style>
    .modal_popup {
    background: #fff;
    width: 70%;
    margin: auto;
    top: 50px;
    position: relative;
    border: 1px solid #dddddd;
    box-shadow: 0px 0px 19px #00000017;
    height: 500px;
    overflow-y: scroll;
    padding: 25px;
}
.checkboxes {
    margin-top: 12px;
    margin-left: 5px;
}

.checkboxes input {
    position: relative;
    top: 18px;
}
.fixedHeight{
    height: 700px;
}
.modal_popup input, .modal_popup select {
    height: 45px;
    border-radius: 0;
    margin-bottom: 18px;
}
.hide_stripe {
    background: #3a3a3a !important;
    border: none !important;
}

.show_stripe {
    padding: 17px 15px !important;
    font-size: 15px;
    margin-left: 10px;
    background: white !important;
    border: 1px solid #0092d9 !important;
    color: #0092d9 !important;
    font-weight: 600;
}

.show_stripe:hover {
    background: #0092d9 !important;
    border: 1px solid #0092d9 !important;
    color: white !important;
}
</style>

@extends('trainee.layouts.app')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('assets/trainee/emoji/jquery.emojiarea.css') }}">

    <div class="appointment__panel panel__style fixedHeight">

        <ul class="nav nav-tabs" id="appointment-tab-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="appointmentTab1-tab" data-toggle="pill" href="#appointmentTab1"
                   role="tab"
                   aria-controls="appointmentTab1" aria-selected="true">Booking Appointment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="appointmentTab2-tab" data-toggle="pill" href="#appointmentTab2" role="tab"
                   aria-controls="appointmentTab2" aria-selected="false">Message</a>
            </li>
        </ul>









        <div class="modal_popup">






            <form action="{{route('bookappointmentWithStripe')}}" method="POST">
                <div class="card-body">
                    <div class="tab-content" id="appointment-tab-tabs-content">
                        <div class="tab-pane fade show active" id="appointmentTab1" role="tabpanel"
                             aria-labelledby="appointmentTab1-tab">
                            <input type="hidden" value="{{$trainer->id ?? ''}}" id="getTrainerId">

                            {{-- <p>{{$trainer->name}}  </p> --}}

                            <div>
                                @include('trainee.common.appointment')


                                <button type="button" class="btn btn-primary hide_stripe" onclick="old_stripe_form()">
                                    <img src="{{ asset('assets/trainee/images/stripe.png') }}" alt="">
                                    ***{{Auth::user()->last_four_card_digits ?? ''}}
                                    Exp:{{Auth::user()->exp_month ?? ''}}/{{Auth::user()->exp_year ?? ''}}
                                </button>
                                <button type="button" class="btn btn-info show_stripe" onclick="show_stripe_form()">
                                    Change Method
                                </button>
                            </div>
                            {{-- check card exists 1   if not exists 0  --}}
                            <input type="hidden" name="card_data" class="card_exists">

                            <div class="d-none stripe_form" id="stripe_form">
                                <meta name="csrf-token" content="{{ csrf_token() }}"/>

                                <div class="paymentInfo__panel">
                                    <div class="loaderSignUp" id="loaderShow">
                                    </div>
                                    <div class="hed">
                                        <h4><span class="colored mr-1">Change</span>Payment Info</h4>
                                    </div>
                                    <div class="payment-img">
                                        <img src="{{ asset('assets/trainee/images/stripe.png') }}" alt="">
                                    </div>
                                    <div class="form">
                                        <div id="errors"></div>
                                        {{--                                    <form id="basic-form" name="form-s11" class="form stripe_trainee_payment">--}}
                                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">


                                        <div class="row m-0">
                                            <div class="form-group col-md-4">
                                                <label for="">Full Name </label>
                                                <input type="text" name="card_name" id="card_name"
                                                       value="{{$user->card_name ?? ''}}"
                                                       class="form-control"
                                                       placeholder="Name" >
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="form-group col-md-4">
                                                <label for="">Card Number</label>
                                                {{--                        <label for="">Ending with {{$user ?? ''->last_four_card_digits}}</label>--}}
                                                <input type="text" name="card" id="card" class="form-control"
                                                       value="{{$user->last_four_card_digits ?? ''}}"
                                                       >
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="form-group col-md-2">
                                                <label for="">Expiry Month</label>
                                                <input type="text" name="exp_month" id="exp_month"
                                                       value="{{$user->exp_month ?? ''}}"
                                                       class="form-control"
                                                       onkeypress='validate(event)' placeholder="MM" >
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="">Expiry Year</label>
                                                <input type="text" name="exp_year" id="exp_year"
                                                       value="{{$user->exp_year ?? ''}}"
                                                       class="form-control"
                                                       onkeypress='validate(event)' placeholder="YY" maxlength="2"
                                                       minlength="2" >
                                            </div>
                                        </div>
                                        <div class="row m-0">
                                            <div class="form-group col-md-4">
                                                <label for="">CVV</label>
                                                <input type="text" name="cvv" id="cvv" class="form-control"
                                                       onkeypress='validate(event)'
                                                       placeholder="xxx" maxlength="4" minlength="3" >
                                            </div>
                                        </div>

                                        {{--                                    </form>--}}
                                        <div class="card-wrapper"></div>
                                    </div>

                                </div>

                            </div>
                            <div class="form-group col-md-12 text-right">
                                <button class="submit btn btn-primary" id="payment_save" type="submit">
                                    Save
                                </button>
                            </div>
                            {{--                        <div class="previous_stripe_form d-none" id="stripe_form">--}}
                            {{--                            <p> Card Name : {{Auth::user()->card_name ?? ''}} </p>--}}
                            {{--                            <p> Expire Month : {{Auth::user()->exp_month ?? ''}} </p>--}}
                            {{--                            <p> Expire Year : {{Auth::user()->exp_year ?? ''}} </p>--}}
                            {{--                            <p> Last Digits :{{Auth::user()->last_four_card_digits ?? ''}} </p>--}}
                            {{--                        </div>--}}
                        </div>

                    </div>
                </div>



            </form>
        </div>



    </div>
    @include('trainee.modals.booking_success')

@endsection


@push('scripts')
    <script type="text/javascript">



        $(document).ready(function () {

            $('.trainee-common-chat-box').hide();
        });

        function chatbox(trainer) {
            $('.trainee-common-chat-box').show();
            $(".direct-chat").css('display', 'flex');
            $(".message__box__wrapper").addClass('hidden');
            $(".appointment__box__wrapper").removeClass('hidden');

            $("#name00").text(trainer.name);
            $("#trainerId").val(trainer.id);
            $('#trainingSession').text(trainer.get_address.training_session)
            $('#trainerLocation').val(trainer.get_address.address + ', ' + trainer.get_address.postal_code)
            $('#trainingPreference').val(trainer.get_address.training_session)

            let formData = new FormData();
            formData.append('trainer_id', trainer.id);
            const d = new Date();
            let day = d.getDay();
            let now1 = new Date();
            formData.append('selectedDay', day);
            formData.append('selectedDate', formatDate(now1));
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
                success: function (response) {
                    console.log(response);
                    $('#start').empty()
                    $('#start').append($('<option>',
                        {
                            value: '',
                            text: 'Select Time Slot'
                        }));
                    if (response.length > 0) {
                        for (i = 0; i < response.length; i++) {
                            $('#start').append($('<option>',
                                {
                                    value: response[i],
                                    text: response[i]
                                }));
                        }
                    } else {
                        $('#start').empty()
                        $('#start').append($('<option>',
                            {
                                value: '',
                                text: 'No Slots Available'
                            }));
                    }
                }
            })

        }

        function show_stripe_form() {
            console.log('aaaaa');
            $('.stripe_form').removeClass('d-none');
            $('.show_stripe').addClass('d-none');
            $('.previous_stripe_form').addClass('d-none');
// $('card_exists').val()
            $(".card_exists").val("1");
        }

        //card_exists
        function old_stripe_form() {
            $('.stripe_form').addClass('d-none');
            $('.show_stripe').removeClass('d-none');
            $('.previous_stripe_form').removeClass('d-none');
            $(".card_exists").val("0");

        }

    </script>
@endpush


@push('scripts')
    <script src="{{ asset('assets/trainee/emoji/jquery.emojiarea.js') }}"></script>
    <script src="{{ asset('assets/trainee/emoji/packs/basic/emojis.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            {{--trainee-common-chat-box   disable this--}}
            //Active Tabs based on href
            var URL = window.location.href;
            var URL = URL.substring(URL.indexOf("#") + 1);
            if (URL == 'appointmentTab1' || URL == 'appointmentTab2') {
                console.log('hash--Detected');
                $('.nav-tabs .nav-link').removeClass('active');
                $('.tab-pane').removeClass('show active');
                $('.nav-tabs .nav-link[href="#' + URL + '"]').addClass('active');
                $('.tab-pane[id="' + URL + '"]').addClass('show active');

            } else {
                console.log("hash--empty");
                $('.nav-tabs .nav-link[href="#appointmentTab1"]').addClass('active');
                $('.tab-pane[id="appointmentTab1"]').addClass('show active');
            }


            //SetCurrent Date
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;
            $("#appointmentDate").val(today);
            //disabled Old dates
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();
            var minDate = year + '-' + month + '-' + day;
            $('#appointmentDate').attr('min', minDate);
            //Init timepicker
            $('.timepicker').timepicker();
            $('#goBack').click(function () {
                $('.tab-pane').removeClass('show active');
                $('.tab-pane[id="appointmentTab1"]').addClass('show active');
            });
            $('#goForward').click(function () {
                $('.tab-pane').removeClass('show active');
                $('.tab-pane[id="appointmentTab3"]').addClass('show active');
            });
            //message Emoji
            var $wysiwyg = jQuery('.emojis-wysiwyg').emojiarea({
                wysiwyg: true
            });
            var $wysiwyg_value = jQuery('#emojis-wysiwyg-value');

            $wysiwyg.on('change', function () {
                $wysiwyg_value.text(jQuery(this).val());
            });
            $wysiwyg.trigger('change');
        });

    </script>
@endpush




{{-- validations --}}

@push('scripts')

    <script>
        $(document).ready(function () {
            $("#basic-form").validate({
                rules: {

                    card_name: {
                        required: true,
                        minlength: 3,
                        maxlength: 15

                    },
                    card: {
                        required: true,
                        minlength: 19,
                        maxlength: 20,
                    },
                    exp_month: {
                        required: true,
                        minlength: 2,
                        maxlength: 3
                    },
                    exp_year: {
                        required: true,
                        minlength: 2,
                        maxlength: 3
                    },
                    cvv: {
                        required: true,
                        minlength: 3,
                        maxlength: 3

                    },

                },
                messages: {
                    card_name: {
                        maxlength: '15 characters Max',
                    },
                    card: {
                        minlength: '16 characters Max',
                    },
                    exp_month: {
                        minlength: '2 characters Max',
                    },
                    exp_year: {
                        minlength: '2 characters Max',
                    },
                    cvv: {
                        minlength: '3 characters Max',
                    },

                }
                , submitHandler: function (form) {

                    // e.preventDefault();
                    let formData = new FormData(form);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route('cstore') }}',
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (response) {
                            console.log(response);
                            if (response.code == 200) {
                                let html = ''
                                html += '<div class="alert alert-success alert-dismissable alert-sticky">'
                                html += '<div class="cont">'
                                html += '<ul>'
                                html += '<li>' + response.message + '</li>'
                                html += '</ul>'
                                html += '<div class="alert__icon"><span></span></div>'
                                html += '</div>'
                                html += '</div>'
                                $('#errors').html(html)
                                $('html, body').animate({
                                    scrollTop: 0
                                }, 'slow');
                            } else if (response.code == 404) {
                                let html = ''
                                html += '<div class="alert alert-danger alert-dismissable alert-sticky">'
                                html += '<div class="cont">'
                                html += '<ul>'
                                html += '<li>' + response.message + '</li>'
                                html += '</ul>'
                                html += '<div class="alert__icon"><span></span></div>'
                                html += '</div>'
                                html += '</div>'
                                $('#errors').html(html)
                                $('html, body').animate({
                                    scrollTop: 0
                                }, 'slow');
                            }
                        }, error: function (response) {

                            let html = ''
                            html += '<div class="alert alert-danger alert-dismissable alert-sticky">'
                            html += '<div class="cont">'
                            html += '<ul>'
                            html += '<li>' + response.message + '</li>'
                            html += '</ul>'
                            html += '<div class="alert__icon"><span></span></div>'
                            html += '</div>'
                            html += '</div>'
                            $('#errors').html(html)
                            $('html, body').animate({
                                scrollTop: 0
                            }, 'slow');

                            console.log('error');
                        }
                    })


                }
            });
        });
    </script>
    <style>


        .loaderSignUp {
            /* background: #00000070; */
            height: 344%;
            width: 100%;
            /* position: absolute; */
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
