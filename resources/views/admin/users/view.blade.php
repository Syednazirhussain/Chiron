@extends('admin.layouts.app')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.4/css/lightgallery.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.4/css/lg-zoom.css" />
<div class="profile__main__wrapper panel__style">
    <div class="tabs__navigation row justify-content-between">
        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home"
                    role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Trainer Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile"
                    role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Sessions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill"
                    href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages"
                    aria-selected="false">Messages</a>
            </li>
        </ul>
        @if ($user->status == 'pending' && $user->approved == 0)
        <div class="actions">
            <a href="javascript(void)" data-toggle="modal" data-target="#declineTrainerProfileModal" id="declined"
                data-trainer_id="{{ $user->id }}" data-name="{{ $user->name }}"
                class="btn btn-danger-o mr-2">Decline</a>
            <a href="javascript(void)" data-toggle="modal" data-target="#approveTrainerProfileModal" id="approved"
                data-trainer_id="{{ $user->id }}" data-name="{{ $user->name }}" class="btn btn-success-o">Approve</a>
        </div>
        @endif
    </div>

    <div class="card-body main__content__body">
        <div class="tab-content" id="custom-tabs-two-tabContent1">
            <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel"
                aria-labelledby="custom-tabs-two-home-tab">
                <div class="trainer__profile__panel">
                    <div class="cover-photo">
                        @if ($user->cover_image)
                        <img class="file-upload-coverphoto" src="{{ asset($storage . $user->cover_image) }}"
                            alt="Cover Photo">
                        @else
                        <img class="file-upload-coverphoto" src="{{ asset('assets/trainer/images/profile/cover.png') }}"
                            alt="Cover Photo">
                        @endif
                    </div>
                    <div class="trainer__desc__wrapper row">
                        <div class="trainer__info col-md-3">
                            <div class="profile-pic">
                                @if ($user->profile_image)
                                <img src="{{ asset($storage . $user->profile_image) }}" alt="">
                                @else
                                <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                                @endif
                            </div>
                            <h3>{{ $user->name ?? '' }}</h3>
                            <h4>{{ $user->email ?? '' }}</h4>
                            <p>Joined on {{ date('j F, Y', strtotime($user->created_at)) }}</p>
                            <h5><img class="mr-1" src="{{ asset('assets/trainee/images/icons/verified.png') }}" alt="">
                                @if (isset($user->trainerTrainingSessionCount))
                                {{ $user->trainerTrainingSessionCount->count() ?? '' }}
                                @else
                                0
                                @endif
                                Verified Sessions
                            </h5>
                            @if (isset($user->getAddress->training_session))
                            <div class="session__type">
                                <ul>
                                    <?php $sess = explode(',', $user->getAddress->training_session); ?>
                                    @if (count($sess) > 0)
                                    @foreach ($sess as $row)
                                    <li>
                                        {{ $row }}
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                            @endif
                            @if (isset($user->getProfile))
                            <div class="social__link">
                                <ul>
                                    <li><a target="__blank" href="{{ $user->getProfile->insta ?? '' }}"><i
                                                class="fab fa-instagram"></i></a></li>
                                    <li><a target="__blank" href="{{ $user->getProfile->twitter ?? '' }}"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li><a target="__blank" href="{{ $user->getProfile->facebook ?? '' }}"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="trainer__details col-md-6">
                            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="trainer-profile-tab1-tab" data-toggle="pill"
                                        href="#trainer-profile-tab1" role="tab" aria-controls="trainer-profile-tab1"
                                        aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="trainer-profile-tab2-tab" data-toggle="pill"
                                        href="#trainer-profile-tab2" role="tab" aria-controls="trainer-profile-tab2"
                                        aria-selected="false">Trainer Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="trainer-profile-tab3-tab" data-toggle="pill"
                                        href="#trainer-profile-tab3" role="tab" aria-controls="trainer-profile-tab3"
                                        aria-selected="false">Photos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="trainer-profile-tab4-tab" data-toggle="pill"
                                        href="#trainer-profile-tab4" role="tab" aria-controls="trainer-profile-tab4"
                                        aria-selected="false">Reviews</a>
                                </li>
                            </ul>

                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-two-tabContent">
                                    <div class="tab-pane fade show active" id="trainer-profile-tab1" role="tabpanel"
                                        aria-labelledby="trainer-profile-tab1-tab">
                                        <div class="tab__about">
                                            @if (isset($user->getProfile->about))
                                            <p>
                                                {{ $user->getProfile->about ?? '' }}
                                            </p>
                                            @endif
                                            @if (isset($user->getProfile->specialties))
                                            <div class="training__specialties">
                                                <h4>Training Specialties</h4>
                                                <?php $spic = json_decode($user->getProfile->specialties); ?>
                                                <ul>
                                                    @if (isset($spic))
                                                    @foreach ($spic as $row)
                                                    <li>{{ $row ?? '' }}</li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                            @endif
                                            <h4>Documents</h4>
                                            <div class="training__doc row" id="gallery-container">
                                                @foreach ($documents as $key => $doc)
                                                @if($doc->source_type == 'document')
                                                <a data-lg-size="1400-1400" class="gallery-item doc-link col-xl-6"
                                                    data-iframe="true" data-src="{{ asset($storage.$doc->source) }}">
                                                    <iframe class="d-none" src="{{ asset($storage.$doc->source) }}"
                                                        frameborder="0"></iframe>
                                                    <div class="docbox__cont">
                                                        <img
                                                            src="{{asset('assets/trainer/images/icons/'.file_extension($doc->source).'.png')}}">
                                                        <span class="text">{{ $doc->document_type }}</span>
                                                        <button class="btn btn-default" type="button">view</button>
                                                    </div>
                                                </a>
                                                @elseif($doc->source_type == 'image')
                                                <a data-lg-size="1400-1400" class="gallery-item col-xl-6"
                                                    data-src="{{ imagePath($storage, $doc->source) }}">
                                                    <img class="img-fluid gi-img d-none"
                                                        src="{{ imagePath($storage, $doc->source) }}"
                                                        alt="{{ $doc->source_type }}">
                                                    <div class="docbox__cont">
                                                        <img
                                                            src="{{asset('assets/trainer/images/icons/'.file_extension($doc->source).'.png')}}">
                                                        <span class="text">{{ $doc->document_type }}</span>
                                                        <button class="btn btn-default" type="button">view</button>

                                                    </div>
                                                </a>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="trainer-profile-tab2" role="tabpanel"
                                        aria-labelledby="trainer-profile-tab2-tab">

                                        <div class="tab__Info">
                                            <table class="table">
                                                @if (isset($user->getAddress))
                                                <tbody>
                                                    @if (isset($user->getAddress->getCountry))
                                                    <tr>
                                                        <td>Country</td>
                                                        <td>{{ $user->getAddress->getCountry->name }}</td>
                                                    </tr>
                                                    @endif
                                                    <tr>
                                                        <td>Postal Code</td>
                                                        <td>{{ $user->getAddress->postal_code }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>My Location</td>
                                                        <td>{{ $user->getAddress->address }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date of Birth</td>
                                                        <td>{{ date('j F, Y', strtotime($user->dob)) }}</td>
                                                    </tr>

                                                </tbody>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="trainer-profile-tab3" role="tabpanel"
                                        aria-labelledby="trainer-profile-tab3-tab">
                                        @if ($user->getImages->isEmpty())
                                        <div class="photo__gallery">
                                            <p>No photos are found.</p>
                                        </div>
                                        @else
                                        <div class="photo__gallery">
                                            <ul>
                                                @if (isset($user->getImages))
                                                @foreach ($user->getImages as $row)
                                                @if ($row->source_type == 'image')
                                                <li>
                                                    <img src="{{ imagePath($storage, $row->source) }}">
                                                </li>
                                                @endif
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="tab-pane fade" id="trainer-profile-tab4" role="tabpanel"
                                        aria-labelledby="trainer-profile-tab4-tab">
                                        <div class="tab__reviews">
                                            @forelse($reviews as $row)
                                            @if ($row->status == 'approved')
                                            <div class="card card-widget widget-user-2">
                                                <div class="widget-user-header">
                                                    <div class="widget-user-image">
                                                        @if (isset($row->traineeNames[0]->profile_image))
                                                        <img class="img-circle elevation-2"
                                                            src="{{ asset($storage . $row->traineeNames[0]->profile_image) }}"
                                                            alt="User Avatar">
                                                        @else
                                                        <img class="img-circle elevation-2"
                                                            src="{{ asset('assets/trainee/images/default-user.png') }}"
                                                            alt="User Avatar">
                                                        @endif
                                                    </div>
                                                    <h3 class="widget-user-username">
                                                        {{ $row->traineeNames[0]->name }}
                                                        <span class="date">
                                                            {{ date('j F, Y', strtotime($row->created_at)) }}
                                                        </span>
                                                    </h3>
                                                    <span class="starrating-area star-{{ $row->rating }}">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </span>
                                                    <h5 class="widget-user-desc">{{ $row->comments }}</h5>
                                                </div>
                                            </div>
                                            @endif

                                            @empty
                                            <p>No reviews are found.</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="detail__inner col-md-3">
                            <h5><strong>Hourly Rate</strong> <br /> (Bases on your location)</h5>
                            <ul>
                                @if (isset($rates->one_on_1_training_charge))
                                <li>1 - on - 1 Sessions :

                                    ${{ $rates->one_on_1_training_charge }} /hr
                                </li>
                                @else
                                <li>1 - on - 1 Sessions : $0/hr</li>
                                @endif
                                @if (isset($rates->two_on_1_training_charge))
                                <li>2 - on - 1 Sessions :

                                    ${{ $rates->two_on_1_training_charge }} /hr
                                </li>
                                @else
                                <li>2 - on - 1 Sessions : $0/hr</li>
                                @endif
                                <li class="last">Applicable 13% Sales Tax</li>
                            </ul>
                            <!-- form -->
                            <form id="Preferences">
                                <h5>Training Preferences</h5>
                                @if (isset($user->getAddress))
                                    @if ($user->getAddress->training_session == '1 on 1')
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="training_session1" value="1 on 1"
                                            name="training_session1" checked> <label for="radioPrimary1">1 on
                                            1</label>
                                        <input type="checkbox" id="training_session2" value="2 on 1"
                                            name="training_session2">
                                        <label for="radioPrimary2">2 on 1</label>
                                    </div>
                                    @endif
                                    @if ($user->getAddress->training_session == '2 on 1')
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="training_session1" value="1 on 1" name="training_session1">
                                        <label for="radioPrimary1">1 on 1</label>
                                        <input type="checkbox" checked id="training_session2" value="2 on 1"
                                            name="training_session2">
                                        <label for="radioPrimary2">2 on 1</label>
                                    </div>
                                    @endif
                                    @if ($user->getAddress->training_session == '1 on 1,2 on 1')
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="training_session1" value="1 on 1" name="training_session1" checked> <label
                                            for="radioPrimary1">1 on
                                            1</label>
                                        <input checked type="checkbox" id="training_session2" value="2 on 1" name="training_session2">
                                        <label for="radioPrimary2">2 on 1</label>

                                    </div>
                                    @endif
                                @endif
                                <div id="training_session_erorr"></div>
                                <h5>Location Preferences</h5>
                                @if ($user->getAddress->location != 'clientlocation,myLocation' && $user->getAddress->location != 'myLocation,clientlocation')
                                    <div class="icheck-primary d-inline">
                                            @if ($user->getAddress->location == 'clientlocation')
                                                <input type="checkbox" id="clientlocation" value="clientlocation" name="clientlocation" checked>
                                                <label for="clientlocation">Client Location </label>
                                            @else
                                                <input type="checkbox" id="clientlocation" value="clientlocation" name="clientlocation">
                                                <label for="clientlocation">Client Location </label>
                                            @endif
                                    </div>
                                    <div class="icheck-primary d-inline">
                                        @if ($user->getAddress->location == 'myLocation')
                                            <input type="checkbox" id="myLocation" value="myLocation" name="myLocation" checked>
                                            <label for="myLocation">My Location</label>
                                        @else
                                            <input type="checkbox" id="myLocation" value="myLocation" name="myLocation">
                                            <label for="myLocation">My Location</label>
                                        @endif
                                    </div>
                                @endif
                                @if ($user->getAddress->location == 'clientlocation,myLocation' || $user->getAddress->location == 'myLocation,clientlocation')
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="clientlocation" value="clientlocation" name="clientlocation" checked>
                                        <label for="clientlocation">Client Location</label>

                                        <input type="checkbox" id="myLocation" value="myLocation" name="myLocation" checked>
                                        <label for="myLocation">My Location</label>
                                    </div>
                                @endif
                                <div id="location_erorr"></div>
                                <input type="submit" value="update" class="btn btn-primary">
                            </form>


                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel"
                aria-labelledby="custom-tabs-two-profile-tab">
                <div class="sessions__user__panel panel__style mb-4">
                    <div class="hed">
                        <h4>Upcoming Sessions</h4>
                    </div>
                    <div class="table table-responsive mb-0">
                        <table id="sessions_table" class="table table-all-sessions table__style mb0">
                            <thead>
                                <tr>
                                    <th>Trainees</th>
                                    <th>Location</th>
                                    <th>Sessions</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($sessions))
                                @foreach ($sessions as $session)
                                <tr>
                                    <td>
                                        <div class="custom-flex">
                                            <div class="user-img">
                                                @if (count($session->myTraineesNames) > 0)
                                                @if ($session->myTraineesNames[0]->profile_image)
                                                <img src="{{ asset($storage . $session->myTraineesNames[0]->profile_image) }}"
                                                    alt="">
                                                @else
                                                <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                                                @endif
                                                @else
                                                <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                                                @endif
                                            </div>
                                            <div class="user-name">
                                                @if (count($session->myTraineesNames) > 0)
                                                {{ $session->myTraineesNames[0]->name }}
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $session->location ?? '' }}
                                    </td>
                                    <td>{{ $session->training_session }}</td>
                                    <td>{{ date('j F, Y', strtotime($session->date)) }}</td>
                                    <td>{{ $session->start_time }}</td>
                                    @if ($session->status == 'pending')
                                    <td><span class="status__pending">pending</span></td>
                                    @elseif($session->status == 'cancelled')
                                    <td><span class="status__decline">Cancelled</span>
                                        <br> <span class="text-muted">By
                                            @if (isset($session->appointmentCancelledBy))
                                            {{ $session->appointmentCancelledBy->name ?? '' }}
                                            @endif
                                        </span>
                                    </td>
                                    @elseif($session->status == 'confirmed')
                                    <td><span class="status__confirm">Confirmed</span></td>
                                    @elseif($session->status == 'completed')
                                    <td><span class="status__confirm">Completed</span></td>

                                    @elseif($session->status == 'completed')
                                    <td><span class="status__confirm">Completed</span></td>
                                    @elseif($session->status == 'rescheduled')
                                    <td><span class="status__pending">Rescheduled</span></td>

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
            </div>
            <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel"
                aria-labelledby="custom-tabs-two-messages-tab">
                <div class="tab__messages row">
                    <div class="message__list col-md-3">
                        <div class="message__list__inr d-flex justify-content-center">
                            {{-- <h4>Chats</h4> --}}
                            <ul>
                                @if ($messages_send_from->count() <= 0) No chat avaiable @else
                                    {{-- {{dd($messages_send_from)}} --}} @foreach ($messages_send_from as $sender)
                                    <form class="commentForm">
                                    <li class="active">
                                        <a href="#">
                                            <div class="media">
                                                {{-- {{dd($sender)}} --}}
                                                @if (isset($sender->profile_image))
                                                <img src="{{ asset($storage . $sender->profile_image) }}" alt="">
                                                @else
                                                <img src="{{ asset('assets/admin/images/default-user.png') }}" alt="">
                                                @endif
                                                <div class="media-body">
                                                    {{-- <h5 class="mt-0">{{$sender->name}}</h5> --}}

                                                    <input type="hidden" value="{{ $sender->id }}" class="sendfrom"
                                                        name="sendfrom" id="sendfrom">
                                                    <input type="hidden" value="{{ $message_send_to }}" class="sendTo"
                                                        name="sendTo" id="sendTo">

                                                    <button class="pl-1" type="submit"
                                                        style="padding: 0;border: none;background: none;" value="add">
                                                        {{ $sender->name }}
                                                    </button>
                                                    {{-- <span>06:30 PM</span> --}}
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    {{-- <x-adminchattab :sendTo="$sender->id" :sendFrom="$message_send_to"/> --}}
                                    </form>
                                    @endforeach
                                    @endif

                                    {{-- if componenet is enable commnet these     </ul>  </div>  </div> --}}
                            </ul>
                        </div>
                    </div>

                    <div class="append-chat col-md-9" id="append-chat">

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@include('admin.users.decline')
@include('admin.users.approve')
@include('admin.modals.edit_trainer_rates')
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="module">
    import lightGallery from "https://cdn.skypack.dev/lightgallery@2.0.0-beta.4";
    import lgZoom from "https://cdn.skypack.dev/lightgallery@2.0.0-beta.4/plugins/zoom";

    const $galleryContainer = document.getElementById("gallery-container");


    lightGallery($galleryContainer, {
        speed: 500,
        controls: true,
        plugins: [lgZoom]
    });
