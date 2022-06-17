@extends('trainee.layouts.app')
@section('title') @endsection
@section('content')
    <div class="session__panel panel__style">
        <div class="hed">
            <h4>Upcoming Sessions</h4>
            <a class="detail" href="{{ route('upcoming_session1') }}"><i class="fa fa-arrow-right"
                                                                         aria-hidden="true"></i></a>
        </div>
        <div class="table table-responsive mb0">
            <table class="table table-session table__style mb0">
                <thead>
                <tr>
                    <th>Trainer</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Session</th>
                    <th>Time</th>
                    <th>Hourly Rates</th>
                    {{--                    <th>Admin Location Rates</th>--}}
                    <th class="text-center">Booking Status</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($dashboardStats['upcomingSessions']))

                    @foreach($dashboardStats['upcomingSessions'] as $upcomming)

                        @if(isset($upcomming->myTrainersNames[0]))
                            <tr>
                                <td>
                                    <div class="image__text">
                                        @if($upcomming->myTrainersNames[0]->profile_image)
                                            <img
                                                src="{{ asset('assets/trainer/images/trainer/'.$upcomming->myTrainersNames[0]->profile_image) }}"
                                                alt="">
                                        @else
                                            <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                                        @endif
                                        <span>{{$upcomming->myTrainersNames[0]->name}}</span>
                                    </div>
                                </td>

                                {{--                                {{dd($upcomming->myTrainersNames[0]->getaddress->getRatesForTrainer)}}--}}
                                {{--                                getRatesForTrainer--}}

