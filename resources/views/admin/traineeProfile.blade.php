@extends('admin.layouts.app')
@section('title', 'Trainee Profile ')

@section('content')

    <div class="trainee__profile__panel panel__style mb-4">
        <div class="hed">
            <h2>Trainee Information</h2>
        </div>
        <div class="trainee__info">
            <div class="media">
                @if($profile['user']->profile_image)
                    <img src="{{ asset($storage.$profile['user']->profile_image) }}" alt="">
                @else
                    <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                @endif

                <div class="media-body">
                    <div class="row">
                        <div class="member__date col-md-12">
                            <p>
                                <span>Member Since Date : {{date('j F, Y', strtotime($profile['user']->created_at))}}</span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 heading">
                            <h2>{{$profile['user']->name ?? ''}}</h2>
                        </div>
                        <div class="col-md-6 default__list top__list">
                            <ul>
                                <li>
                                    <span class="head">E-mail</span>
                                    <span class="data">{{$profile['user']->email ?? ''}}</span>
                                </li>
                                <li>
                                    <span class="head">Session</span>
                                    <span class="data">{{$profile['completedsessions'] ?? ''}} Session Completed</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 default__list">
                    <ul>
                        <li>
                            <span class="head">Date of Birth</span>
                            <span class="data">{{date('j F, Y', strtotime($profile['user']->dob))}} <strong
                                    class="pl-5">{{date_diff(date_create($profile['user']->dob), date_create('today'))->y}} year</strong></span>
                        </li>
                        @if(isset($profile['user']->getAddress))
                            <li class="bdr0">
                                <span class="head">Postal Code</span>
                                <span class="data">{{$profile['user']->getAddress->postal_code ?? ''}}</span>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-5 offset-md-2 default__list">
                    <ul>
                        @if(isset($profile['user']->getAddress->getCountry))
                            <li>
                                <span class="head">Location</span>
                                <span class="data">{{$profile['user']->getAddress->getCountry->name ?? ''}}</span>
                            </li>
                        @endif
                        @if(isset($profile['user']->getAddress))
                            <li>
                                <span class="head">Address</span>
                                <span class="data">{{$profile['user']->getAddress->address ?? ''}}</span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="sessions__user__panel panel__style mb-4">
        <div class="hed">
            <h4>Upcoming Sessions</h4>
        </div>
        <div class="table table-responsive mb-0">
            <table id="sessions_table" class="table table-all-sessions table__style mb0">

                <thead>
                <tr>
                    <th>Trainers</th>
                    <th>Location</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @if($profile['sessions'])
                    @foreach($profile['sessions'] as $session)
                        <tr>
                            <td>
                                <div class="custom-flex">
                                    <div class="user-img">
                                        <img src="{{asset('assets/admin/images/default-user.png')}}" alt="">
                                    </div>
                                    <div class="user-name">
                                        @if(count($session->myTrainersNames) > 0)
                                            {{$session->myTrainersNames[0]->name ?? ''}}
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>

                                {{ $session->location ?? ''}}
                                {{--                                @if($session->location == 'clientlocation')--}}
                                {{--                                    Trainee Location--}}
                                {{--                                @elseif($session->location == 'myLocation')--}}
                                {{--                                    Trainer Location--}}
                                {{--                                @endif--}}
                            </td>
                            <td>{{$session->training_session}}</td>
                            <td>{{date('j F, Y', strtotime($session->date));}}</td>
                            <td>{{$session->start_time}}</td>
                            @if($session->status == 'pending')
                                <td><span class="status__pending">Upcoming</span></td>
                            @elseif($session->status == 'cancelled')
                                <td><span class="status__confirm">Continue</span></td>
                            @elseif($session->status == 'confirmed')
                                <td><span class="status__confirm">Continue</span></td>
                            @elseif($session->status == 'completed')
                                <td><span class="status__confirm">Continue</span></td>
                            @else
                                <td>-</td>
                            @endif
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    @include('admin.modals.delete_trainee')

@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sessions_table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": true,
                language: {
                    search: "Search",
                    searchPlaceholder: "Search by Trainers Name / Location"
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
@endpush
