<link rel="stylesheet" href="{{ asset('assets/trainer/emoji/jquery.emojiarea.css') }}">
{{-- {{$trainer}} --}}
<div class="appointment__box__wrapper hidden">
    {{-- <div class="card-header card-full-header"> --}}
        {{-- <button type="button" class="btn btn-tool btn-arr toggleChatBox"><i
                class="fas fa-arrow-left"></i></button>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
        </div> --}}


        {{--        <div class="card-semi-header">--}}
        {{--            <img style="width: 10%; "class="profile" id="trainerProfile" src="" alt="">--}}
        {{--            <h3 id="name00">Smitham Chelsie</h3>--}}
        {{--            <p id="trainingSession"><i class="fas fa-user"></i> 1 - on - 1</p>--}}
        {{--        </div>--}}
    {{-- </div> --}}
    {{-- <div class="card-header card-collapse-header">
        <h3 class="card-title">
            <button type="button" class="btn btn-tool btn-arr toggleChatBox"><i
                    class="fas fa-arrow-left"></i></i></button>
            {{$trainer->name ?? ''}}
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
        </div>
    </div> --}}
    {{--    <form class="personal__form" action="{{ route('bookappointment') }}" method="post">--}}
    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

<label for="">Select Date</label>
    <input type="date"  class="form-control ">
    <div class="row">

        <div class="col-md-6">
            <label for="">Start Time</label>
            <div class="select">
                <select name="time" class="form-control">
                    <option value="00:00">12.00 AM</option>
                    <option value="00:30">12.30 AM</option>
                    <option value="01:00">01.00 AM</option>
                    <option value="01:30">01.30 AM</option>
                    <option value="02:00">02.00 AM</option>
                    <option value="02:30">02.30 AM</option>
                    <option value="03:00">03.00 AM</option>
                    <option value="03:30">03.30 AM</option>
                    <option value="04:00">04.00 AM</option>
                    <option value="04:30">04.30 AM</option>
                    <option value="05:00">05.00 AM</option>
                    <option value="05:30">05.30 AM</option>
                    <option value="06:00">06.00 AM</option>
                    <option value="06:30">06.30 AM</option>
                    <option value="07:00">07.00 AM</option>
                    <option value="07:30">07.30 AM</option>
                    <option value="08:00">08.00 AM</option>
                    <option value="08:30">08.30 AM</option>
                    <option value="09:00">09.00 AM</option>
                    <option value="09:30">09.30 AM</option>
                    <option value="10:00">10.00 AM</option>
                    <option value="10:30">10.30 AM</option>
                    <option value="11:00">11.00 AM</option>
                    <option value="11:30">11.30 AM</option>
                    <option value="12:00">12.00 PM</option>
                    <option value="12:30">12.30 PM</option>
                    <option value="13:00">01.00 PM</option>
                    <option value="13:30">01.30 PM</option>
                    <option value="14:00">02.00 PM</option>
                    <option value="14:30">02.30 PM</option>
                    <option value="15:00">03.00 PM</option>
                    <option value="15:30">03.30 PM</option>
                    <option value="16:00">04.00 PM</option>
                    <option value="16:30">04.30 PM</option>
                    <option value="17:00">05.00 PM</option>
                    <option value="17:30">05.30 PM</option>
                    <option value="18:00">06.00 PM</option>
                    <option value="18:30">06.30 PM</option>
                    <option value="19:30">07.30 PM</option>
                    <option value="20:00">08.00 PM</option>
                    <option value="20:30">08.30 PM</option>
                    <option value="21:00">09.00 PM</option>
                    <option value="21:30">09.30 PM</option>
                    <option value="22:00">10.00 PM</option>
                    <option value="22:30">10.30 PM</option>
                    <option value="23:00">11.00 PM</option>
                    <option value="23:30">11.30 PM</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <label for="">End Time</label>
            <div class="select">
                <select name="time" class="form-control">
                    <option value="00:00">12.00 AM</option>
                    <option value="00:30">12.30 AM</option>
                    <option value="01:00">01.00 AM</option>
                    <option value="01:30">01.30 AM</option>
                    <option value="02:00">02.00 AM</option>
                    <option value="02:30">02.30 AM</option>
                    <option value="03:00">03.00 AM</option>
                    <option value="03:30">03.30 AM</option>
                    <option value="04:00">04.00 AM</option>
                    <option value="04:30">04.30 AM</option>
                    <option value="05:00">05.00 AM</option>
                    <option value="05:30">05.30 AM</option>
                    <option value="06:00">06.00 AM</option>
                    <option value="06:30">06.30 AM</option>
                    <option value="07:00">07.00 AM</option>
                    <option value="07:30">07.30 AM</option>
                    <option value="08:00">08.00 AM</option>
                    <option value="08:30">08.30 AM</option>
                    <option value="09:00">09.00 AM</option>
                    <option value="09:30">09.30 AM</option>
                    <option value="10:00">10.00 AM</option>
                    <option value="10:30">10.30 AM</option>
                    <option value="11:00">11.00 AM</option>
                    <option value="11:30">11.30 AM</option>
                    <option value="12:00">12.00 PM</option>
                    <option value="12:30">12.30 PM</option>
                    <option value="13:00">01.00 PM</option>
                    <option value="13:30">01.30 PM</option>
                    <option value="14:00">02.00 PM</option>
                    <option value="14:30">02.30 PM</option>
                    <option value="15:00">03.00 PM</option>
                    <option value="15:30">03.30 PM</option>
                    <option value="16:00">04.00 PM</option>
                    <option value="16:30">04.30 PM</option>
                    <option value="17:00">05.00 PM</option>
                    <option value="17:30">05.30 PM</option>
                    <option value="18:00">06.00 PM</option>
                    <option value="18:30">06.30 PM</option>
                    <option value="19:30">07.30 PM</option>
                    <option value="20:00">08.00 PM</option>
                    <option value="20:30">08.30 PM</option>
                    <option value="21:00">09.00 PM</option>
                    <option value="21:30">09.30 PM</option>
                    <option value="22:00">10.00 PM</option>
                    <option value="22:30">10.30 PM</option>
                    <option value="23:00">11.00 PM</option>
                    <option value="23:30">11.30 PM</option>
                </select>
            </div>
        </div>

    </div>

    {{-- <div class="card-body" style="padding-bottom: 45px;">
        <div class="create-appointment">
            <input type="hidden" name="trainerId" id="trainerId" value="{{$trainer->id}}">
            <h3>Create Appointment</h3>
            <input id="selectedDate" name="selectedDate" type="hidden" value="">
            <div class="appiontment__calendar" id='appiontment__calendar'></div>
            <div class="startendtime">
                <div class="form-group">
                    <label for="">Start Time</label>
                    <select name="start_time" id="start">

                    </select>

                </div>

            </div> --}}

            {{--                {{dd($trainer->getAddress->training_session)}}--}}

            <div class="row">
                <div class="col-md-6">
                    <div class="locations">
                        <div class="form-group trainerlocation">
                            <label for="">Location Preference</label>
                            <select id="preferedLocation" name="preferedLocation" class="form-control">
                                <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                <option value="myLocation"> @if(isset($trainer->getAddress))
                                        {{-- {{$trainer->getAddress->address ?? ''}} --}}
                                    @endif <span> Trainer location</span>
                                </option>
                                <option value="clientlocation">@if(Auth::check())
                                        @if(isset(Auth::user()->getAddress))
                                            {{-- {{Auth::user()->getAddress->address}} --}}
                                        @endif
                                    @endif <span>Trainee location </span>
                                </option>
                            </select>

                        </div>

                    </div>
                </div>

                <div class="col-md-6">

                    <div class="form-group checkboxes">
                        <label  for="" class="">




        {{--                    @if(isset($trainer->getAddress))--}}
        {{--                        @if($trainer->getAddress->training_session == '1 on 1')--}}
                                    <input type="radio" id="a" name="trainingPreference" value="1 on 1" checked="checked">
                                    <label for="a">1 on 1</label> &nbsp;&nbsp;&nbsp;
        {{--                        @endif--}}
        {{--                    @endif--}}

        {{--                    @if(isset($trainer->getAddress))--}}
        {{--                        @if($trainer->getAddress->training_session == '2 on 1')--}}
                                    <input type="radio" id="s" name="trainingPreference" value="2 on 1">
                                    <label for="s">2 on 1</label>
        {{--                        @endif--}}
        {{--                    @endif--}}


        {{--                    <select id="trainingPreference" name="trainingPreference" class="form-control"--}}
        {{--                            onchange="selectChange()">--}}
        {{--                        <option selected disabled> Select</option>--}}
        {{--                        @if(isset($trainer->getAddress))--}}
        {{--                            @if($trainer->getAddress->training_session == '1 on 1')--}}
        {{--                                <option value="1 on 1"> 1 on 1</option>--}}
        {{--                            @endif--}}
        {{--                        @endif--}}
        {{--                        @if(isset($trainer->getAddress))--}}
        {{--                            @if($trainer->getAddress->training_session == '2 on 1')--}}
        {{--                                <option value="2 on 1"> 2 on 1</option>--}}
        {{--                            @endif--}}
        {{--                        @endif--}}
        {{--                    </select>--}}
                        </label>

                        <span>Price: $ 451</span>
                    </div>
                    {{--                {{dd(Auth::user()->getAddress)}}--}}

                </div>

            </div>




            {{-- <div class="form-group">
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <label style="margin-left: 19px;font-size: 18px" for="" class="">Hourly Rate </label>
                    </div>
                    <div class="col-md-6">
                        <span id="one_on_one"> 1 on 1 session $<b id="one_on_one_rates"></b> </span><br>
                        <span id="two_on_one"> 2 on 1 session $<b id="two_on_one_rates"></b></span>
                    </div>
                </div>
                <div>
                    <span style="color: grey ; float: right"> Exclusive of tax 13% </span>
                </div>
                <hr>
            </div> --}}

            <script>

                $('#one_on_one').show();
                $('#two_on_one').hide();

                function selectChange() {
                    console.log('e')
                    var Sessionpref = $('#trainingPreference').val();
                    // console.log(Sessionpref);
                    if (Sessionpref == '2 on 1') {
                        $('#one_on_one').hide();
                        $('#two_on_one').show();
                    }
                    if (Sessionpref == '1 on 1') {
                        $('#one_on_one').show();
                        $('#two_on_one').hide();

                    }

                }

                // $(
                //
                // "select"
                // ).change(function () {

            </script>

        </div>
    </div>
    {{--    </form>--}}
