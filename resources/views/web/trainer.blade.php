@extends('web.layouts.app')
@section('content')

<section class="trainers">
    <div class="container">
        <div class="row">
            <div class="trainers__sidebar col-md-12 col-lg-4">
                <h3>Refine Your Search</h3>

                <form id="search" name="search" method="get" action="{{ route('search_trainers') }}" class="form">
                    <meta name="csrf-token" content="{{ csrf_token() }}"/>
                    <h5>Filter</h5>
                    <div class="form-group form__1">
                        @if(isset($trainers['keyword']))
                        <input type="text" name="keyword" class="form-control"
                        placeholder="Search trainers in your area"
                        value="{{$trainers['keyword']}}">
                        @else
                        <input type="text" name="keyword" class="form-control"
                        placeholder="Search trainers in your area">
                        @endif
                    </div>

                    <div class="form-group form__act">
                        <button class="btn btn-primary" type="submit">Apply</button>
                    </div>




                <div class="form-group col-md-6">
                    <h5>Rating</h5>
                    <select name="rating" id="rating">
                        <option class="form-select-input"  value="ASC" disabled style="color:darkgray;">Select Rating</option>
                        <option class="form-select-input" value="ASC" >Low </option>
                        <option class="form-select-input" value="DESC" >Top</option>


                      </select>
                </div>
                <div class="checkboxing mt-4">
                    <h5>Training Session</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="training_type"  value="1 on 1" id="trainingRadio1"
                    >
                        <label class="form-check-label" for="trainingRadio1">Personal</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="training_type" value="2 on 1" id="trainingRadio2">
                        <label class="form-check-label" for="trainingRadio2">Group</label>
                    </div>
                </form>



                </div>
            </div>
            <div class="trainers__list col-md-12 col-lg-8">
                <div class="hed">
                    <h2>Find A<span class="highlight"> Trainer</span></h2>
                    <p>Look through the list of trainers to locate the one that's right for you!</p>
                </div>
                <div class="search__result">
                    <h3>Search Result</h3>
                </div>
                <div class="listing__wrapper">
                    @forelse($results as $row)
                    <div class="list__box row mb-5">
                        <div class="list__img col-md-3">
                            @if($row->profile_image)
                                <img src="{{ asset($storage.$row->profile_image) }}" alt="">
                            @else
                                <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                            @endif
                        </div>
                        <div class="list__cont col-md-9">
                            <div class="basic__info row">
                                <div class="col">

                                  <a href="<?php echo  URL::to('/trainee/trainers-profile/'.$row->id); ?>">  <h4>{{$row->name ?? ''}}</h4> </a>
                                </div>
                                <div class="col-auto justify-content-end text-md-center">
                                    <span class="starrating-area star-{{$row->rating ?? ''}}">
                                        @for($i=0;$i<5;$i++)
                                        <i class="fa fa-star @if($i<$row->rating) fill @endif "></i>
                                        @endfor
                                    </span>
                                    @php
                                    $sessions =  explode(',',$row->getAddress->training_session);
                                    @endphp
                                    @if(in_array('1 on 1',$sessions))
                                    <span class="price mx-4">1 on 1 : <strong>{{ get_price_by_location($row,'one_on_1_training_charge',true,true) }}</strong> /hr</span>
                                    @endif

                                    @if(in_array('2 on 1',$sessions))
                                    <span class="price2">2 on 1 :
                                        <strong>{{ get_price_by_location($row,'two_on_1_training_charge',true,true) }}</strong> /hr
                                    </span>
                                    @endif
                                    <br/>
                                    <span class="last"> Plus Applicable {{config('constants.rates.sales_tax') }}% Sales Tax </span>
                                </div>
                            </div>
                            <div class="tags">
                                <?php if($row->specialties){ $data = json_decode($row->specialties, true); if(count($data) > 0){ ?>
                                    <ul class="list-group list-group-horizontal">
                                        @foreach($data as $key=> $specialtie)

                                            <li>{{$specialtie ?? ''}}</li>
                                        @endforeach
                                        <li>See More</li>
                                    </ul>

                                    <?php } }?>
                                </div>
                                <p>{{$row->about ?? ''}}</p>

                                <div class="row actions align-items-center">
                                    <div class="col">
                                        <h4>
                                            <img src="{{ asset('assets/web/images/trainer/badge.png') }}" alt="badge">
                                            <span class="badge__exp">{{$row->experience ?? ''}}</span> Years of Experience
                                        </h4>
                                        </div>
                                        <div class="col-auto justify-content-end">
                                            <a href="{{ route('showtraineeSignup') }}" class="btn btn-primary-o mt-2">Message
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            Not found
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="card direct-chat fixed-chatbox" style="display:none;">

            {{-- commnet this --}}
            {{-- @include('trainee.common.chatbox') --}}
            {{----}}

        </div>
        @endsection

        <script type="text/javascript">
              function handleClick(val){
                  alert(val);
              }

              $('#check').change(function(){
                var data= $(this).val();
                  alert(data);
                });

            function chatboxMsg(id)
            {
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
                $(".direct-chat").css('display', 'flex');
                // if (val === "message") {
                    //     $(".appointment__box__wrapper").addClass('hidden');
                    //     $(".message__box__wrapper").removeClass('hidden');
                    // } else {
                        $(".message__box__wrapper").addClass('hidden');
                        $(".appointment__box__wrapper").removeClass('hidden');
                        $("#name00").text(val.name);
                        $("#trainerId").val(val.id);
                        $('#trainingSession').text(val.get_address.training_session)
                        $('#trainerLocation').val(val.get_address.address + ', ' + val.get_address.postal_code)
                        $('#trainingPreference').val(val.get_address.training_session)
                        $("#trainerProfile").text(val.profile_image)

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
                        $.ajax({
                            url: '{{ route('getTrainerSessionTimings') }}',
                            data: formData,
                            processData: false,
                            contentType: false,
                            type: 'POST',
                            success: function (response) {
                                $('#start').empty()
                                $('#start').append($('<option>',
                                    {
                                        value: '',
                                        text: 'Select Time Slot'
                                    }));
                                    if (response.length > 0) {
                                        for (i = 0; i < response.length; i++) {
                                            $('#start').append($('<option>',
                                                {
                                                    value: response[i],
                                                    text: response[i]
                                                }));
                                            }
                                        } else {
                                            $('#start').empty()
                                            $('#start').append($('<option>',
                                                {
                                                    value: '',
                                                    text: 'No Slots Available'
                                                }));
                                            }
                                        }
                                    })

                                }
                            </script>
