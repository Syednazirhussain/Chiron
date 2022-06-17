@extends('trainee.layouts.app')
@section('title', 'Previous Sessions')


@section('content')

    <div class="prev__session__panel panel__style mb-0">
        <div class="hed">
            <h4>Previous Sessions</h4>
        </div>
        <div class="table table-responsive mb0">
            <table class="table table-session table__style mb0">
                <thead>
                <tr>
                    <th>Trainer</th>
                    <th>Location</th>
                    <th>Session</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Payment <br>
                        {{-- (Amt+salesTax+2.7% stripe + 0.3) --}}
                    </th>
                    {{--                    <th></th>--}}
                    <th>Rating</th>
                    <th class="text-center">Payment Slip</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($previousSesions) && count($previousSesions) >0 )
                    @foreach($previousSesions as $previousSesion)
                        <tr>
                            <td>
                                <div class="image__text">
                                    @if($previousSesion->myTrainersNames[0]->profile_image)
                                        <img src="{{ asset($storage.$previousSesion->myTrainersNames[0]->profile_image) }}">
                                    @else
                                        <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                                    @endif
                                    <span>{{ $previousSesion->myTrainersNames[0]->name ?? '' }}</span>
                                </div>
                            </td>
                            <td>
                                
                                @if(isset($previousSesion->trainingPreference ) && $previousSesion->trainingPreference == 'clientlocation' )
                            My Location 
                        
                        @elseif(isset($previousSesion->trainingPreference ) && $previousSesion->trainingPreference == 'myLocation')
                           Trainer Location 
                        @else
                        {{$previousSesion->location ?? ''}}
                        @endif
                            
                            </td>
                            <td>{{$previousSesion->training_session ?? ''}}</td>
                            <td>{{date('j F, Y', strtotime($previousSesion->date))}}</td>
                            <td>{{$previousSesion->start_time ?? ''}}</td>
                            <td>
                                @if(isset($previousSesion->userPayments))
                                    @if(isset($previousSesion->userPayments->amount) && isset($previousSesion->userPayments->adminFee)  )
                                        <?php
                                        $result = $previousSesion->userPayments->amount + $previousSesion->userPayments->adminFee
                                            + $previousSesion->userPayments->tax_amount + $previousSesion->userPayments->adminFeeTax;
                                        // $result = $result + $result * 2.7 / 100 + 0.3;
                                        

                                        $result_round = number_format((float)$result, 2, '.', '');
                                        ?>
                                        $ {{$result_round ?? '0'}}
                                    @endif
                                @endif
                            </td>

                            <td >
                                @if($previousSesion->Reviews == null)
                                    <button class="btn btn-primary-o" data-toggle="modal"
                                            data-target="#trainerRatingModal"
                                            data-session-id="{{$previousSesion->id}}"
                                            data-trainer-id="{{$previousSesion->myTrainersNames[0]->id ?? ''}}"
                                            data-trainer-name="{{$previousSesion->myTrainersNames[0]->name ?? ''}}"
                                            data-trainer-image="{{ asset('assets/trainer/images/trainer/'.$previousSesion->myTrainersNames[0]->profile_image)}}"
                                            id="RatingModal">
                                        <i class="far fa-star"></i> Rate
                                    </button>
                                @else
                                    <style>
                                        .fill {
                                            color: orange;
                                        }
                                    </style>
                                    <div class='rating-stars'>
                                        <ul id='stars'>
                                            @for($i=0;$i<5;$i++)
                                                <i class="fa fa-star @if($i < $previousSesion->Reviews->rating) fill @endif "></i>
                                            @endfor
                                        </ul>
                                    </div>

                                @endif
                            </td>
                            <td class="text-center">
                                @if(isset($previousSesion->userPayments))
                                    <a target="_blank" href="{{$previousSesion->userPayments->receipt_url ?? ''}}">
                                        View </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <tr > <td colspan="9" style="vertical-align : middle;text-align:center;"> No Record Found</td> </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    @include('trainee.modals.trainer_rating')
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).click('#RatingModal', function (event) {
            var session_id = $('#RatingModal').attr('data-session-id');
            var img = $('#RatingModal').attr('data-trainer-image');
            var trainer_name = $('#RatingModal').attr('data-trainer-name');
            var trainer_id = $('#RatingModal').attr('data-trainer-id');

            console.log(img);

            $("#trainer_name").html(trainer_name);
            $("#img").html(img);
            $("#session_id").val(session_id);
            $("#trainer_id").val(trainer_id);

        });
    </script>
@endpush
