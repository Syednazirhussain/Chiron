@extends('trainee.layouts.app')
@section('title', 'Trainee Profile')

@section('content')

<style>
.error {
    color: red !important;
}

</style>

    <div class="trainee__profile__panel panel__style">

        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="trainee-profile-tab1-tab" data-toggle="pill" href="#trainee-profile-tab1"
                   role="tab" aria-controls="trainee-profile-tab1" aria-selected="true">Personal Detail</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="trainee-profile-tab2-tab" data-toggle="pill" href="#trainee-profile-tab2"
                   role="tab"
                   aria-controls="trainee-profile-tab2" aria-selected="false">Change Passsword</a>
            </li>
        </ul>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-two-tabContent">
                <div class="tab-pane fade show active" id="trainee-profile-tab1" role="tabpanel"
                     aria-labelledby="trainee-profile-tab1-tab">
                    <div class="hed">
                        <h3><span class="colored">Edit</span> Personal Details</h3>
                    </div>
                    <div id="errors"></div>
                    @if (\Session::has('success'))
                        <div class="alert alert-success text-center py-3">
                            {!! \Session::get('success') !!}
                        </div>
                    @endif
                    <div class="row m-0">
                        <form id="profile_form" class="personal__form w-100" action="{{ route('profileUpdate') }}"
                              method="post">
                            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                            <div class="row m-0">
                                <div class="form__left col-md-9">
                                    <div class="row m-0">
                                        <div class="form-group col-md-6">
                                            <label for="">Full Name<span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{$profile->name}}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Email<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="email"
                                                   value="{{$profile->email}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row m-0">

                                        <div class="form-group col-md-6">
                                            <label for="">Location</label>
                                            <select class="form-select form-control" name="country" id="country"
                                                    required>
                                                <option value="" disabled>-Select</option>
                                                @foreach($countries as $key => $value)
                                                    @if($key == $profile->getAddress->country_id)
                                                        <option value="{{$key}}" selected>{{$value}}</option>
                                                    @else
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">Address<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="address"
                                                   value="{{$profile->getAddress->address}}" required>
                                        </div>

                                    </div>

                                    <div class="row m-0">
                                        <div class="form-group col-md-6 mt-2">
                                            <button class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form__right col-md-3">
                                    <label for="">Change Your Profile</label>
                                    <div class="main-profile-pic">
                                        <div class="profile-wrapper">
                                            @if(auth()->user()->profile_image)
                                                <img
                                                    src="{{ asset($storage.auth()->user()->profile_image) }}"
                                                    id="background_image_url__img">
                                            @else
                                                <img src="{{ asset('assets/trainee/images/default-user.png') }}"
                                                     id="background_image_url__img">
                                            @endif
                                        </div>
                                        <div class="file-upload-profile">
                                            <button class="file-upload-profile-btn" type="button"
                                                    onclick="$('.file-upload-profile-input').trigger( 'click' )"><i
                                                    class="fas fa-camera"></i></button>
                                            <input class="file-upload-profile-input file-preview" type='file'
                                                   onchange="readURLProfilePhoto(this);" name="background_image_url"
                                                   id="background_image_url" accept="image/*"/>
                                        </div>

                                        <button type="button"
                                                onclick="$('.file-upload-profile-input').trigger( 'click' )"
                                                class="btn btn-primary btn-upload d-none">Upload
                                        </button>
                                    </div>
                                </div>


                            </div>
                        </form>
                    </div>
                    <script>
                        let uploadFilePreviewFunc = function () {
                            let fileInput = document.querySelectorAll('.file-preview');
                            // console.log(fileInput);
                            fileInput.forEach(function (el, index) {
                                el.addEventListener('change', function () {
                                    let fileInputId = this.id;
                                    let fileInputImage = fileInputId + "__img";


                                    let previewImage = document.getElementById(fileInputImage);
                                    let previewFileInputName = document.getElementById(fileInputId + "__name");
                                    let previewImageType = document.getElementById(fileInputId).files[0].type;


                                    if (previewImageType === undefined || previewImageType === null || previewImageType === "") {
                                        previewImageType = "unknown";
                                    }


                                    console.log(` ${fileInputId} ~+~ ${previewImage.id} Type: ${previewImageType}`);

                                    let reader = new FileReader();
                                    reader.onload = function (e) {
                                        // get loaded data and render thumbnail.
                                        previewImage.setAttribute('src', e.target.result);
                                        //  previewFileInputName.innerHTML = this.files[0];

                                        previewImage.closest("div").setAttribute("data-filetype", previewImageType);

                                    };
                                    // read the image file as a data URL.
                                    reader.readAsDataURL(this.files[0]);
                                });
                            });
                        };


                        uploadFilePreviewFunc();

                    </script>
                </div>
                <div class="tab-pane fade" id="trainee-profile-tab2" role="tabpanel"
                     aria-labelledby="trainee-profile-tab2-tab">

                    <div class="hed">
                        <h3><span class="colored">Change</span> Password</h3>
                    </div>

                    <form id="password_form" name="login-form-s" method="post" class="form">
                        <div id="passwordmsg"></div>

                        <div class="change__password row m-0">

                            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                            <div class="col-md-3 p-0">
                                <div class="form-group">
                                    <label>Password<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="oldPass" id="oldPass"
                                           placeholder="Enter your old password" value="" required>
                                    <span toggle="#oldPass"
                                          class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <label>New Password<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="newPass" id="newPass"
                                           placeholder="atleast 8 characters" value="" required>
                                    <span toggle="#newPass"
                                          class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password<span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="confirmPass"
                                           id="confirmPass" placeholder="atleast 8 characters"
                                           value="" required>
                                    <span toggle="#confirmPass"
                                          class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group mt-4">
                                    <button class="btn btn-primary" type="submit" id="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $("#password_form").validate({
                errorClass: "error text-danger",
                validClass: "valid success-alert",
                rules: {
                    oldPass: {
                        required: true,
                    },
                    newPass: {
                        required: true,
                        strong_password: true,
                        minlength: 8
                    },
                    confirmPass: {
                        required: true,
                        equalTo: "#newPass"
                    },
                },
                submitHandler: function (form) {
                    let oldPass = $('#oldPass').val();

                    let newPass = $('#newPass').val();

                    let confirmPass = $('#confirmPass').val();

                    let formData = new FormData();
                    formData.append('OldPass', oldPass);
                    formData.append('confirmPass', confirmPass);

                    $.ajax({
                        url: '{{ route('passwordUpdate') }}',
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (response) {
                            let html = ''
                            html += '<div class="alert alert-success text-center py-3">'
                            html += '<div class="cont">'+ response.message
                            html += '<div class="alert__icon"><span></span></div>'
                            html += '</div>'
                            html += '</div>'
                            $('#passwordmsg').html(html)
                            $('html, body').animate({scrollTop: 0}, 'slow');
                        },
                        error: function (response) {
                            let html = ''
                            html += '<div class="alert alert-danger alert-dismissable alert-sticky">'
                            html += '<div class="cont">'
                            html += '<ul>'
                            html += '<li>' + response.responseJSON.message + '</li>'
                            html += '</ul>'
                            html += '<div class="alert__icon"><span></span></div>'
                            html += '</div>'
                            html += '</div>'
                            $('#passwordmsg').html(html)
                            $('html, body').animate({scrollTop: 0}, 'slow');
                        }
                    });
                }
            });

            // $("#profile_form").validate();

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            setTimeout(() => {
                var c_id = '<?php echo $profile->getAddress->country_id; ?>';
                var s_id = '<?php echo $profile->getAddress->state_id; ?>';
                makeStates(c_id, s_id)
            }, 1000);

            $("#country").change(function () {
                let id = $(this).val()
                $('#state').empty()
                makeStates(id)
            });

            function makeStates(id, selected = 0) {
                let states = [];
                var allstates = <?php echo json_encode($states); ?>;
                for (let i = 0; i < allstates.length; i++) {
                    if (allstates[i].country_id == id) {
                        states.push(allstates[i]);
                    }
                }
                $('#state').empty()
                if (states.length > 0) {
                    $('#state').append($('<option>', {
                        value: '',
                        text: 'Select State'
                    }));
                    $.each(states, function (i, item) {
                        $('#state').append($('<option>', {
                            value: item.id,
                            text: item.name
                        }));
                    });
                    if (selected > 0) {
                        $("#state option[value='" + selected + "']").prop('selected', true);
                    }
                } else {
                    $('#state').append($('<option>', {
                        value: '',
                        text: 'No State Found in This Country'
                    }));
                }
            }
        })

        function readURLProfilePhoto(input) {
            var file = input;
            if (/\.(jpe?g|png)$/i.test(file.files[0].name) === false) {
                let html = ''
                html += '<div class="alert alert-danger alert-dismissable alert-sticky">'
                html += '<div class="cont">'
                html += '<ul>'
                html += '<li>Supprted extesions for Profile Image are .jpg, .png</li>'
                html += '</ul>'
                html += '<div class="alert__icon"><span></span></div>'
                html += '</div>'
                html += '</div>'
                $('#errors').html(html)
                $('html, body').animate({scrollTop: 0}, 'slow');
            } else {
                var fileSize = input.files[0].size / 1024 / 1024; // in MiB
                if (fileSize > 1) {
                    let html = ''
                    html += '<div class="alert alert-danger alert-dismissable alert-sticky">'
                    html += '<div class="cont">'
                    html += '<ul>'
                    html += '<li>File size exceeds 1 MiB</li>'
                    html += '</ul>'
                    html += '<div class="alert__icon"><span></span></div>'
                    html += '</div>'
                    html += '</div>'
                    $('#errors').html(html)
                    $('html, body').animate({scrollTop: 0}, 'slow');
                } else {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.file-upload-profilepic').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                    let formData = new FormData();
                    formData.append('file', input.files[0]);

                    $.ajax({
                        url: '{{ route('profileImageUpdate') }}',
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (response) {
                            if (response == 0) {
                                let html = ''
                                html += '<div class="alert alert-success alert-dismissable alert-sticky">'
                                html += '<div class="cont">'
                                html += '<ul>'
                                html += '<li>Something went wrong Please reload page and try again</li>'
                                html += '</ul>'
                                html += '<div class="alert__icon"><span></span></div>'
                                html += '</div>'
                                html += '</div>'
                                $('#errors').html(html)
                                $('html, body').animate({scrollTop: 0}, 'slow');
                            }
                            window.location.reload();
                        }
                    });
                }
            }
        }

        //Show Password
        $(".toggle-password").click(function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

    </script>
@endpush
