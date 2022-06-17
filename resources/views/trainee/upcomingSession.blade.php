@extends('trainee.layouts.app')
@section('title', 'Trainee Upcoming Sessions')
@section('content')
    <div class="session__panel panel__style">
        <div class="hed">
            <h4>Upcoming Sessions</h4>
        </div>
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            </div>
        @endif

        <div class="table table-responsive mb0">
            <table class="table table-session table__style mb0">
                <thead>
                <tr>
                    <th>Trainer</th>
                    <th>Location</th>
                    <th>Session</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Fee</th>
                    <th class="text-center">Booking Status</th>
                    <th class=""></th>
                    <th class="text-center">Action</th>
                    <th>Message</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($upcommingSesions) && count($upcommingSesions)>0)
                    @foreach($upcommingSesions as $row)
                        @if(isset($row->myTrainersNames[0]))
                            @php
                                $date_time = $row->date." ".$row->start_time;
                                $carbon_date_time = \Carbon\Carbon::createFromFormat("Y-m-d H:i A", $date_time, "asia/karachi");
                            @endphp
                            <tr>
                                <td>
                                    <div class="image__text">
                                        @if($row->myTrainersNames[0]->profile_image)
                                            {{-- <img src="{{ asset('assets/trainer/images/trainer/'.$row->myTrainersNames[0]->profile_image) }}"> --}}
                                            <img src="{{ asset($storage.$row->myTrainersNames[0]->profile_image) }}">
                                        @else
                                            <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                                        @endif
                                        <span>{{ $row->myTrainersNames[0]->name }}</span>
                                    </div>
                                </td>
                                <td>
                                    @if(isset($row->trainingPreference ) && $row->trainingPreference == 'clientlocation' )
                                    My Location 
                                
                                @elseif(isset($row->trainingPreference ) && $row->trainingPreference == 'myLocation')
                                   Trainer Location 
                                @else
                                {{$row->location ?? ''}}
                                @endif
                                <td>{{ $row->training_session ?? '' }}</td>
                                <td> {{ date('j F, Y', strtotime($row->date)) }}</td>
                                <td>{{ $row->start_time ?? '' }}</td>
                                <td>${{ $row->payable_amount ?? '' }}</td>
                                @php
                                    $today = Carbon\Carbon::now();
                                    $current_date = explode(' ', $today);
                                    $current_date = $current_date[0];
                                    $fulldate = explode(' ', $row->date);
                                    $date = $fulldate[0];
                                    $session_is_today = true;
                                    if ($date == $current_date) {
                                        $session_is_today = true;
                                    } else {
                                        $session_is_today = false;
                                    }
                                @endphp
                                @if($row->status == 'confirmed')
                                    <td class="text-center"><span class="status__confirm">Confirmed</span></td>
                                    @if( $session_is_today == false )
                                        <td class="text-center">
                                            <img src="{{ asset('assets/trainee/images/icons/timer.png') }}" alt="">
                                            <span class="align-middle">
                                                {{ $carbon_date_time ? $carbon_date_time->diffForHumans() : '' }}
                                                {{-- $carbon_date_time ? $carbon_date_time->format('F d, Y H:i A') : '' --}}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-danger cancel_appointment" data-url="{{ route('appointment_cancel', [$row->id]) }}" data-object="{{ json_encode($row->toArray()) }}" data-toggle="modal" data-target="#cancelModal">
                                                Cancel & Refund
                                            </button>
                                        </td>
                                    @else
                                    <td class="text-center">
                                    </td>
                                    <td>
                                    </td>
                                    @endif
                                @elseif($row->status == 'cancelled')
                                    <td class="text-center">
                                        @if($row->payment_status == 'Refund')
                                            <span class="status__decline">Cancelled/Refunded</span>
                                        @else
                                            <span class="status__decline">Cancelled</span>
                                        @endif
                                    </td>
                                    <td class="text-center"></td>
                                    <td></td>
                                @elseif($row->status == 'rescheduled')
                                    <td class="text-center">
                                        <span class="status__confirm">Rescheduled</span>
                                    </td>
                                    <td class="text-center">
                                        <img src="{{ asset('assets/trainee/images/icons/timer.png') }}" alt="">
                                        <span class="align-middle">
                                            {{ $carbon_date_time ? $carbon_date_time->diffForHumans() : '' }}
                                            {{-- $carbon_date_time ? $carbon_date_time->format('F d, Y H:i A') : '' --}}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger cancel_appointment" data-url="{{ route('appointment_cancel', [$row->id]) }}" data-object="{{ json_encode($row->toArray()) }}" data-toggle="modal" data-target="#cancelModal">
                                            Cancel & Refund
                                        </button>
                                    </td>
                                @elseif($row->status == 'decline')
                                    <td></td>
                                    <td></td>
                                    <td class="text-center">
                                        <button class="btn btn-cancelled disabled">Declined</button>
                                    </td>
                                @elseif($row->status == 'pending')
                                    <td class="text-center">
                                        <span class="status__pending">Pending</span>
                                    </td>
                                    <td class="text-right">
                                            @php
                                                $date_time = $row->date." ".$row->start_time;
                                                $carbon_date_time = \Carbon\Carbon::createFromFormat("Y-m-d H:i A", $date_time, "asia/karachi");
                                            @endphp
                                        <img src="{{ asset('assets/trainee/images/icons/timer.png') }}" alt="">
                                        <span class="align-middle">
                                            {{ isset($carbon_date_time) ? $carbon_date_time->diffForHumans() : '' }}
                                            {{-- isset($carbon_date_time) ? $carbon_date_time->format('F d, Y H:i A') : '' --}}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger cancel_appointment" data-url="{{ route('appointment_cancel', [$row->id]) }}" data-object="{{ json_encode($row->toArray()) }}" data-toggle="modal" data-target="#cancelModal">
                                            Cancel
                                        </button>
                                    </td>
                                @endif
                                <td>
                                    <a href="{{ route('appointment', $row->myTrainersNames[0]->id ?? ''  ) }}?#appointmentTab2" class="btn btn-primary"><img src="{{ asset('assets/trainee/images/icons/chatting.png') }}" alt="">Message</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @else
                    <tr > <td colspan="9" style="vertical-align : middle;text-align:center;"> No Record Found </td> </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    @include('trainee.modals.cancel_request')
    @include('trainee.modals.cancel_appointment')
@endsection

@push('scripts')
    <script type="text/javascript">

    </script>
@endpush
