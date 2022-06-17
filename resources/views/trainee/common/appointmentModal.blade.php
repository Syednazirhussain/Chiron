<style>


    .stepwizard-step p {
        margin-top: 10px;
    }

    .stepwizard-row {
        display: table-row;
    }

    .stepwizard {
        display: table;
        width: 100%;
        position: relative;
    }

    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }

    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;

    }

    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
</style>

<div class="container">

    <!-- Modal Trigger -->

    <!-- Modal -->
    <div id="" class="modal fade modalMultiStep" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">



            <div class="modal-content">

                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                            <p>Step 1</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p>Step 2</p>
                        </div>

                    </div>
                </div>

                <link rel="stylesheet" href="{{ asset('assets/trainer/emoji/jquery.emojiarea.css') }}">

                <div class="appointment__box__wrapper hidden">
                    <div class="card-header card-full-header">
                        <button type="button" class="btn btn-tool btn-arr toggleChatBox"><i
                                class="fas fa-arrow-left"></i></button>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i>
                            </button>
                        </div>
                        <div class="card-semi-header">
                            <img class="profile" id="trainerProfile" src="" alt="">
                            <h3 id="name00">Smitham Chelsie</h3>
                            <p id="trainingSession"><i class="fas fa-user"></i> 1 - on - 1</p>
                        </div>
                    </div>
                    <div class="card-header card-collapse-header">
                        <h3 class="card-title">
                            <button type="button" class="btn btn-tool btn-arr toggleChatBox"><i
                                    class="fas fa-arrow-left"></i></i></button>
                            Carlos Brendon
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                    class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <form class="personal__form" action="{{ route('bookappointment') }}" method="post">
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                        <div class="card-body" style="padding-bottom: 45px;">
                            <div class="create-appointment">
                                <input type="hidden" name="trainerId" id="trainerId">
                                <h3>Create Appointment</h3>
                                <input id="selectedDate" name="selectedDate" type="hidden" value="">
                                <div class="appiontment__calendar" id='appiontment__calendar'></div>
                                <div class="startendtime">
                                    <div class="form-group">
                                        <label for="">Start Time</label>
                                        <select name="start_time" id="start">

                                        </select>

                                    </div>

                                </div>


                                <div class="form-group">
                                    <label style="margin-left: 19px;" for="" class="">Session Preference
                                        <select id="trainingPreference" name="trainingPreference" class="form-control"
                                                onchange="selectChange()">
                                            <option value="1 on 1"> 1 on 1</option>
                                            <option value="2 on 1"> 2 on 1</option>
                                        </select>
                                    </label>
                                </div>


                                <div class="locations">
                                    <div class="form-group trainerlocation">
                                        <label for="">Location Preference</label>
                                        <select id="preferedLocation" name="preferedLocation" class="form-control">
                                            <option value="myLocation"> myLocation</option>
                                            <option value="clientlocation"> clientlocation</option>
                                        </select>
                                        <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Trainer Location</label>
                                        {{--                        <input type="text" class="form-control disabled" name="trainerLocation" id="trainerLocation"--}}

                                        {{--                        />--}}
                                        <input type="text" class="form-control"
                                        >
                                        <span class="icon"><i class="fas fa-map-marker-alt"></i>
                            <i id="trainerLocation"></i>
                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label style="margin-left: 19px;font-size: 18px" for="" class="">Hourly
                                                Rate </label>
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
                                </div>

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


                                <div class="actions">
                                    <button class="btn btn-book" type="submit">Book</button>
                                    <button class="btn btn-primary-o" data-card-widget="remove">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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


        {{--                <form role="form">--}}
        {{--                    <div class="row setup-content" id="step-1">--}}
        {{--                        <div class="col-xs-12">--}}
        {{--                            <div class="col-md-12">--}}
        {{--                                <h3> Step 1</h3>--}}
        {{--                                <div class="form-group">--}}
        {{--                                    <label class="control-label">First Name</label>--}}
        {{--                                    <input maxlength="100" type="text" required="required" class="form-control"--}}
        {{--                                           placeholder="Enter First Name"/>--}}
        {{--                                </div>--}}
        {{--                                <div class="form-group">--}}
        {{--                                    <label class="control-label">Last Name</label>--}}
        {{--                                    <input maxlength="100" type="text" required="required" class="form-control"--}}
        {{--                                           placeholder="Enter Last Name"/>--}}
        {{--                                </div>--}}
        {{--                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}

        {{--                    <div class="row setup-content" id="step-2">--}}
        {{--                        <div class="col-xs-12">--}}
        {{--                            <div class="col-md-12">--}}
        {{--                                <h3> Step 2</h3>--}}
        {{--                                <div class="form-group">--}}
        {{--                                    <label class="control-label">Company Name</label>--}}
        {{--                                    <input maxlength="200" type="text" required="required" class="form-control"--}}
        {{--                                           placeholder="Enter Company Name"/>--}}
        {{--                                </div>--}}
        {{--                                <div class="form-group">--}}
        {{--                                    <label class="control-label">Company Address</label>--}}
        {{--                                    <input maxlength="200" type="text" required="required" class="form-control"--}}
        {{--                                           placeholder="Enter Company Address"/>--}}
        {{--                                </div>--}}
        {{--                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}

        {{--                </form>--}}


        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');
    });
</script>
