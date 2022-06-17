@extends('trainee.layouts.app')
@section('title', 'Booking Appointment')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('assets/trainee/emoji/jquery.emojiarea.css') }}">

<div class="appointment__panel panel__style fixedHeight">
    <ul class="nav nav-tabs" id="appointment-tab-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="appointmentTab1-tab" data-toggle="pill" href="#appointmentTab1" role="tab"
                aria-controls="appointmentTab1" aria-selected="true">Booking Appointment</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="appointmentTab2-tab" data-toggle="pill" href="#appointmentTab2" role="tab"
                aria-controls="appointmentTab2" aria-selected="false">Message</a>
        </li>
    </ul>
    <div class="modal_popup1">
        <div class="card-body px-0">
            <div class="tab-content" id="appointment-tab-tabs-content">
                <div class="tab-pane fade show active" id="appointmentTab1" role="tabpanel"
                    aria-labelledby="appointmentTab1-tab">
                    <!-- <p>{{$trainer->name ?? ''}}  </p> -->
                    <div>
                        @include('trainee.test_appiontment', ['trainer' => $trainer])
                    </div>
                </div>
                <div class="tab-pane fade" id="appointmentTab2" role="tabpanel" aria-labelledby="appointmentTab2-tab">
                    @include('trainee.trainerchat')
                </div>
            </div>
        </div>
    </div>
</div>
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
        // $('.timepicker').timepicker();
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

            },
            submitHandler: function (form) {

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
                            html +=
                                '<div class="alert alert-success alert-dismissable alert-sticky">'
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
                            html +=
                                '<div class="alert alert-danger alert-dismissable alert-sticky">'
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
                    },
                    error: function (response) {

                        let html = ''
                        html +=
                            '<div class="alert alert-danger alert-dismissable alert-sticky">'
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
    .message__box__wrapper {
        height: 500px;
    }

    .panel__style {
        margin-bottom: 0;
    }


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
    .crossbtn {
        display: none;
    }
    .emojionearea.control-form.msgField {
        /* width: 95%; */
        border: 0;
        top: 1px;
    }
    .direct-chat-messages {
        height: 100%;
    }
</style>

@endpush
