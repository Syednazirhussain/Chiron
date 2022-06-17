@extends('trainee.layouts.app')
@section('content')

@section('title', 'Trainers')

    {{--    <meta name="csrf-token" content="{{ csrf_token() }}"/>--}}
    <div class="trainer__panel panel__style">
        <form id="search" name="search" method="get" action="{{ route('trainerSearch') }}" class="form">
            <meta name="csrf-token" content="{{ csrf_token() }}"/>
            <h5>Filter</h5>
            <div class="form-group form__1">
                @if(isset($trainers['keyword']))
                    <input type="text" name="keyword" id="search_field" class="form-control search_field"
                            placeholder="Search By Name & E-mail"
                           value="{{$trainers['keyword']}}">
                @else
                    <input type="text" name="keyword" class="form-control" placeholder="Search By Name & E-mail">
                @endif
            </div>
            <div class="form-group form__2">
                <div class="input-group">
                    <label for="">Training Session</label>
                    <div class="custom-control custom-radio">
                        @if(isset($trainers['trainingSession']))
                            @if($trainers['trainingSession'] == '1 on 1')
                                <input class="custom-control-input" type="radio" id="customRadio1"
                                       name="trainingSession" value="1 on 1" checked>
                            @else
                                <input class="custom-control-input" type="radio" id="customRadio1"
                                       name="trainingSession" value="1 on 1">
                            @endif
                        @else
                            <input class="custom-control-input" type="radio" id="customRadio1" name="trainingSession"
                                   value="1 on 1">
                        @endif
                        <label for="customRadio1" class="custom-control-label">1 on 1</label>
                    </div>
                    <div class="custom-control custom-radio">
                        @if(isset($trainers['trainingSession']))
                            @if($trainers['trainingSession'] == '2 on 1')
                                <input class="custom-control-input" type="radio" id="customRadio2"
                                       name="trainingSession" value="2 on 1" checked>
                            @else
                                <input class="custom-control-input" type="radio" id="customRadio2"
                                       name="trainingSession" value="2 on 1">
                            @endif
                        @else
                            <input class="custom-control-input" type="radio" id="customRadio2" name="trainingSession"
                                   value="2 on 1">
                        @endif
                        <label for="customRadio2" class="custom-control-label">2 on 1</label>
                    </div>
                </div>
            </div>
            <div class="form-group form__act">
                <button class="btn btn-primary" type="submit">Apply</button>
            </div>
            <div class="form-group form__act mr-2">
                @if(request()->has('keyword') )
                <a href="{{ route('trainer') }}" class="btn btn-danger clear_btn ">Clear</a>
                @endif
                {{-- <a href="{{ route('trainer') }}" class="btn btn-danger clear_btn ">Clear</a> --}}
            </div>
        </form>
    </div>

    <script>
        // $(".clear_btn").hide();
        $("#search_field").keyup(function () {

            if ($(this).val() == "") {
                $(".clear_btn").hide();
            } else {
                $(".clear_btn").show();
            }
        });


    </script>



    @if($errors->any())
        <h4 style="color: red;">{{$errors->first()}}</h4>
    @endif
    <div class="trainnes__wrapper">
        <div class="row">

            @forelse($trainers['data'] as $trainer)
                <div class="trainer__box col-sm-3">
                    <div class="trainer__box__inr">
                        <a href="{{ route('trainer_profile',['id'=>$trainer->id]) }}">
                            @if($trainer->profile_image)
                                <img src="{{ asset($storage.$trainer->profile_image) }}">
                            @else
                                <img src="{{ asset('assets/trainee/images/default-user.png') }}">
                            @endif
                        </a>
                        <a href="{{ route('trainer_profile', ['id' => $trainer->id]) }}">
                            <h4>{{$trainer->name ?? ''}}</h4>
                        </a>
                        <p>{{$trainer->email ?? '' }}</p>
                        @if(isset($trainer->trainerTrainingSessionCount))
                            <p>
                                @if($trainer->trainerTrainingSessionCount->count())
                                <img class="icon mr-1" src="{{ asset('assets/trainee/images/icons/verified.png') }}"
                                     alt="">{{$trainer->trainerTrainingSessionCount->count() ?? ''}} Verified
                                Sessions
                                @else
                                No Verified Sessions
                                @endif
                            </p>
                        @endif

                        @if(isset($trainer->getAddress) && isset($trainer->getAddress->training_session))
                            @php  $plans = explode(',', $trainer->getAddress->training_session); @endphp
                            @foreach($plans as $plan)
                                <div class="type">
                                    {{ $plan }}
                                </div>
                            @endforeach
                        @else
                            <div class="type"></div>
                        @endif
                        <div class="action">
                            <!-- <button  data-toggle="modal" data-target="#staticBackdrop" class="btn btn-primary">Get Appointment</button>
                                <button onclick="chatbox({{$trainer}})" class="btn btn-primary">Old Get Appointment
                                </button>
                                <br> -->
                            <a class="btn btn-primary" href="{{route('appointment',$trainer->id ?? '')}}"> Get
                                Appointment
                            </a>
                            <a href="{{ route('appointment', [ $trainer->id,'#appointmentTab2' ]) }}" class="btn btn-primary-o mt-2">Message
                            
                                <i class="fa fa-bell">{{ $trainer->messages()->where('seen',0)->count() }}</i></a>

                        </div>
                    </div>
                </div>
            @empty
                @if(request()->has('keyword') || request()->has('trainingSession'))
                    <div class="col px-md-5">
                        <div class="alert trainer-not-found d-flex align-items-center justify-content-center text-muted"> <i class="fa fa-desktop"></i> &nbsp; Trainer not found in search</div>
                    </div>
                @else
                    <div class="col px-md-5">
                        <div class="alert trainer-not-found d-flex align-items-center justify-content-center text-muted" bis_skin_checked="1"> 
                            <i class="fa fa-desktop"></i> &nbsp; Trainer not found in search
                        </div>
                    </div>
                @endif
            @endforelse

        </div>
    </div>

    @include('trainee.common.Appointmentmodal')

    <div class="card direct-chat fixed-chatbox" style="display:none;">

        {{-- commnet this --}}
        @include('trainee.common.chatbox')
        {{----}}

    </div>
