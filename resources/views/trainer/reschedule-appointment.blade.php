<div class="modal-content">
    <div class="modal-header">
        <form class="w-100">
            <div class="form-group mb-2">
                <label class="form-check-label" for="rescheduleRadio">
                    <input class="form-check-input" type="radio" name="form_type" id="rescheduleRadio" value="toggle_1" checked>
                    Reschedule
                </label>
                <label class="form-check-label ml-4" for="cancelRadio">
                    <input class="form-check-input" type="radio" name="form_type" id="cancelRadio" value="toggle_2">
                    Cancel
                </label>
            </div>
        </form>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="appointment_reg">
            <div class="modal-body toggle_1">
            <h5 class="modal-title my-3">Re schedule</h5>
            <div id="errors"></div>
                <div class="form-group">
                    <label for="date">Select Date <span class="text-danger">*</span></label>
                    <input type="date" id="appiontment__calendar" name="selectedDate" class="form-control">
                </div>
                <div class="form-group">
                    <label for="date">Time<span class="text-danger">*</span></label>
                    <select id="appointment_time" name="start_time" class="form-control">
                        <option value="">No Slots Available</option>
                    </select>
                </div>
                {{--
                <div class="form-group">
                    <label for="date">Location<span class="text-danger">*</span></label>
                    <select id="preferedLocation" name="preferedLocation" class="form-control" >
                        <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                        <option disabled value="" selected> Select Location</option>
                        @if($trainer->getAddress->location == 'myLocation,clientlocation')
                        <option value="myLocation"> @if(isset($trainer->getAddress))
                            {{$trainer->getAddress->address ?? ''}}
                            @endif <span> Trainer</span>
                        </option>
                        <option value="clientlocation">@if($trainee)
                            @if(isset($trainee->getAddress))
                            {{$trainee->getAddress->address}}
                            @endif
                            @endif <span>Trainee </span>
                        </option>
                        @endif

                        @if($trainer->getAddress->location == 'myLocation')
                        <option value="myLocation"> @if(isset($trainer->getAddress))
                            {{$trainer->getAddress->address ?? ''}}
                            @endif <span> Trainer</span>
                        </option>
                        @endif
                        @if($trainer->getAddress->location == 'clientlocation')

                        <option value="clientlocation">@if($trainee)
                            @if(isset($trainee->getAddress))
                            {{$trainee->getAddress->address}}
                            @endif
                            @endif <span>Trainee </span>
                        </option>
                        @endif
                    </select>
                </div>
                --}}
            </div>
            <div class="modal-footer toggle_1">
                <button type="button" class="btn btn-success-o" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Reschedule</button>
            </div>
        </form>

        <div class="modal-body d-none toggle_2">
            <!-- <h5 class="modal-title">Cancel</h5> -->
            <div id="msg"></div>
            <p>Your session will be cancelled. Do you want to accept.?</p>
        </div>
        <div class="modal-footer toggle_2">
            <button type="button" class="btn btn-cancel" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger cancel-appointment-button">
                <div class="spinner-grow spinner-grow-sm cancel-spinner" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
                Accept
            </button>
        </div>



    </div>
<script>
    $(document).ready(function () {

        $('.toggle_1').removeClass('d-none');
        $('.toggle_2').addClass('d-none');

        $(".form-check-input").change(function(){ 
            if ( $(this).is(":checked") ) { 
                var getToggleVal = $(this).val();
                if (getToggleVal == 'toggle_1') {
                    $('.toggle_1').removeClass('d-none');
                    $('.toggle_2').addClass('d-none');
                } else {
                    $('.toggle_1').addClass('d-none');
                    $('.toggle_2').removeClass('d-none');
                }
            }
        });

        $("#msg").hide()
        $(".cancel-spinner").hide()

        $(".cancel-appointment-button").on("click", function () {

            let url = "{{ route('trainer_appointment_cancel', [$session_id]) }}"
        
            $.ajax({
                url: url,
                type: "GET",
                beforeSend: function () {
                    $(".cancel-spinner").show()
                },
            }).done(function (response) {

                $("#msg").empty()
                $(".cancel-spinner").hide()

                console.log(response)
                let html = ""
                if (response.code == 200) {
                    html = '<div class="alert alert-success" role="alert">'+ response.message +'</div>'
                } else {
                    html = '<div class="alert alert-danger" role="alert">'+ response.message +'</div>'
                }
                $("#msg").html(html).show()

                setTimeout(() => {
                    window.location.reload();
                }, 5000);

            }).catch(function (error) {
                console.log(error)
            }) 
        });


        jQuery("#appiontment__calendar").on("change", function ($event) {
            now = new Date();
            date = new Date($event.target.value);
            now.toISOString()
            date.toISOString()
            appointDateFunction(now, date);
        });

        function appointDateFunction(now, date) {
            // if (date >= now) {
            if (true) {
                var getSelectedValue = $('#appiontment__calendar').val();
                let d = new Date(date);
                let trainer_id = '{{ $trainer_id }}';

                let formData = new FormData();

                formData.append('trainer_id', trainer_id);
                let day = d.getDay();
                formData.append('selectedDay', day);
                formData.append('selectedDate', getSelectedValue);
                $.ajax({
                    url: '{{ route("getTrainerSessionsTimings") }}',
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (response) {
                        $('#appointment_time').empty()
                        $('#appointment_time').append($('<option>', {
                            value: '',
                            text: 'Select Time Slot'
                        }));
                        if (response.length > 0) {
                            for (i = 0; i < response.length; i++) {
                                $('#appointment_time').append($('<option>', {
                                    value: response[i],
                                    text: response[i]
                                }));
                            }
                        } else {
                            $('#appointment_time').empty()
                            $('#appointment_time').append($('<option>', {
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
                        depends: function (elem) {
                            return true;
                        }
                    },
                },
            },
            messages: {
                selectedDate: {
                    required: "This field is required",
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
            errorPlacement: function (error, element) {
                if (element.attr("name") == "trainingPreference") {
                    $('#trainingPreference_erorr').html(error)
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                $("#finishForm").html('Loading...');
                let formData = new FormData();
                $.each($('form').serializeArray(), function (i, field) {
                    formData.append(field.name, field.value);
                });
                formData.append('trainerId','{{ $trainer_id }}')
                formData.append('trainee_id','{{ $trainee_id }}')
                formData.append('session_id','{{ $session_id }}')
                $.ajax({
                    url: '{{ route("rebook-appointment") }}',
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (response) {
                        let html = ''
                        html += '<div class="alert alert-success alert-dismissable alert-sticky">'
                        html += '<div class="cont">'
                        html += '<ul>'
                        html += '<li>Appointment is booked successfully</li>'
                        html += '</ul>'
                        html += '</div>'
                        html += '</div>'
                        $('#errors').empty().html(html)
                        setTimeout(function () {
                            // window.location.href = response.url
                            window.location.reload()
                        }, 500);
                    },
                    error: function (err) {
                        if (err.responseJSON.stripe_response) {
                            $("#finishForm").html('Finish');
                            let html = ''
                            html += '<div class="alert alert-danger alert-dismissable alert-sticky">'
                            html += '<div class="cont">'
                            html += '<ul>'
                            html += '<li>' + err.responseJSON.stripe_response.message + '</li>'
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

    }) //ready

</script>
