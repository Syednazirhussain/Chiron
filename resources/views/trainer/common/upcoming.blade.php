<div class="session__panel panel__style">
    <div class="hed">
        <h4>Upcoming Sessions</h4>
        <a href="{{ route('upcoming_session') }}" class="float-right"><i class="fa fa-arrow-right"></i></a>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    </div>
    @endif
    <div class="table table-responsive mb0">
        <table class="table table-session table__style mb0" id="upcoming_sessions_table" >
            <thead>
                <tr>
                    <th>Trainee</th>
                    <th>Location</th>
                    <th>Session</th>
                    <th>Date</th>
                    <th>Time</th>
                    {{-- <th>Fee</th> --}}
                    <th class="w160">Booking Status</th>
                    <th class="text-center">Action</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($upcomingSessions as $key=> $session)
                @php
                if($key==5 && last(request()->segments())=='dashboard') break;
                @endphp
                <tr>
                    <td>
                        <div class="image__text">
                            @if (isset($session->trainee->profile_image))
                            @php 
                                $profile_image= asset($storage.$session->trainee->profile_image) 
                            @endphp
                            <img src="{{ $profile_image }}">
                            @else
                            @php $profile_image= asset('assets/trainee/images/default-user.png')@endphp
                            <img src="{{  $profile_image }}">
                            @endif
                            <span><button class="modal__link sessionRequest" type="button" data-toggle="modal"
                                    data-dateRequest="{{ date('j F, Y', strtotime($session->date)) }}"
                                    data-timeRequest="{{ $session->start_time }}"
                                    data-locationRequest="{{ $session->location }}"
                                    data-nameRequest="{{ $session->trainee->name }}"
                                    data-imageRequest="{{  $profile_image }}"
                                    data-target="#sessionRequestModal">{{ $session->trainee->name }}</button></span>
                        </div>
                    </td>
                    <td>
                        @if(isset($session->trainingPreference ) && $session->trainingPreference == 'clientlocation' )
                        Client Location 
                        
                        @elseif(isset($session->trainingPreference ) && $session->trainingPreference == 'myLocation')
                          My Location 
                        @else
                        {{$session ?? ''}}
                        @endif
                    <td>{{ $session->training_session ?? '' }}</td>
                    <td>{{ date('j F, Y', strtotime($session->date)) }}</td>
                    <td>{{ $session->start_time ?? '' }}</td>
                    {{-- <td>${{ $session->payable_amount ?? '0' }}</td> --}}
                    <td>
                        @if ($session->status == 'pending' || $session->status == null)
                        <div class="confirm__btn">
                            <span class="accept"><button class="modal__link sessionaccept" type="button"
                                    data-rowidaccept="{{ $session->id }}"
                                    data-nameaccept="{{ $session->trainee->name }}"
                                    data-traineeidaccept="{{ $session->trainee->id }}" data-toggle="modal"
                                    data-target="#acceptSessionRequestModal"><i class="fa fa-check"
                                        aria-hidden="true"></i></button>
                                </br> Accept
                            </span>
                            <span class="reject"><button class="modal__link sessionreject" type="button"
                                    data-rowidreject="{{ $session->id }}"
                                    data-namereject="{{ $session->trainee->name }}"
                                    data-traineeidreject="{{ $session->trainee->id }}" data-status="decline"
                                    data-toggle="modal" data-target="#declineSessionRequestModal"><i class="fa fa-times"
                                        aria-hidden="true"></i></button>
                                </br> Decline
                            </span>
                        </div>
                        @elseif($session->status == 'cancelled')
                        @if($session->payment_status == 'Refund')
                        <span class="status__decline">Cancelled/Refunded</span>
                        @else
                        <span class="status__decline">Cancelled</span>
                        @endif
                        @elseif($session->status == 'confirmed')
                        <span class="status__confirm">Confirmed</span>

                        @elseif($session->status == 'rescheduled')
                        <span class="status__confirm">Rescheduled</span>

                        @elseif($session->status == 'decline')
                        <span class="status__decline">Decline</span>
                        @endif
                    </td>

                    @php
                        $show_complete_btn = 0;
                        $dt = Carbon\Carbon::now();
                        $date1 = explode(' ', $dt);

                        $session_date = $session->date;
                        $date2 = explode(' ', $session_date);

                        if ($date1[0] == $date2[0]) {
                            $show_complete_btn = 0;
                        } elseif ($date1[0] < $date2[0]) {
                            $show_complete_btn = 1;
                        } else {
                            $show_complete_btn = 2;
                        }
                    @endphp

                    <td class="text-center">
                        @if ($session->status == 'pending' || $session->status == null)
                        @elseif($session->status == 'confirmed' || $session->status == 'rescheduled')
                            @if ($show_complete_btn == 0 || $show_complete_btn == 2)
                            <button class="btn btn-success sessionCompleted" data-rowidCompleted="{{ $session->id }}"
                                data-nameCompleted="{{ $session->trainee->name }}"
                                data-traineeidCompleted="{{ $session->trainee->id }}">
                                Mark Completed
                            </button>
                            @else
                                <!-- <span class="status__confirm">Upcomming</span> -->
                                <button class="btn btn-cancel m-1" id="cancel-appointment" data-toggle="modal"
                                    data-target="#myModal" data-session-id="{{ $session->id }}"
                                    data-traineeId="{{ $session->trainee->id }}" onclick="confirmCancel(this)">
                                    Reschedule/Cancel
                                </button>
                            @endif
                        @elseif($session->status == 'cancelled')
                        @elseif($session->status == 'decline')
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('message', $session->trainee->id ?? '') }}"
                            class="btn btn-primary"><img src="{{ asset('assets/trainer/images/icons/chatting.png') }}"
                               >Message</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" style="vertical-align : middle;text-align:center;"> No Record Found </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" id="user_jobs">
    </div>
</div>
<style>

table.dataTable.no-footer {
    border-bottom: none
}
</style>
<script>
        $(document).ready( function () {
    if(window.location.pathname !='/trainer/dashboard'){
        // $('.table').DataTable();
        $('#upcoming_sessions_table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": true,
                language: {
                    search: "Search",
                    searchPlaceholder: "Search by Trainees"
                },
                "fnDrawCallback": function (oSettings) {
                    if (oSettings._iDisplayLength > oSettings.fnRecordsDisplay()) {
                        $(oSettings.nTableWrapper).find('.dataTables_paginate').hide();
                    } else {
                        $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
                    }
                }
            });}
            $(table).removeClass("no-footer");
    } );
    function confirmCancel($event) {
        var session_id = $("#cancel-appointment").data('session-id')
        var traineeid = $("#cancel-appointment").data('traineeid')
        $.ajax({
            url: '{{ route("reschedule-appointment") }}',
            type: 'GET',
            cache: false,
            data: {
                traineeid,
                session_id
            },
            datatype: 'html',
            beforeSend: function () {
                $('#user_jobs').html('Loading...');
            },
            success: function (data) {
                console.log('success');
                console.log(data);
                if (data.success == true) {
                    $('#user_jobs').html(data.html);
                }
            },
            error: function (xhr, textStatus, thrownError) {
                alert(xhr + "\n" + textStatus + "\n" + thrownError);
            }
        });
    }
</script>