@endsection

@push('scripts')
    <script type="text/javascript">

        function chatboxMsg(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ route('trainermsg') }}",
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                },
                success: function (result) {
                    console.log(result);
                    $(".fixed-chatbox .message__box__wrapper").remove();
                    $(".fixed-chatbox").append(result);
                    $(".direct-chat").css('display', 'flex');
                    $(".appointment__box__wrapper").addClass('hidden');
                    $(".message__box__wrapper").removeClass('hidden');
                }
            });
        }

        function chatbox(val) {
            console.log(val.get_address.get_rates_for_trainer.one_on_1_training_charge);
            $(".direct-chat").css('display', 'flex');

            var one_on_one_trainer_admin = val.get_address.get_rates_for_trainer.one_on_1_training_charge + val.get_address.get_rates_for_location.one_on_1_training_charge;
            var two_on_onr_trainer_admin = val.get_address.get_rates_for_trainer.two_on_1_training_charge + val.get_address.get_rates_for_location.two_on_1_training_charge;

            console.log(val);
            $(".message__box__wrapper").addClass('hidden');
            $(".appointment__box__wrapper").removeClass('hidden');
            $("#name00").text(val.name);
            $("#trainerId").val(val.id);
            $('#trainingSession').text(val.get_address.training_session);
            // $('#trainerLocation').val(val.get_address.country_id);
            $('#trainingPreference').val(val.get_address.training_session);
            $("#trainerProfile").text(val.profile_image);
            $('#one_on_one_rates').text(one_on_one_trainer_admin);
            $('#two_on_one_rates').text(two_on_onr_trainer_admin);
            $('#trainerLocation').text(val.get_address.address);

            let formData = new FormData();
            formData.append('trainer_id', val.id);
            const d = new Date();
            let day = d.getDay();
            let now1 = new Date();
            formData.append('selectedDay', day);
            formData.append('selectedDate', formatDate(now1));
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }


    </script>
@endpush
