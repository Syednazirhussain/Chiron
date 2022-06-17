<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@extends('trainer.layouts.app')
@section('title', 'Trainer Previous Sessions')

@section('content')

@include('trainer.common.previous',compact('previousSessions'))

@if(0)
    <div class="prev__session__panel panel__style">
        <div class="hed">
            <h4>Previous Sessions</h4>
        </div>
        <div class="table table-responsive mb0">
            <table class="table table-session table__style mb0">
                <thead>
                <tr>
                    <th>Trainee</th>
                    <th>Location</th>
                    <th>Session</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Payment</th>
                    <th class="w230">Type of session</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($previousSessions) && count($previousSessions)>0 )
                    @foreach($previousSessions as $previousSession)

                        <tr>
                            <td>
                                @if(isset($previousSession->myTraineesNames[0]))
                                    <div class="image__text">
                                        @if(isset($previousSession->myTraineesNames[0]->profile_image))
                                            <img src="{{ asset($storage.$previousSession->myTraineesNames[0]->profile_image) }}">
                                        @else
                                            <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                                        @endif
                                        <!-- <img src="{{ asset('assets/trainer/images/trainee/img4.png') }}" alt=""> -->
                                        <span>{{$previousSession->myTraineesNames[0]->name ?? ''}}</span>
                                    </div>
                                @endif
                            </td>
                            <td> {{ $previousSession->location ?? '' }}</td>
                            <td>{{$previousSession->training_session ?? '' }}</td>
                            <td>{{date('j F, Y', strtotime($previousSession->date))}}</td>
                            <td>{{$previousSession->start_time ?? ''}}</td>
                            @if(isset($previousSession->userPayments))
                                @if(isset($previousSession->userPayments->total_amount))
                                    @php
                                        $trainerFees = $previousSession->userPayments->amount;
                                        $trainerFeesWithTax = $previousSession->userPayments->amount + $previousSession->userPayments->tax_amount;
                                        $amountWithTax = $trainerFeesWithTax - $previousSession->userPayments->stripe_charges;
                                    @endphp
                                @endif
                            @endif
                            <td>
                                @if(isset($amountWithTax))
                                    {{ $amountWithTax ?? '' }}
                                @endif
                            </td>
                            <td>{{ $previousSession->training_session ?? '' }}</td>
                        </tr>
                    @endforeach
                    @else
                    <tr > <td colspan="7" style="vertical-align : middle;text-align:center;"> No Record Found </td> </tr>
                 @endif
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection

<script>  </script>
