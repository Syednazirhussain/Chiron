@extends('admin.layouts.app')
@section('title', 'Admin All Sessions')

@section('content')

    <div class="sessions__user__panel panel__style mb-4">
        <div class="hed">
            <h4>Sessions</h4>
        </div>
        <div class="table table-responsive mb-0">
            <table id="sessions_table" class="table table-all-sessions table__style mb0">

                <thead>
                <tr>
                    <th>Trainer</th>
                    <th>Trainee</th>
                    <th>Location</th>
                    <th>Sessions</th>
                    <th>Fee</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($allSessions) && $allSessions->count() > 0)
                    @foreach($allSessions as $session)
                        <tr>
                            <td>
                                <div class="custom-flex">
                                    <div class="user-img">
                                            @if($session->trainer->profile_image)
                                                <img
                                                    src="{{ asset($storage.$session->trainer->profile_image) }}"
                                                    alt="">
                                            @else
                                                <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                                            @endif
                                    </div>
                                    <div class="user-name">
                                            @if($session->trainer->deleted == 1)
                                                <a href="#" data-toggle="tooltip" title="Account Is Blocked">
                                                    <b style="color: red"> {{$session->trainer->name}} </b>
                                                </a>
                                            @else
                                                {{$session->trainer->name}}
                                            @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="custom-flex">
                                    <div class="user-img">
                                            @if($session->trainee->profile_image)
                                                <img
                                                    src="{{ asset($storage.$session->trainee->profile_image) }}"
                                                    alt="">
                                            @else
                                                <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                                            @endif
                                    </div>
                                    <div class="user-name">
                                            {{$session->trainee->name}}

                                    </div>
                                </div>
                            </td>
                            <td>
                                @if(isset($session->trainingPreference ) && $session->trainingPreference == 'clientlocation' )
                                Trainee Location 
                            
                            @elseif(isset($session->trainingPreference ) && $session->trainingPreference == 'myLocation')
                               Trainer Location 
                            @else
                            {{$session->location ?? ''}}
                            @endif
                            </td>
                            <td>{{$session->training_session}}</td>
                            <td>${{ $session->payable_amount }}</td>
                            <td>{{date('j F, Y', strtotime($session->date))}}</td>
                            <td>{{$session->start_time}}</td>
                            {{--{{dd($session->cancelled_by)}}--}}

                            @if($session->status == 'pending')
                                <td><span class="status__pending">pending on Approval</span></td>
                            @elseif($session->status == 'cancelled')
                                <td>
                                    <span class="status__decline">Cancelled</span><br>
                                    <span>by 
                                        @if(isset($session->appointmentCancelledBy))
                                            {{$session->appointmentCancelledBy->name ?? ''}}
                                        @endif
                                    </span>
                                </td>
                            @elseif($session->status == 'confirmed')
                            <td><span class="status__confirm">Confirmed</span></td>
                            @elseif($session->status == 'rescheduled')
                            <td><span class="status__pending">Rescheduled</span></td>
                            @elseif($session->status == 'decline')
                                <td><span class="status__decline">declined</span></td>
                            @elseif($session->status == 'completed')
                                <td><span class="status__confirm">Completed</span></td>
                            @elseif(isset($session->trainer))
                                @if($session->trainer->deleted == 1)
                                    <td><span><b style="color: red">Blocked </b></span></td>
                                @endif
                            @else
                                <td class="">-</td>
                            @endif
                        </tr>
                    @endforeach
                @else
                <tr > <td colspan="9" style="vertical-align : middle;text-align:center;"> No Record Found </td> </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sessions_table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": true,
                language: {
                    search: "Search",
                    searchPlaceholder: "Search by Trainers & Trainees Name"
                },
                "fnDrawCallback": function (oSettings) {
                    if (oSettings._iDisplayLength > oSettings.fnRecordsDisplay()) {
                        $(oSettings.nTableWrapper).find('.dataTables_paginate').hide();
                    } else {
                        $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
                    }
                }
            });

        });

    </script>

    <script>
        $(document).ready(function () {
            // $('#sessions_table').DataTable({
            //     "paging": true,
            //     "lengthChange": true,
            //     "searching": true,
            //     "ordering": false,
            //     "info": true,
            //     "autoWidth": true,

            // });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