</div>
</div>


@push('scripts')
    <script src="{{ asset('assets/trainer/emoji/jquery.emojiarea.js') }}"></script>
    <script src="{{ asset('assets/trainer/emoji/packs/basic/emojis.js') }}"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            // $('.trainerProfile src').val("fgg");
            // $('#trainerProfile').attr('src', '{{asset('assets/trainer/images/profile')}}');
            $('#trainerProfile').attr('src', '{{asset('assets/trainer/images/default-user.png')}}');


            let now1 = new Date();
            $("#selectedDate").val(formatDate(now1));
        });

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        }

        var $wysiwyg = jQuery('.emojis-wysiwyg').emojiarea({
            wysiwyg: true
        });
        var $wysiwyg_value = jQuery('#emojis-wysiwyg-value');

        $wysiwyg.on('change', function () {
            $wysiwyg_value.text(jQuery(this).val());
        });
        $wysiwyg.trigger('change');

        $(".toggleChatBox").click(function () {
            console.log("asass");
            $(".direct-chat").toggleClass("collapsed-card");
        });
        jQuery(document).ready(function () {
            $('#appiontment__calendar').fullCalendar({
                dayClick: function (date, jsEvent, view) {
                    const now = new Date();
                    now.toISOString()
                    if (date > now) {
                        var getSelectedValue = date.format();
                        $("#selectedDate").val(getSelectedValue);
                        $('td.fc-day-top').removeClass('selectedThumb');
                        $('td.fc-day-top[ data-date=' + getSelectedValue + ']').addClass('selectedThumb');
                        let formData = new FormData();
                        let trainer_id = $("#trainerId").val();
                        formData.append('trainer_id', trainer_id);
                        const d = new Date(date.format());
                        let day = d.getDay();
                        formData.append('selectedDay', day);
                        formData.append('selectedDate', getSelectedValue);
                        // console.log(formData);
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
                                // alert('success');
                                console.log(response)
                                $('#start').empty()
                                $('#start').append($('<option>',
                                    {
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
                            },
                            error: function (response) {
                                // alert('error');
                            }
                        })
                    } else {
                        return false;
                    }
                }
            });
            $('input.timepicker').timepicker();
        });

    </script>
@endpush