{{--                                <td>{{$upcomming->myTrainersNames[0]->getAddress->address ?? ''}}--}}
{{--                                    {{$upcomming->myTrainersNames[0]->getAddress->postal_code ?? ''}}--}}
{{--                                    {{$upcomming->myTrainersNames[0]->getAddress->getCountry->nicename ?? '' }}</td>--}}

                                <td>
                                    @if(isset($upcomming->myTrainersNames[0]->getAddress))
                                        @if(isset($upcomming->myTrainersNames[0]->getAddress->getCountry))
                                            {{$upcomming->myTrainersNames[0]->getAddress->getCountry->name ?? ''}}
                                        @endif
                                    @endif
                                </td>
                                <td>{{date('j F, Y', strtotime($upcomming->date))}}</td>
                                <td>{{$upcomming->training_session ?? ''}}</td>
                                <td>{{$upcomming->start_time ?? '' }}</td>

                                @if(isset($upcomming->myTrainersNames[0]->getaddress))

                                    @if($upcomming->training_session == "1 on 1")
                                        <td>
                                            @if(isset($upcomming->myTrainersNames[0]->getaddress->getRatesForTrainer) &&
                                             isset($upcomming->myTrainersNames[0]->getaddress->getRatesForLocation->one_on_1_training_charge))

                                                <?php
                                                $feesOnoOnOne = $upcomming->myTrainersNames[0]->getaddress->getRatesForTrainer->one_on_1_training_charge
                                                    + $upcomming->myTrainersNames[0]->getaddress->getRatesForLocation->one_on_1_training_charge;
                                                ?>
                                                $ {{$feesOnoOnOne ?? ''}}

                                            @endif
                                        </td>
                                    @elseif($upcomming->training_session == "2 on 1")
                                        <td>
                                            @if(isset($upcomming->myTrainersNames[0]->getaddress->getRatesForTrainer))

                                                <?php
                                                $feesTwoOnOne = $upcomming->myTrainersNames[0]->getaddress->getRatesForTrainer->two_on_1_training_charge +
                                                    $upcomming->myTrainersNames[0]->getaddress->getRatesForLocation->two_on_1_training_charge
                                                ?>
                                                $ {{$feesTwoOnOne ?? ''}}
                                            @endif
                                        </td>
                                    @endif
                                @endif

                                <td class="text-center">
                                    @if($upcomming->status == 'pending')
                                        <span class="status__pending">Pending</span>
                                    @elseif($upcomming->status == 'confirmed')
                                        <span class="status__confirm">Confirmed</span>
                                    @elseif($upcomming->status == 'cancelled')
                                        <button class="btn btn-cancelled disabled">Cancelled</button>
                                    @elseif($upcomming->status == 'decline')
                                        <span class="btn btn-cancelled disabled">Declined</span>
                                    @endif
                                </td>
                            <!-- <td>
                        <a href="{{ route('appointment', [ '#appointmentTab2' ]) }}" class="btn btn-primary"><img
                                src="{{ asset('assets/trainee/images/icons/chatting.png') }}" alt="">Message</a>
                    </td> -->
                            </tr>
                        @endif
                    @endforeach


                @endif

                </tbody>
            </table>
        </div>
    </div>

    <div class="prev__session__panel panel__style mb-0">
        <div class="hed">
            <h4>Previous Sessions</h4>
            <a class="detail" href="{{ route('previous_session1') }}"><i class="fa fa-arrow-right"
                                                                         aria-hidden="true"></i></a>
        </div>
        <div class="table table-responsive mb0">
            <table class="table table-session table__style mb0">
                <thead>
                <tr>
                    <th>Trainer</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Session</th>
                    <th>Time</th>
                    <th>Hourly Rates</th>
                    {{--                    <th>Admin Location Rates</th>--}}
                    <th class="text-center">Booking Status</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($dashboardStats['previousSessions']))
                    @foreach($dashboardStats['previousSessions'] as $previous)
                        @if(isset($previous->myTrainersNames[0]))

                            {{--                            {{dd($previous->myTrainersNames[0]->getAddress)}}--}}

                            <tr>
                                <td>
                                    <div class="image__text">
                                        @if($previous->myTrainersNames[0]->profile_image ?? '' )
                                            <img
                                                src="{{ asset('assets/trainer/images/trainer/'.$previous->myTrainersNames[0]->profile_image) }}"
                                                alt="">
                                        @else
                                            <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                                        @endif
                                        <span>{{$previous->myTrainersNames[0]->name ?? '' }}</span>
                                    </div>
                                </td>
{{--                                <td>{{$previous->myTrainersNames[0]->getAddress->address ?? ''}}</td>--}}
                                <td>
                                    @if(isset($previous->myTrainersNames[0]->getAddress))
                                        @if(isset($previous->myTrainersNames[0]->getAddress->getCountry))
                                            {{$previous->myTrainersNames[0]->getAddress->getCountry->name ?? ''}}
                                        @endif
                                    @endif
                                </td>


                                <td>{{date('j F, Y', strtotime($previous->date))}}</td>
                                <td>{{$previous->training_session ?? ''}}</td>
                                <td>{{$previous->start_time ?? '' }}</td>


                                @if(isset($previous->myTrainersNames[0]->getaddress))

                                    @if($previous->training_session == "1 on 1")
                                        <td>
                                            @if(isset($previous->myTrainersNames[0]->getaddress->getRatesForTrainer) &&
                                             isset($previous->myTrainersNames[0]->getaddress->getRatesForLocation->one_on_1_training_charge))

                                                <?php
                                                $feesOnoOnOne = $previous->myTrainersNames[0]->getaddress->getRatesForTrainer->one_on_1_training_charge
                                                    + $previous->myTrainersNames[0]->getaddress->getRatesForLocation->one_on_1_training_charge;
                                                ?>
                                                $ {{$feesOnoOnOne ?? ''}}

                                            @endif
                                        </td>
                                    @elseif($previous->training_session == "2 on 1")
                                        <td>
                                            @if(isset($previous->myTrainersNames[0]->getaddress->getRatesForTrainer))

                                                <?php
                                                $feesTwoOnOne = $previous->myTrainersNames[0]->getaddress->getRatesForTrainer->two_on_1_training_charge +
                                                    $previous->myTrainersNames[0]->getaddress->getRatesForLocation->two_on_1_training_charge
                                                ?>
                                                $ {{$feesTwoOnOne ?? ''}}
                                            @endif
                                        </td>
                                    @endif
                                @endif

                                <td><b class="btn btn-primary">Completed</b></td>

                            </tr>
                        @endif
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>
    </div>

    @include('trainee.modals.cancel_request')
    @include('trainee.modals.trainer_rating')

@endsection

@push('scripts')
    <script type="text/javascript">

    </script>
@endpush
