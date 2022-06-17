@extends('admin.layouts.app')
@section('title', 'Admin Profile ')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="admin__profile__panel panel__style mb-4">
    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="admin-profile-tab1-tab" data-toggle="pill" href="#admin-profile-tab1"
                role="tab" aria-controls="admin-profile-tab1" aria-selected="true">General Info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="admin-profile-tab2-tab" data-toggle="pill" href="#admin-profile-tab2" role="tab"
                aria-controls="admin-profile-tab2" aria-selected="false">Change Password</a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link" id="admin-profile-tab3-tab" data-toggle="pill" href="#admin-profile-tab3" role="tab"
                aria-controls="admin-profile-tab3" aria-selected="false">Payments</a>
        </li> -->
    </ul>

    <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="admin-profile-tab1" role="tabpanel"
                aria-labelledby="admin-profile-tab1-tab">
                <form method="post" action="{{ route('adminProfileUpdate') }}"
                autocomplete="off"  class="form" id="edit-form">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="type" value="admin">
                <div class="personal__info">
                    <div class="hed">
                        <h4><span class="colored">Edit</span> General Info</h4>
                    </div>
                    <div class="row m-0">
                        <div class="form__lft col-md-9">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" value="{{$profile->name}}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Phone Number</label>
                                    <input id="numberMasking" type="text" name="phone" value="{{$profile->phone}}"
                                        class="form-control" data-inputmask='"mask": "(+999)(9999)(9999)9"' data-mask>
                                </div>
                            </div>
                            <h4>Company Info</h4>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Company Name<span class="text-danger">*</span> </label>
                                    <input  autocomplete="true"  type="text" class="form-control" name="c_name"
                                     value="{{$profile->c_name}}" required >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control disabled" name="email" value="{{$profile->email}}" required>
                                </div>
                            </div>
                            <h4>Locations</h4>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="country">Country<span class="text-danger">*</span></label>
                                    <select class="form-select form-control" name="country" id="country" required>
                                        <option value="">Select</option>
                                        @foreach($countries as $key => $value)
                                        @if(isset($profile->getAddress->country_id) && $key == $profile->getAddress->country_id)
                                        <option value="{{$key}}" selected>{{$value}}</option>
                                        @else
                                        <option value="{{$key}}">{{$value}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="state">State<span class="text-danger">*</span></label>
                                    <select name="state" id="state" class="form-control" required>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="city">City<span class="text-danger">*</span></label>
                                    <select name="city_id" id="city" class="form-control" required></select>
                                </div>
                            </div>
                        </div>
                        <div class="form__rgt col-md-3">
                            <h4>Change Your Profile</h4>
                            <div class="main-profile-pic">
                                <div class="profile-wrapper">
                                @if(auth()->user()->profile_image)
                                    <img class="file-upload-profilepic" src="{{ asset($storage.auth()->user()->profile_image) }}">
                                @else
                                    <img class="file-upload-profilepic" src="{{ asset('assets/admin/images/default-user.png') }}">
                                @endif
                                </div>
                                <div class="file-upload-profile" >
                                    <button class="file-upload-profile-btn" type="button"
                                        onclick="$('.file-upload-profile-input').trigger( 'click' )"><i
                                            class="fas fa-camera"></i></button>
                                    <input class="file-upload-profile-input" type='file'
                                        onchange="readURLProfilePhoto(this);" accept="image/*" />
                                </div>
                                <button style="visibility: hidden;" type="button" onclick="$('.file-upload-profile-input').trigger( 'click' )"
                                    class="btn btn-primary btn-upload">Upload</button>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="actions col-md-12 mt-2">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>

            <div class="tab-pane fade" id="admin-profile-tab2" role="tabpanel" aria-labelledby="admin-profile-tab2-tab">
                <div id="errors-password"></div>
                <div class="change__password">
                    <div class="hed">
                        <h4><span class="colored">Change</span> Password</h4>
                    </div>
                    <div class="row m-0">
                        <div class="col-md-3">
                        <form id="login-form-s" name="login-form-s" method="post" class="form">
                        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Password<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="oldPass" id="oldPass"
                                    value="" placeholder="Enter your old password">
                                <span toggle="#oldPass"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <label>New Password<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="newPass" id="newPass"
                                    value="" placeholder="atleast 8 characters">
                                <span toggle="#newPass"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password<span class="text-danger">*</span></label>
                                <input type="password" class="form-control"
                                    name="confirmPass" id="confirmPass" value="" placeholder="atleast 8 characters">
                                <span toggle="#confirmPass"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group mt-4">
                                <button class="btn btn-primary" type="submit" id="passwordChange">Save</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="admin-profile-tab3" role="tabpanel" aria-labelledby="admin-profile-tab3-tab">
                <div id="errors-account"></div>
                <div class="admin__payment">
                    <div class="hed">
                        <h4><span class="colored">Account</span> Detail</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row m-0">
                                <div class="form-group col-md-12">
                                    <label for="">Account Name/Title</label>
                                    <input type="text" class="form-control" placeholder="Chirons Health Pvt Ltd">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Account Number</label>
                                    <input type="text" class="form-control" placeholder="0000-000-213-2563-112">
                                </div>
                            </div>
                            <div class="row m-0">
                                <div class="form-group col-md-6">
                                    <label for="">Expire Date</label>
                                    <input type="text" class="form-control" placeholder="10/2023">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">CSV</label>
                                    <input type="text" class="form-control" placeholder="75341">
                                </div>
                            </div>
                            <div class="row m-0">
                                <div class="actions col-md-12 mt-2">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection
    @push('scripts')
    <script type="text/javascript">
        $(function () {
            jQuery('#numberMasking').inputmask();
        });

        function readURLProfilePhoto(input) {
            var file = input;
        if ( /\.(jpe?g|png)$/i.test(file.files[0].name) === false ) {
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
            $('html, body').animate({ scrollTop: 0 }, 'slow');
        }else{
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.file-upload-profilepic').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);

            let formData = new FormData();
            formData.append('file', input.files[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('adminProfileImageUpdate') }}',
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (response) {
                    if(response == 0){
                        let html = ''
                        html += '<div class="alert alert-danger alert-dismissable alert-sticky">'
                        html += '<div class="cont">'
                        html += '<ul>'
                        html += '<li>Something went wrong Please reload page and try again</li>'
                        html += '</ul>'
                        html += '<div class="alert__icon"><span></span></div>'
                        html += '</div>'
                        html += '</div>'
                        $('#errors').html(html)
                        $('html, body').animate({ scrollTop: 0 }, 'slow');
                    }
                    window.location.reload();
                }
            });
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

        $("#country").change(function () {
            let id = $(this).val()
            $('#state').empty()
            $('#city').empty()
            makeStates(id)
        });

        $("#state").change(function () {
            let id = $(this).val()
            $('#city').empty()
            makeCity(id)
        })

        $(document).ready(function(){
            setTimeout(() => {
                let state_id  = <?php if (isset($profile->getAddress->state_id)) {
                    echo $profile->getAddress->state_id;
                }else{
                    echo 0;
                }  ?>;
                let country_id  = <?php if (isset($profile->getAddress->country_id)) {
                    echo $profile->getAddress->country_id;
                }else{ echo 0; } ?>;
                let city_id  = <?php if (isset($profile->getAddress->city_id)) {
                    echo $profile->getAddress->city_id;
                }else {
                    echo 0;
                }  ?>;
                makeStates(country_id ,state_id)
                makeCity(state_id, city_id)
            }, 2000);
        });

        function makeStates(id, selected = 0){
            let states = [];
            var allstates = <?php echo json_encode($states); ?>;
            for (let i = 0; i < allstates.length; i++) {
                if(allstates[i].country_id == id){
                    states.push(allstates[i]);
                }
            }
            $('#state').empty()
            if(states.length > 0){
                $('#state').append($('<option>', {
                    value: '',
                    text: 'Select State'
                }));
                $.each(states, function (i, item) {
                    $('#state').append($('<option>', {
                        value: item.id,
                        text : item.name
                    }));
                });
                if(selected > 0){
                    $("#state option[value='"+selected+"']").prop('selected', true);
                }
            }else{
                $('#state').append($('<option>', {
                    value: '',
                    text: 'No State Found in This Country'
                }));
            }
        }
        function makeCity(id, selected = 0){
            var allcities = <?php echo json_encode($cities); ?>;
            let cities = [];
            for (let i = 0; i < allcities.length; i++) {
                if(allcities[i].state_id == id){
                    cities.push(allcities[i]);
                }
            }
            $('#city').empty();
            if(cities.length > 0){
                $('#city').append($('<option>', {
                    value: '',
                    text: 'Select City'
                }));
                $.each(cities, function (i, item) {
                    $('#city').append($('<option>', {
                        value: item.id,
                        text : item.name
                    }));
                });
                if(selected > 0){
                    $("#city option[value='"+selected+"']").prop('selected', true);
                }
            }else{
                $('#city').append($('<option>', {
                    value: '',
                    text: 'No City Found in This State'
                }));
            }
        }

        $(document).ready(function () {

            $.validator.setDefaults({
                errorClass: "error text-danger",
                validClass: "valid success-alert",
            });
            $("#edit-form").validate({
                submitHandler:function(form){
                    form.submit();
                }
            })

            $("#login-form-s").validate({
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
                    $('#errors-password').empty();

                    let formData = new FormData();
                    let oldPass = $('#oldPass').val();
                    let newPass = $('#newPass').val();
                    let confirmPass = $('#confirmPass').val();
                    formData.append('OldPass', oldPass);
                    formData.append('confirmPass', confirmPass);

                    $.ajax({
                        url: '{{ route('adminPasswordUpdate') }}',
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (response) {
                            $('#errors-password').append('<div class="alert alert-success alert-dismissable alert-sticky text-center">' + response.message + '</div>');
                            setTimeout(function () {
                                $('#errors-password').fadeOut('fast');
                                window.location.reload()
                            }, 2000);
                        },
                        error: function (response) {
                            $('#errors-password').append('<div class="alert alert-danger alert-dismissable alert-sticky text-center">' + response.responseJSON.message + '</div>');

                        }
                    });
                }
            });
        });
    </script>
    @endpush
