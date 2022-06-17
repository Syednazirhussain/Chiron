@extends('trainer.layouts.app')
@section('title', ' My Trainees')

@section('content')
    <div class="trainees__panel panel__style">
        <form id="search" name="search" method="get" action="{{ route('traineeSearch') }}" class="form">
            <meta name="csrf-token" content="{{ csrf_token() }}"/>
            <h5>Filter</h5>
            <div class="form-group form__1">
                @if(isset($trainees['keyword']))
                    <input type="text" name="keyword" id="search_field" class="form-control"
                  
                        placeholder="Search By Trainees"
                           value="{{$trainees['keyword']}}">
                    <!-- <input type="text" class="form-control" placeholder="Search By Name & E-mail"> -->
                @else
                    <input type="text" name="keyword" class="form-control" placeholder="Search By Trainees">
                @endif
            </div>
            {{--
            <div class="form-group form__2">
                <div class="input-group">
                    <label for="">Training Session</label>
                    <div class="custom-control custom-radio">
                        @if(isset($trainees['trainingSession']))
                            @if($trainees['trainingSession'] == '1 on 1')
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
                    <!-- <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" checked> -->
                        <label for="customRadio1" class="custom-control-label">1 on 1</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <!-- <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio"> -->
                        @if(isset($trainees['trainingSession']))
                            @if($trainees['trainingSession'] == '2 on 1')
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
            --}}
            <div class="form-group form__act">
                <button class="btn btn-primary" type="submit">Apply</button>
            </div>
            <div class="form-group form__act mr-2">
                @if(request()->has('keyword') )
                <a href="{{ route('my_trainees') }}" class="btn btn-danger clear_btn">Clear</a>
                @endif
            </div>
        </form>
    </div>

    <div class="trainnes__wrapper">
        <div class="row">
{{--            {{dd($trainees)}}--}}
            @if(! $trainees['data']->isEmpty())

                @foreach($trainees['data'] as $row)
{{--                    {{dd($row->trainee_id)}}--}}
                    <div class="trainees__box col-sm-3">
                        <div class="trainees__box__inr">
                            @if($row->profile_image)
                                <img src="{{ asset($storage.$row->profile_image) }}" alt="">
                            @else
                                <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                            @endif
                            <h4>{{$row->name ?? ''}}</h4>
                            <p>{{$row->email ?? ''}}</p>
                            {{--
                            <div class="type">
                                @if(isset($row->training_session))
                                    {{ $row->training_session ?? '' }}
                                @endif
                            </div>
                            --}}

                            <div class="action">
                                <button onclick="chatboxMsg({{$row->trainee_id}})" class="btn btn-primary-o">Message <i class="fa fa-bell"> {{ $row->messages()->where('seen','0')->count() }}</i>
                                </button>
                            </div>

                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center trainer-not-found d-flex align-items-center justify-content-center text-muted"><i class="fa fa-desktop"></i> &nbsp; No Active Trainee Yet</div>
            @endif
        </div>

    </div>
    </div>
    </div>


    {{--    @include('trainer.common.chatbox')--}}

    {{--@include('trainer.traineechat')--}}

    <div class="card direct-chat fixed-chatbox" style="display:none;">

    </div>
@endsection

@push('scripts')
    {{--    <script type="text/javascript">--}}
    {{--        function chatbox() {--}}
    {{--            $(".direct-chat").css('display', 'flex');--}}
    {{--        }--}}
    {{--    </script>--}}
    <script type="text/javascript">
        function chatboxMsg(id) {
            // $(".appointment__box__wrapper").addClass('hidden');
            // $(".message__box__wrapper").removeClass('hidden');

            // e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ route('traineemsg') }}",
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                },
                success: function (result) {
                    console.log(result);
                    $(".fixed-chatbox").empty();
                    $(".fixed-chatbox").append(result);
                    $(".direct-chat").css('display', 'flex');
                    $(".appointment__box__wrapper").addClass('hidden');
                    $(".message__box__wrapper").removeClass('hidden');

                }
            });
        }

    </script>
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
@endpush