</script>


<script>
    $(document).ready(function () {


        $("#Preferences").validate({
            errorClass: "error text-danger",
            validClass: "valid success-alert",
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                address: {
                    required: true
                },
                // clientlocation: {
                //     required: function (element) {
                //         if (!$("#clientlocation").is(':checked')) {
                //             return true;
                //         } else {
                //             return false;
                //         }
                //     }
                // },
                // myLocation: {
                //     required: function (element) {
                //         if (!$("#myLocation").is(':checked')) {
                //             return true;
                //         } else {
                //             return false;
                //         }
                //     }
                // },
                training_session1: {
                    required: function (element) {
                        if (!$("#training_session2").is(':checked')) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                },
                training_session2: {
                    required: function (element) {
                        if (!$("#training_session1").is(':checked')) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                },
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") == "clientlocation" || element.attr("name") ==
                    "myLocation") {
                    $('#location_erorr').html(error)
                } else if (element.attr("name") == "training_session1" || element.attr("name") ==
                    "training_session2") {
                    $('#training_session_erorr').html(error)
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                let formData = new FormData();

                var training_session = $('input[name="training_session1"]:checked').val();
                var training_session1 = $('input[name="training_session2"]:checked').val();
                var locationButton = $('input[name="clientlocation"]:checked').val();
                var location1 = $('input[name="myLocation"]:checked').val();

                if (training_session == '' || training_session == null) {
                    training_session = '';
                }
                if (training_session1 == '' || training_session1 == null) {
                    training_session1 = '';
                }
                if (locationButton == '' || locationButton == null) {
                    locationButton = '';
                }

                if (location1 == '' || location1 == null) {
                    location1 = '';
                }

                formData.append('trainerId', '{{ $user->id }}');
                formData.append('training_session1', training_session);
                formData.append('training_session2', training_session1);
                formData.append('clientlocation', locationButton);
                formData.append('myLocation', location1);

                $.ajax({
                    url: '{{ route("updateUserPref") }}',
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (response) {


                        alertify.success(response.message);

                    },
                    error: function (response) {
                        console.log('error');
                    }
                })
            }
        });



        function getChat(that) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var data = $(".commentForm").serialize();
            var me = $(".commentForm");

            $.ajax({
                type: 'POST',
                url: "{{ route('messagechat') }}",
                data: data,
                datatype: 'JSON',
                success: function (data) {
                    $(".append-chat").empty();
                    console.log(data);
                    $('.append-chat').append(data);
                    // return data;
                    var element = document.querySelector(".message-body");
                    element.scrollTop = element.scrollHeight;
                },
                error: function (data) {
                    console.log(data);
                    // return data;
                }
            });

            // return false;
        }


        $(document).on("submit", '.commentForm', function (e) {
            e.preventDefault()
            getChat('.commentForm')
        })

        setInterval(function () {
            getChat('.commentForm')
        }, 10000);

    });

</script>


@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        jQuery('#approved').click(function () {
            var id = $(this).attr('data-trainer_id');
            var name = $(this).attr('data-name');
            jQuery(".trainer_id").val(id);
            jQuery("#approved_name").text('Are you sure want to approve ' + name + ' profile ?');
        });
        jQuery('#declined').click(function () {
            var id = $(this).attr('data-trainer_id');
            var name = $(this).attr('data-name');
            jQuery(".trainer_id").val(id);
            jQuery("#declined_name").text('Are you sure want to decline ' + name + ' profile?');
        });
        $('#sessions_table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": true,
            language: {
                search: "Search",
                searchPlaceholder: "Search by Trainees Name"
            },
            "fnDrawCallback": function (oSettings) {
                if (oSettings._iDisplayLength > oSettings.fnRecordsDisplay()) {
                    $(oSettings.nTableWrapper).find('.dataTables_paginate').hide();
                } else {
                    $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
                }
            }
        });
        $(".message__list li a").on('click', function () {
            $(".message__list li").removeClass("active");
            $(this).parent().addClass("active");
        });
    });

</script>
@endpush
