@extends('trainer.layouts.app')
@section('title', 'Profile')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.4/css/lightgallery.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.0.0-beta.4/css/lg-zoom.css" />
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Bootstrap theme -->
{{-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/> --}}
<div class="profile-main-section">
   <div class="card-header profile__main__tab__list p-0 pt-1 border-bottom-0">
      <ul class="nav nav-tabs" id="profileMainTab" role="tablist">
         <li class="nav-item">
            <a class="nav-link
            {{ in_array(request()->tab,['','about','personal-detail','photos','availability','reviews']) ? 'active':'' }}" onclick="pushState('personal-detail')" id="profileMainTab1" data-toggle="pill" href="#profileMain__tab1"
               role="tab"
               aria-controls="profileMainTab1" aria-selected="true">Personal Detail</a>
         </li>
         <li class="nav-item">
            <a class="nav-link {{ in_array(request()->tab,['change-password'])  ? 'active':'' }}" id="profileMainTab2" data-toggle="pill" href="#profileMain__tab2" role="tab"
               aria-controls="profileMainTab2" onclick="pushState('change-password')" aria-selected="false">Change Password</a>
         </li>
         <li class="nav-item">
            <a class="nav-link {{ in_array(request()->tab,['documents']) ? 'active':'' }}" id="profileMainTab3" data-toggle="pill" href="#profileMain__tab3" role="tab"
               aria-controls="profileMainTab3" onclick="pushState('documents')" aria-selected="false">Documents</a>
         </li>
      </ul>
   </div>
   <div class="card-body profile__main__tab__content">
      <div class="tab-content" id="profileMainTabContent">
         <meta name="csrf-token" content="{{ csrf_token() }}"/>
         <div class="tab-pane main__content__detail fade {{ in_array(request()->tab,['','about','personal-detail','photos','availability','reviews']) ? 'active show':'' }}" id="profileMain__tab1" role="tabpanel"
            aria-labelledby="profileMainTab1">
            <div class="main-cover">
               @if(Auth::user()->cover_image)
               <img class="file-upload-coverphoto"
                  src="{{ asset($storage.auth()->user()->cover_image) }}"
                  alt="Cover Photo">
               @else
               <img class="file-upload-coverphoto"
                  src="{{ asset('assets/trainer/images/profile/cover.png') }}"
                  alt="Cover Photo">
               @endif
               <div class="file-upload-cover">
                  <button class="file-upload-coverphoto-btn" type="button"
                     onclick="$('.file-upload-coverphoto-input').trigger( 'click' )"><i
                     class="fas fa-camera"></i></button>
                  <input class="file-upload-coverphoto-input" type='file' onchange="readURLCoverPhoto(this);"
                     accept="image/*"/>
               </div>
            </div>
            <div class="main-profile-pic">
               <div class="profile-wrapper">
                  @if(auth()->user()->profile_image)
                     <img src="{{ asset($storage.auth()->user()->profile_image) }}">
                  @else
                     <img src="{{ asset('assets/trainee/images/default-user.png') }}">
                  @endif
               </div>
               <div class="file-upload-profile">
                  <button class="file-upload-profile-btn" type="button"
                     onclick="$('.file-upload-profile-input').trigger( 'click' )"><i
                     class="fas fa-camera"></i></button>
                  <input class="file-upload-profile-input" type='file' onchange="readURLProfilePhoto(this);"
                     accept="image/*"/>
               </div>
            </div>
            <form id="profile-form-s" class="form">
               <div class="row m-0">
                  <div class="form__inner col-md-3">
                     <div class="form-group">
                        <label for="">Full Name</label> <span style="color: red">*</span>
                        <input type="text" name="name" value="{{$profile->name}}" class="form-control"
                           value="Smitham Chelsie">
                     </div>
                     <div class="form-group">
                        <label for="">Email</label> <span style="color: red">*</span>
                        <input type="text" name="email" value="{{$profile->email}}" class="form-control"
                           value="smitham_chelsie71@gmail.com">
                     </div>
                     <div class="form-group">
                        <label for="">Address</label> <span style="color: red">*</span>
                        <input type="text" name="address" value="{{$profile->getAddress->address ?? ''}}"
                           class="form-control">
                     </div>
                     <div class="form-group">
                        <label for="">Social Links</label>
                        @if(isset($profile->getProfile))
                        <div class="inner-group">
                           <div class="icon"><i class="fab fa-instagram"></i></div>
                           <input type="text" name="insta" value="{{$profile->getProfile->insta}}"
                              class="form-control">
                        </div>
                        <div class="inner-group">
                           <div class="icon"><i class="fab fa-twitter"></i></div>
                           <input type="text" name="twitter" value="{{$profile->getProfile->twitter}}"
                              class="form-control">
                        </div>
                        <div class="inner-group">
                           <div class="icon pl-1"><i class="fab fa-facebook-f"></i></div>
                           <input type="text" name="facebook"
                              value="{{$profile->getProfile->facebook}}"
                              class="form-control">
                        </div>
                        @else
                        <div class="inner-group">
                           <div class="icon"><i class="fab fa-instagram"></i></div>
                           <input type="text" name="insta" value=""
                              class="form-control">
                        </div>
                        <div class="inner-group">
                           <div class="icon"><i class="fab fa-twitter"></i></div>
                           <input type="text" name="twitter" value=""
                              class="form-control">
                        </div>
                        <div class="inner-group">
                           <div class="icon pl-1"><i class="fab fa-facebook-f"></i></div>
                           <input type="text" name="facebook" value=""
                              class="form-control">
                        </div>
                        @endif
                     </div>
                  </div>
                  <div class="tabs__inner col-md-6">
                     <div id="errors"></div>
                     <div id="errors-cover"></div>
                     <div id="errors-profile"></div>
                     <div class="card-header profile__inr__tab__list p-0 pt-1 mb-3 border-bottom-0">
                        <ul class="nav nav-tabs" id="profileInrTab" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link {{ in_array(request()->tab,['','about','personal-detail','change-password','documents']) ? 'active':'' }}" id="profileInrTab1" onclick="pushState('about')" data-toggle="pill"
                                 href="#profileInr__tab1" role="tab" aria-controls="profileInrTab1"
                                 aria-selected="true">About Me</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link {{ isset(request()->tab) && request()->tab == 'availability' ? 'active':'' }}"  id="profileInrTab2" data-toggle="pill"
                                 href="#profileInr__tab2" onclick="pushState('availability')"
                                 role="tab" aria-controls="profileInrTab2"
                                 aria-selected="false">Availability</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link {{ isset(request()->tab) && request()->tab == 'photos' ? 'active':'' }}" id="profileInrTab3" data-toggle="pill"
                                 href="#profileInr__tab3" onclick="pushState('photos')"
                                 role="tab" aria-controls="profileInrTab3"
                                 aria-selected="false">Photos</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link {{ isset(request()->tab) && request()->tab == 'reviews' ? 'active':'' }}" id="profileInrTab4" data-toggle="pill"
                                 href="#profileInr__tab4" onclick="pushState('reviews')"
                                 role="tab" aria-controls="profileInrTab4"
                                 aria-selected="false">Reviews</a>
                           </li>
                        </ul>
                     </div>
                     <div class="profile__inr__tab__content">
                        <div class="tab-content" id="profileInrTabContent">
                           <div class="tab-pane fade  aboutme__inr  {{ in_array(request()->tab,['','about','personal-detail','change-password','documents']) ? 'active show':'' }}" id="profileInr__tab1"
                              role="tabpanel" aria-labelledby="profileInrTab1">
                              @if(isset($profile->getProfile))
                              <textarea class="form-control" name="about" id="about" rows="7"
                                 placeholder="About me">{{$profile->getProfile->about}}</textarea>
                              @else
                              <textarea class="form-control" name="about" id="about" rows="7"
                                 placeholder="About me"></textarea>
                              @endif
                              <h4 class="mt-4">Training Specialties</h4>
                              <div class="tags">
                                 <input id="tagInput" name="specialties" type="text" class="form-control"
                                    placeholder="Type Specialties"
                                    onkeyup="specialtiesSave(this)">
                                 </button>
                                 <ul class="tagslist">
                                    @if(isset($profile->getProfile) && isset($profile->getProfile->specialties))
                                    <?php $data = json_decode($profile->getProfile->specialties); ?>
                                    @foreach($data as $row)
                                    <li>{{$row}}
                                       <button type="button" data-name="{{$row}}"
                                          class="btn btn-remove"><i
                                          class="fas fa-times-circle"></i></button>
                                    </li>
                                    @endforeach
                                    @endif
                                 </ul>
                              </div>
                              <h4>Edit Location Details</h4>
                              <div class="form-group">
                                 <label for="">Location </label> <span style="color: red">*</span>
                                 <select class="form-select form-control" name="country" id="country">
                                    <option value="" disabled>-Select</option>
                                    @foreach($countries as $key => $value)
                                    @if(isset($profile->getAddress))
                                    @if($key == $profile->getAddress->country_id)
                                    <option value="{{$key}}" selected>{{$value}}</option>
                                    @else
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endif
                                    @else
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endif
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="tab-pane fade availibility__inr {{ isset(request()->tab) && request()->tab == 'availability' ? 'show active':'' }}" id="profileInr__tab2"
                              role="tabpanel"
                              aria-labelledby="profileInrTab2">
                              <div class="availibility-table">
                                 <div class="thead">
                                    <div class="th"></div>
                                    <div class="th">Mon</div>
                                    <div class="th">Tues</div>
                                    <div class="th">Wed</div>
                                    <div class="th">Thurs</div>
                                    <div class="th">Fri</div>
                                    <div class="th">Sat</div>
                                    <div class="th">Sun</div>
                                 </div>
                                 <div class="tbody">
                                    <div class="tr">
                                       <div class="td available-time">06:00 AM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('06:00 AM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO06:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO06:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO06:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('06:00 AM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU06:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU06:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU06:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('06:00 AM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE06:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE06:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE06:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('06:00 AM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH06:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH06:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH06:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('06:00 AM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR06:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR06:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR06:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('06:00 AM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA06:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA06:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA06:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('06:00 AM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU06:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU06:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU06:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tr">
                                       <div class="td available-time">07:00 AM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('07:00 AM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO07:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO07:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO07:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('07:00 AM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU07:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU07:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU07:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('07:00 AM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE07:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE07:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE07:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('07:00 AM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH07:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH07:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH07:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('07:00 AM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR07:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR07:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR07:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('07:00 AM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA07:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA07:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA07:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('07:00 AM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU07:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU07:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU07:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tr">
                                       <div class="td available-time">08:00 AM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('08:00 AM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO08:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO08:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO08:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('08:00 AM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU08:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU08:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU08:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('08:00 AM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE08:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE08:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE08:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('08:00 AM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH08:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH08:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH08:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('08:00 AM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR08:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR08:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR08:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('08:00 AM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA08:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA08:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA08:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('08:00 AM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU08:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU08:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU08:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tr">
                                       <div class="td available-time">09:00 AM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('09:00 AM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO09:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO09:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO09:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('09:00 AM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU09:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU09:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU09:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('09:00 AM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE09:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE09:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE09:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('09:00 AM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH09:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH09:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH09:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('09:00 AM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR09:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR09:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR09:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('09:00 AM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA09:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA09:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA09:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('09:00 AM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU09:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU09:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU09:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tr">
                                       <div class="td available-time">10:00 AM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('10:00 AM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO10:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO10:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO10:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('10:00 AM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU10:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU10:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU10:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('10:00 AM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE10:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE10:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE10:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('10:00 AM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH10:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH10:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH10:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('10:00 AM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR10:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR10:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR10:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('10:00 AM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA10:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA10:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA10:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('10:00 AM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU10:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU10:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU10:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tr">
                                       <div class="td available-time">11:00 AM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('11:00 AM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO11:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO11:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO11:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('11:00 AM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU11:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU11:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU11:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('11:00 AM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE11:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE11:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE11:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('11:00 AM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH11:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH11:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH11:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('11:00 AM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR11:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR11:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR11:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('11:00 AM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA11:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA11:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA11:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('11:00 AM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU11:00 AM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU11:00 AM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU11:00 AM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tr">
                                       <div class="td available-time">12:00 PM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('12:00 PM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO12:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO12:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO12:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('12:00 PM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU12:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU12:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU12:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('12:00 PM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE12:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE12:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE12:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('12:00 PM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH12:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH12:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH12:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('12:00 PM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR12:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR12:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR12:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('12:00 PM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA12:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA12:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA12:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('12:00 PM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU12:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU12:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU12:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tr">
                                       <div class="td available-time">01:00 PM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('01:00 PM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO01:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO01:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO01:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('01:00 PM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU01:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU01:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU01:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('01:00 PM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE01:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE01:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE01:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('01:00 PM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH01:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH01:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH01:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('01:00 PM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR01:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR01:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR01:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('01:00 PM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA01:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA01:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA01:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('01:00 PM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU01:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU01:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU01:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tr">
                                       <div class="td available-time">02:00 PM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('02:00 PM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO02:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO02:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO02:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('02:00 PM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU02:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU02:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU02:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('02:00 PM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE02:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE02:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE02:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('02:00 PM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH02:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH02:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH02:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('02:00 PM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR02:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR02:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR02:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('02:00 PM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA02:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA02:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA02:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('02:00 PM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU02:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU02:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU02:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tr">
                                       <div class="td available-time">03:00 PM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('03:00 PM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO03:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO03:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO03:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('03:00 PM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU03:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU03:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU03:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('03:00 PM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE03:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE03:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE03:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('03:00 PM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH03:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH03:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH03:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('03:00 PM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR03:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR03:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR03:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('03:00 PM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA03:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA03:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA03:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('03:00 PM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU03:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU03:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU03:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tr">
                                       <div class="td available-time">04:00 PM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('04:00 PM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO04:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO04:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO04:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('04:00 PM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU04:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU04:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU04:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('04:00 PM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE04:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE04:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE04:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('04:00 PM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH04:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH04:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH04:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('04:00 PM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR04:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR04:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR04:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('04:00 PM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA04:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA04:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA04:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('04:00 PM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU04:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU04:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU04:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tr">
                                       <div class="td available-time">05:00 PM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('05:00 PM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO05:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO05:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO05:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('05:00 PM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU05:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU05:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU05:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('05:00 PM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE05:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE05:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE05:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('05:00 PM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH05:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH05:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH05:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('05:00 PM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR05:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR05:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR05:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('05:00 PM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA05:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA05:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA05:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('05:00 PM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU05:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU05:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU05:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tr">
                                       <div class="td available-time">06:00 PM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('06:00 PM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO06:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO06:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO06:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('06:00 PM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU06:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU06:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU06:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('06:00 PM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE06:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE06:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE06:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('06:00 PM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH06:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH06:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH06:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('06:00 PM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR06:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR06:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR06:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('06:00 PM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA06:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA06:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA06:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('06:00 PM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU06:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU06:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU06:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tr">
                                       <div class="td available-time">07:00 PM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('07:00 PM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO07:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO07:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO07:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('07:00 PM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU07:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU07:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU07:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('07:00 PM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE07:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE07:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE07:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('07:00 PM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH07:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH07:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH07:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('07:00 PM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR07:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR07:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR07:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('07:00 PM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA07:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA07:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA07:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('07:00 PM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU07:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU07:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU07:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tr">
                                       <div class="td available-time">08:00 PM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('08:00 PM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO08:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO08:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO08:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('08:00 PM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU08:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU08:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU08:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('08:00 PM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE08:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE08:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE08:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('08:00 PM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH08:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH08:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH08:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('08:00 PM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR08:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR08:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR08:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('08:00 PM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA08:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA08:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA08:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('08:00 PM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU08:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU08:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU08:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tr">
                                       <div class="td available-time">09:00 PM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('09:00 PM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO09:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO09:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO09:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('09:00 PM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU09:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU09:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU09:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('09:00 PM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE09:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE09:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE09:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('09:00 PM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH09:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH09:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH09:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('09:00 PM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR09:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR09:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR09:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('09:00 PM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA09:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA09:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA09:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('09:00 PM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU09:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU09:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU09:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tr">
                                       <div class="td available-time">10:00 PM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('10:00 PM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO10:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO10:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO10:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('10:00 PM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU10:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU10:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU10:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('10:00 PM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE10:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE10:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE10:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('10:00 PM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH10:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH10:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH10:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('10:00 PM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR10:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR10:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR10:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('10:00 PM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA10:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA10:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA10:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('10:00 PM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU10:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU10:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU10:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="tr">
                                       <div class="td available-time">11:00 PM</div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['MO']))
                                             @if(in_array('11:00 PM',$times['MO']))
                                             <input class="input" name="timeSlot"
                                                value="MO11:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO11:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="MO11:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Mon</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TU']))
                                             @if(in_array('11:00 PM',$times['TU']))
                                             <input class="input" name="timeSlot"
                                                value="TU11:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU11:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TU11:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Tue</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['WE']))
                                             @if(in_array('11:00 PM',$times['WE']))
                                             <input class="input" name="timeSlot"
                                                value="WE11:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE11:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="WE11:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Wed</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['TH']))
                                             @if(in_array('11:00 PM',$times['TH']))
                                             <input class="input" name="timeSlot"
                                                value="TH11:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH11:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="TH11:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Thurs</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['FR']))
                                             @if(in_array('11:00 PM',$times['FR']))
                                             <input class="input" name="timeSlot"
                                                value="FR11:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR11:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="FR11:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Fri</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SA']))
                                             @if(in_array('11:00 PM',$times['SA']))
                                             <input class="input" name="timeSlot"
                                                value="SA11:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA11:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SA11:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sat</label>
                                          </div>
                                       </div>
                                       <div class="td available-day">
                                          <div class="form-check">
                                             @if(isset($times['SU']))
                                             @if(in_array('11:00 PM',$times['SU']))
                                             <input class="input" name="timeSlot"
                                                value="SU11:00 PM" type="checkbox"
                                                checked="checked">
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU11:00 PM" type="checkbox">
                                             @endif
                                             @else
                                             <input class="input" name="timeSlot"
                                                value="SU11:00 PM" type="checkbox">
                                             @endif
                                             <label class="label">Sun</label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="availibility-info row my-3">
                                 <div class="col d-flex">
                                    <div class="box grey"></div>
                                    <div class="txt">Unavailable</div>
                                    <div class="box blue"></div>
                                    <div class="txt">Available</div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane fade photos__inr {{ isset(request()->tab) && request()->tab == 'photos' ? 'show active':'' }}" id="profileInr__tab3" role="tabpanel"
                              aria-labelledby="profileInrTab3">
                              <input type="file" name="images" accept="image/*" class="photo-gallery-input"
                                 onchange="readURLGalleryPhoto(this);">
                              <div class="photo__gallery">
                                 <div class="photo_response"></div>
                                 <ul>
                                    <div class="image_response"></div>
                                    <li class="addBtn"
                                       onclick="$('.photo-gallery-input').trigger( 'click' )">
                                       <i class="fas fa-camera"></i>
                                       <span>Upload</span>
                                    </li>
                                    @if(isset($profile->getImages))
                                       @foreach($profile->getImages as $row)
                                          @if($row->source_type == 'image')
                                             <li>
                                                <img src="{{ imagePath($storage, $row->source) }}" alt="{{ $row->source_type }}">
                                                <button type="button"
                                                   data-id="{{ $row->user_id }}"
                                                   data-source="{{ $row->source }}"
                                                   data-url=""
                                                   class="btn btn-primary remove_image_class"
                                                   id="remove_image" value="add">
                                                   <span class="rmv-img">Remove</span>
                                                </button>
                                             </li>
                                          @elseif ($row->source_type == 'document')
                                             <li>
                                                <iframe
                                                   src="{{ asset('assets/trainer/documents/'.$row->source) }}"
                                                   width="100%" height="500px">
                                                </iframe>
                                                <button type="button"
                                                   data-id=""
                                                   data-source=""
                                                   data-url=""
                                                   class="btn btn-primary remove_image_class"
                                                   id="remove_image" value="add">
                                                   <span class="rmv-img">Remove</span>
                                                </button>
                                             </li>
                                          @endif
                                       @endforeach
                                    @endif
                                 </ul>
                              </div>
                           </div>
                           <div class="tab-pane fade reviews__inr {{ isset(request()->tab) && request()->tab == 'reviews' ? 'show active':'' }}" id="profileInr__tab4" role="tabpanel"
                              aria-labelledby="profileInrTab4">

                              @if(count($reviews) > 0)
                              @foreach($reviews as $row)
                              @if($row->status == 'approved')
                              <div class="card card-widget widget-user-2">
                                 <div class="widget-user-header">
                                    <div class="widget-user-image">
                                       @if(isset($row->traineeNames[0]->profile_image))
                                       <img class="img-circle elevation-2"
                                          src="{{ asset($storage.$row->traineeNames[0]->profile_image) }}"
                                          alt="User Avatar">
                                       @else
                                       <img class="img-circle elevation-2"
                                          src="{{ asset('assets/trainee/images/default-user.png') }}"
                                          alt="User Avatar">
                                       @endif
                                    </div>
                                    <h3 class="widget-user-username">{{$row->traineeNames[0]->name}}
                                       <span
                                          class="date">{{date('F j, Y', strtotime($row->created_at))}}</span>
                                    </h3>
                                    <span class="starrating-area star-{{$row->rating}}">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    </span>
                                    <h5 class="widget-user-desc">{{$row->comments}}</h5>
                                 </div>
                              </div>
                              @endif
                              @endforeach
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="detail__inner col-md-3">
                     <h5>Hourly Rate(Plus Applicable Sales Tax)</h5>
                     <ul>
                        @if(isset($rates->one_on_1_training_charge) && isset($rates_for_admin->one_on_1_training_charge) )
                        <li>1 - on - 1 Sessions : ${{$rates->one_on_1_training_charge + $rates_for_admin->one_on_1_training_charge}}/hr</li>
                        {{-- <li>1 - on - 1 Sessions : ${{$rates->one_on_1_training_charge +($rates->one_on_1_training_charge*config('constants.rates.sales_tax'))/100 }}/hr</li> --}}
                       
                        @else
                        <li>1 - on - 1 Sessions : $5/hr (default)</li>
                        @endif
                        @if(isset($rates->two_on_1_training_charge) && isset($rates_for_admin->two_on_1_training_charge))
                        <li>2 - on - 1 Sessions : ${{$rates->two_on_1_training_charge +$rates_for_admin->two_on_1_training_charge}}/hr</li>
                        {{-- <li>2 - on - 1 Sessions : ${{$rates->two_on_1_training_charge +($rates->two_on_1_training_charge*config('constants.rates.sales_tax'))/100 }}/hr</li> --}}
                        @else
                        <li>2 - on - 1 Sessions : $10/hr (default)</li>
                        @endif
                        <li class="last">Applicable {{config('constants.rates.sales_tax') }}% Sales Tax</li>
                     </ul>
                     @if(isset($profile->getAddress))
                     <?php
                        $training_session = $profile->getAddress->training_session;
                        //                                    dd('training_session'.$training_session);
                        $training_session = (explode(",", $training_session));
                        $training_session_check = '';
                        if (isset($training_session[1])) {
                            $training_session_check = $training_session[1];
                        } else {
                        }

                        ?>
                     <div class="form-group clearfix" id="trainingPref">
                        <h5>Training Preferences <span style="color: red">*</span></h5>
                        <div class="icheck-primary d-inline">
                           @if($training_session[0] == '1 on 1' || $training_session_check == '1 on 1')
                           <input type="checkbox" class="training_sessionButton" id="session"
                              value="1 on 1" name="training_session" checked
                              onchange="validate()">
                           @else
                           <input type="checkbox" id="session" class="training_sessionButton"
                              value="1 on 1" name="training_session" onchange="validate()">
                           @endif
                           <label for="radioPrimary1">1 on 1</label>
                        </div>
                        <div class="icheck-primary d-inline">
                           @if($training_session[0] == '2 on 1' || $training_session_check == '2 on 1')
                           <input type="checkbox" id="session1" class="training_sessionButton"
                              value="2 on 1" name="training_session1" onchange="validate()"
                              checked>
                           @else
                           <input type="checkbox" id="session1" class="training_sessionButton"
                              value="2 on 1" name="training_session1" onchange="validate()">
                           @endif
                           <label for="radioPrimary2">2 on 1</label>
                        </div>
                     </div>
                     @endif
                     <div id="training_session_erorr"></div>
                     <div class="form-group clearfix">
                        <h5>Location Preferences <span style="color: red">*</span></h5>
                        @if(isset($profile->getAddress))
                           @php
                              $locationsArr = explode(",", $profile->getAddress->location)
                           @endphp
                           <div class="icheck-primary d-inline">
                              <input type="checkbox" @if(in_array('myLocation', $locationsArr)){{ "checked" }}@endif id="location" class="locationButton" name="location" value="myLocation"  onchange="validate()">
                              <label for="radioPrimaryC1">My Location</label>
                           </div>
                           <div class="icheck-primary d-inline">
                              <input type="checkbox" @if(in_array('clientlocation', $locationsArr)){{ "checked" }}@endif id="location1" class="locationButton" name="location1" value="clientlocation" onchange="validate()">
                              <label for="radioPrimaryC2">Client Location</label>
                           </div>
                        @endif
                     </div>
                     <div id="location_erorr"></div>
                     <div class="main__actions pb-4 text-right">
                        <button class="btn btn-primary" id="update_profile">Update Profile</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="tab-pane main__password__detail fade {{ in_array(request()->tab,['change-password']) ? 'active show':'' }}" id="profileMain__tab2" role="tabpanel"
            aria-labelledby="profileMainTab2">
            <div id="passwordError" class="passwordError"></div>
            <form id="login-form-s" name="login-form-s" class="form">
               <div class="row m-0">
                  <div class="col-md-3 p-0">
                     <div class="form-group">
                        <label>Password<span class="text-danger">*</span> </label>
                        <input type="password" class="form-control" name="oldPass" id="oldPass" value=""
                           placeholder="Enter your old password" required>
                        <span toggle="#oldPass"
                           class="fa fa-fw fa-eye field-icon toggle-password"></span>
                     </div>
                     <div class="form-group">
                        <label>New Password<span class="text-danger">*</span> </label>
                        <input type="password" class="form-control" name="newPass" id="newPass" value=""
                           placeholder="atleast 8 characters" required>
                        <span toggle="#newPass"
                           class="fa fa-fw fa-eye field-icon toggle-password"></span>
                     </div>
                     <div class="form-group">
                        <label>Confirm Password<span class="text-danger">*</span> </label>
                        <input type="password" class="form-control" name="confirmPass" id="confirmPass"
                           value="" placeholder="atleast 8 characters" required>
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
         <div class="tab-pane main__documents__detail  fade {{ in_array(request()->tab,['documents']) ? 'active show':'' }}" id="profileMain__tab3" role="tabpanel"
            aria-labelledby="profileMainTab3">
            <div class="upload__listing">
               <div class="modal fade" id="uploadFiles" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="uploadFilesLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">



<div id="status"></div>
                           <div id="Documentserrors"></div>
                           <div id="errors-upload"></div>
                           <div class="col-md-12">
                              <div class="text-center">
                                 <h4>Upload your files</h4>
                                 <div class="upload-area">
                                    <i class="icon material-icons">photo_library</i>
                                    <h6>Drag your files here</h6>
                                    <span>Only JPG/PNG/PDF with max size 1 MB</span>
                                    <input id="fileUpload" accept="image/png,image/jpg,image/jpeg,.pdf" type="file" multiple name="document" onChange="fileUploadFunc(this)" class="documents-input"/>
                                 </div>
                              </div>
                              <h6>Uploaded files</h6>
                              <div class="well uploadedFiles">
                                  <p class="text-center text-muted">No File choosen</p>
                              </div>
                              <div class="progress-area" data-visiable="true" id="progressArea">
                                 <div class="d-flex col-12 p-0">
                                    <div class="percent btn ml-auto" id="counter">0%</div>
                                 </div>
                                 <div class="d-flex col-12 p-0">
                                    <div class="progress" style="height: 20px; width: 100%">
                                        <div class="progress-bar bar" id="progressBar"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-outline-primary" data-dismiss="modal">CANCEL</button>
                           <button type="button" class="btn btn-primary" onclick="updateDocument(this);">SAVE</button>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="document__actions col-md-12 mb-4">
                  <div class="row">
                    @if (count($documents) > 0)
                        <span class="btn pl-0">You have {{ count($documents) }} documents</span>
                    @endif
                     <button type="button" class="btn btn-xs btn-primary ml-auto" data-toggle="modal" data-target="#uploadFiles">
                     <i class="icon material-icons small">file_upload</i> Upload
                     </button>
                  </div>
               </div>
               @if (count($documents) <= 0)
                   <div class="alert trainer-not-found d-flex align-items-center justify-content-center text-muted"> <i class="fa fa-desktop"></i> &nbsp; No documents found</div>
               @endif
               <div class="document-area row" id="gallery-container">

                  @foreach ($documents as $key => $doc)
                    @if($doc->source_type == 'document')
                        <a data-lg-size="1400-1400" class="gallery-item doc-link col-md-3" data-iframe="true" data-src="{{ asset($storage.$doc->source) }}">
                           <iframe class="g-open" src="{{ asset($storage.$doc->source) }}" frameborder="0"></iframe>
                           <div class="docbox__cont">
                              <div class="img-wrap">
                                 <span><div class="fa fa-eye g-fa-eye"></div></span>
                                 <img src="{{asset('assets/trainer/images/icons/'.file_extension($doc->source).'.png')}}">
                              </div>
                              <span class="text get-text">{{ (!empty($doc->document_type))? $doc->document_type: 'Training Certificate' }}</span>
                              <div class="btn doc-3dots text-white"><i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                 <div class="edit-del">
                                    <input type="text" class="inp-edit" id="inp-edit{{ $doc->id }}"  value="{{ $doc->document_type }}">
                                    <span><i class="fa fa-save" onclick="saveTitle('inp-edit{{ $doc->id }}')"></i></span>
                                    <span class="removeDoc" data-id="{{ $doc->id }}"><i class="fa fa-trash"></i></span>
                                    <span class="close-edit-del"><i class="fa fa-times"></i></span>
                                 </div>
                              </div>
                           </div>
                        </a>
                    @elseif($doc->source_type == 'image')
                        <a data-lg-size="1400-1400" class="gallery-item col-md-3" data-src="{{ imagePath($storage, $doc->source) }}">
                           <img class="img-fluid gi-img g-open update-img-alt" src="{{ imagePath($storage, $doc->source) }}" alt="{{ $doc->document_type  }}">
                           <div class="docbox__cont">
                              <div class="img-wrap">
                                 <i class="fa fa-eye g-fa-eye"></i>
                                 <img src="{{asset('assets/trainer/images/icons/'.file_extension($doc->source).'.png')}}">
                              </div>
                              <span class="text get-text">{{ (!empty($doc->document_type))? $doc->document_type: 'Training Certificate' }}</span>
                              <div class="btn doc-3dots text-white"><i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                 <div class="edit-del">
                                    <input type="text" class="inp-edit" id="inp-edit{{ $doc->id }}" value="{{ $doc->document_type }}">
                                    <span><i class="fa fa-save"  onclick="saveTitle('inp-edit{{ $doc->id }}')"></i></span>
                                    <span class="removeDoc" data-id="{{ $doc->id }}"><i class="fa fa-trash"></i></span>
                                    <span class="close-edit-del"><i class="fa fa-times"></i></span>
                                 </div>
                              </div>
                           </div>
                        </a>
                    @endif
                  @endforeach
               </div>
               </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
{{-- <div class="modal modal-file-pond fade" id="modal-uploadFilePond">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="upload__filepond">
               <h4>Upload your files</h4>
               <input type="file" name="documents[]" class="my-pond" id="filepond00770"/>
            </div>
            <div class="actions">
               <button class="btn btn-primary-o mr-3" data-dismiss="modal">CANCEL</button>
               <button class="btn btn-primary" id="documentsUpdate">SAVE</button>
            </div>
         </div>
      </div>
   </div>
</div> --}}

<style>
   .errorRadio {
   color: red;
   position: absolute;
   font-size: 11px;
   top: -1px;
   left: 133px;
   font-weight: 500;
   }
   .errorRadio2 {
   top: 62px;
   }
   div#trainingPref {
   position: relative;
   margin-top: 40px;
   }
</style>


@endsection

@push('scripts')


<script>

   function fileUploadFunc (e) {

      var html = '<ul class="list-group list-group-flush">'
      for (let index = 0; index < e.files.length; index++) {
         let name = e.files[index].name;
         html += '<li class="list-group-item" style="border: 1px solid #dfdfdf;">';
         html += '<div class="filename">';
         html += '<strong>'+(index+1)+' :</strong> '+name;
         html += '</div>';
         html += '<div class="caption-field">';
         html += '<input class="form-control captions" placeholder="Document name" name="file_name['+index+']">';
         html += '</div>';
         html += '</li>';
      }
      html += '</ul>'

      $('.uploadedFiles').empty().html(html);


      console.log(e.files)
   }

   $('.removeDoc').on("click", function () {

      var document_id = $(this).data("id")
      alertify.confirm('Confirmation', 'Are you sure you want to delete document', function() {

            $.ajax({
               'url': "{{ route('document-delete', ['']) }}/"+document_id,
               'type': "DELETE",
               'Content-Type': 'application/json',
               'beforeSend': function () {
                  console.log('loading...')
               }
            }).done(function (response) {
               alertify.success(response.message)

               setTimeout(() => {
                  window.location.reload();
               }, 3000)

            }).catch(function (error) {
               console.log(error)
            })
         },
         function() {
            // alertify.error('Cancel')
         }
      );

   })

   $('.removeImg').on("click", function () {

      var image_id = $(this).data("id")

      alertify.confirm('Confirmation', 'Are you sure you want to delete document', function() {

               $.ajax({
                  'url': "{{ route('image-delete', ['']) }}/"+image_id,
                  'type': "DELETE",
                  'Content-Type': 'application/json',
                  'beforeSend': function () {
                     console.log('loading...')
                  }
               }).done(function (response) {

                  alertify.success(response.message)
                  setTimeout(() => {
                     window.location.reload();
                  }, 2000)
               }).catch(function (error) {
                  console.log(error)
               })
            },
            function() {
               // alertify.error('Cancel')
            }
         );
   })




    $(".remove_image_class").click(function (e) {
        var url = $(this).attr("data-url");
        var user_id = $(this).attr("data-id");
        var user_source = $(this).attr("data-source");

        e.preventDefault();

        var formData = {
            user_id: user_id,
            user_source: user_source,
          };

          var _this = $(this);
        $.ajax({
            type: 'POST',
            url: "{{route('removeTrainerImages')}}",
            data: formData,
            dataType: 'html',
            success: function (response) {
                _this.closest('li').remove();
                  alertify.success(response);
            },
            error: function (response) {
                  alertify.error(response);
            },
        });
    });
        function validate() {
            $("#profile-form-s").valid();
        }
        function pushState(state){
           history.pushState(null, null, '?tab='+state);
        }



        $(document).ready(function () {


            $("#profile-form-s").validate({
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
                    location: {
                        required: function (element) {
                            if (!$("#location1").is(':checked')) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    },
                    location1: {
                        required: function (element) {
                            if (!$("#location").is(':checked')) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    },
                    training_session: {
                        required: function (element) {
                            if (!$("#session1").is(':checked')) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    },
                    training_session1: {
                        required: function (element) {
                            if (!$("#session").is(':checked')) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    },
                },
                errorPlacement: function (error, element) {
                    if (element.attr("name") == "location" || element.attr("name") == "location1") {
                        $('#location_erorr').html(error)
                    } else if (element.attr("name") == "training_session" || element.attr("name") == "training_session1") {
                        $('#training_session_erorr').html(error)
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function (form) {
                    let formData = new FormData();
                    $("form input").each(function (i) {
                        formData.append($(this).attr("name"), $(this).val());
                    });
                    let yourArray = [];
                    jQuery("input:checkbox[name=timeSlot]:checked").each(function () {
                        yourArray.push($(this).val());
                    });

                    formData.append('timeSlot', yourArray);
                    var country = document.getElementById("country").value;
                    formData.append('country', country);

                    var about = document.getElementById("about").value;
                    formData.append('about', about);
                    var training_session = $('input[name="training_session"]:checked').val();
                    var training_session1 = $('input[name="training_session1"]:checked').val();
                    var locationButton = $('input[name="location"]:checked').val();
                    var location1 = $('input[name="location1"]:checked').val();

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

                    console.log(training_session, 'training_session')

                    formData.append('training_session', training_session);
                    formData.append('training_session1', training_session1);
                    formData.append('location', locationButton);
                    formData.append('location1', location1);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route('trainerProfileUpdate') }}',
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (response) {
                            if (response.original.code == 200) {
                                alertify.success('Profile Updated');
                            } else if (response.original.code == 404) {
                                alertify.error(response.original.message);
                            } else {
                                console.log();('failed condition');
                            }
                        }, error: function (response) {
                            console.log();('error');
                        }
                    })
                }
            });




            // jQuery.validator.setDefaults({
            //     debug: true,
            //     success: "valid"
            // });

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
                    $('.passwordError').empty();

                    let formData = new FormData();
                    let oldPass = $('#oldPass').val();
                    let newPass = $('#newPass').val();
                    let confirmPass = $('#confirmPass').val();
                    formData.append('OldPass', oldPass);
                    formData.append('confirmPass', confirmPass);

                    $.ajax({
                        url: '{{ route("trainerPasswordUpdate") }}',
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (response) {
                            alertify.success(response.message);
                        },
                        error: function (response) {
                            alertify.error(response.responseJSON.message);
                        }
                    });
                }
            });
        });


        function updateDocument($event) {
            let fileUpload = document.getElementById('fileUpload');
            let progressArea = document.getElementById('progressArea');
            let progressBar = document.getElementById('progressBar');
            let counter = document.getElementById('counter');
            var input = document.getElementById('fileUpload');
            for (let index = 0; index < input.files.length; index++) {
                const file = input.files[index];
                var filetype = file.type;
                var fileSize = file.size / 1024 / 1024; // in MiB
            }
            var bar = $('.bar');
            var percent = $('.percent');
            var status = $('#errors-upload');
            var typeArray = ['image/png', 'image/jpg', 'image/jpeg', 'application/pdf'];
            var res = typeArray.includes(filetype);
            if (fileSize > 1) {
                let html = ''
                html += '<div class="alert alert-danger alert-dismissable alert-sticky text-center py-3">'
                html += '<div class="cont">'
                html += '<ul>'
                html += '<li>File size exceeds 1 MiB</li>'
                html += '</ul>'
                html += '<div class="alert__icon"><span></span></div>'
                html += '</div>'
                html += '</div>'
                status.empty().html(html)
                $('html, body').animate({scrollTop: 0}, 'slow');
            } else if (res == false) {
                let html = ''
                html += '<div class="alert alert-danger alert-dismissable alert-sticky text-center py-3">'
                html += '<div class="cont">'
                html += '<ul>'
                html += '<li>File Format Not Allowed. Only png,jpeg,jpg allowed</li>'
                html += '</ul>'
                html += '<div class="alert__icon"><span></span></div>'
                html += '</div>'
                html += '</div>'
                status.empty().html(html)
                $('html, body').animate({scrollTop: 0}, 'slow');
            } else {
                let formData = new FormData();
                for (let index = 0; index < input.files.length; index++) {
                    const file = input.files[index];
                    formData.append('file['+index+']', file);
                    formData.append('file_name['+index+']', $('.captions')[index].value);
                }
                formData.append('type', 'document');

                $.ajax({
                    xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = (evt.loaded / evt.total) * 100;
                            //Do something with upload progress here
                            var percentVal = percentComplete + '%';
                            bar.width(percentVal);
                            percent.html(percentVal);
                        }
                    }, false);
                    return xhr;
                    },
                    url: "{{ route('document-upload') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    beforeSend: function() {
                        status.empty();
                        var percentVal = '0%';
                        bar.width(percentVal);
                        percent.html(percentVal);
                    },
                    complete: function(xhr) {
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    },
                    success: function (response) {
                        alertify.success(response.message)
                    }, error: function (response) {
                        status.empty().html('<div class="alert alert-info alert-dismissable alert-sticky text-center py-3"> ' +
                            'Something Went Wrong' + ' </div>');
                    }
                });
            }


        }

        function readURLCoverPhoto(input) {
            var file = input;
            if (/\.(jpe?g|png)$/i.test(file.files[0].name) === false) {
                let html = ''
                html += '<div class="alert alert-danger alert-dismissable alert-sticky text-center py-3">'
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
                var fileSize = file.files[0].size / 1024 / 1024; // in MiB
                if (fileSize > 1) {
                    let html = ''
                    html += '<div class="alert alert-danger alert-dismissable alert-sticky text-center py-3">'
                    html += '<div class="cont">'
                    html += '<ul>'
                    html += '<li>File size exceeds 1 MiB</li>'
                    html += '</ul>'
                    html += '<div class="alert__icon"><span></span></div>'
                    html += '</div>'
                    html += '</div>'
                    $('#errors-cover').html(html)
                    $('html, body').animate({scrollTop: 0}, 'slow');
                } else {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.file-upload-coverphoto').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);

                    let formData = new FormData();
                    formData.append('file', input.files[0]);
                    $.ajax({
                        url: '{{ route('trainerCoverImageUpdate') }}',
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (response) {
                           console.log(response)
                            if (response == 0) {
                                let html = ''
                                html += '<div class="alert alert-success text-center py-3 text-center py-3">'
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

        //Upload ProfilePic
        function readURLProfilePhoto(input) {
            var file = input;
            if (/\.(jpe?g|png)$/i.test(file.files[0].name) === false) {
                let html = ''
                html += '<div class="alert alert-danger alert-dismissable alert-sticky text-center py-3">'
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
                var fileSize = file.files[0].size / 1024 / 1024; // in MiB
                if (fileSize > 1) {
                    let html = ''
                    html += '<div class="alert alert-danger alert-dismissable alert-sticky text-center py-3">'
                    html += '<div class="cont">'
                    html += '<ul>'
                    html += '<li>File size exceeds 1 MiB</li>'
                    html += '</ul>'
                    html += '<div class="alert__icon"><span></span></div>'
                    html += '</div>'
                    html += '</div>'
                    $('#errors-profile').html(html)
                    $('html, body').animate({scrollTop: 0}, 'slow');
                } else {
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
                        url: '{{ route('trainerProfileImageUpdate') }}',
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (response) {
                            if (response == 0) {
                                let html = ''
                                html += '<div class="alert alert-success alert-dismissable alert-sticky text-center py-3">'
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

        //Create Tags
        function specialtiesSave($event) {
           var listvalue = $('#tagInput').val().trim();
           if(listvalue == ''){
              $('#update_profile').attr('disabled',false);
            }else{
               $('#update_profile').attr('disabled',true);
           }
            if (!listvalue) return false;
            if (event.keyCode == 13) {

                if (listvalue == null || listvalue == '') {
                    let html = ''
                    html += '<div class="alert alert-danger alert-dismissable alert-sticky text-center py-3">'
                    html += '<div class="cont">'
                    html += '<ul>'
                    html += '<li>Please write something</li>'
                    html += '</ul>'
                    html += '<div class="alert__icon"><span></span></div>'
                    html += '</div>'
                    html += '</div>'
                    $('#errors').html(html)
                    $('html, body').animate({scrollTop: 0}, 'slow');

                    return false
                }
                $('#tagInput').val("");
                $('.tagslist').append('<li>' + listvalue +
                    '<button type="button" class="btn btn-remove"><i class="fas fa-times-circle"></i></button></li>');
                let formData = new FormData();
                formData.append('specialties', listvalue);
                formData.append('type', 'specialties');

                $.ajax({
                    url: '{{ route('trainerProfileUpdate') }}',
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (response) {
                     $('#update_profile').attr('disabled',false);
                        if (response == 0) {
                            let html = ''
                            html += '<div class="alert alert-success alert-dismissable alert-sticky text-center py-3">'
                            html += '<div class="cont">'
                            html += '<ul>'
                            html += '<li>Something went wrong Please reload page and try again</li>'
                            html += '</ul>'
                            html += '<div class="alert__icon"><span></span></div>'
                            html += '</div>'
                            html += '</div>'
                            $('#errors').html(html)
                            $('html, body').animate({scrollTop: 0}, 'slow');
                        } else {
                            // window.location.reload();
                        }
                    }
                });
            } else {
                event.preventDefault();
                console.log($event);
                return false;
            }

        }

        //Remove Tags
        $('.tagslist').on('click', '.btn-remove', function (e) {
            $(this).parent().remove();
            let formData = new FormData();
            formData.append('specialties', $(this).attr('data-name'));
            formData.append('type', 'removeSpecialties');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('trainerProfileUpdate') }}',
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (response) {
                    if (response == 0) {
                        let html = ''
                        html += '<div class="alert alert-danger alert-dismissable alert-sticky text-center py-3">'
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
                }
            });
        });

        //Upload Multiple images
        $('.image_response').empty();

        setTimeout(function () {
            $(".image_response").fadeOut(1500);
        }, 5000)

        function readURLGalleryPhoto(input) {


         //   var reader = new FileReader();
         //   reader.onload = function (e) {
         //      var img = '<img src="' + e.target.result + '"' + '/>'
         //      console.log(img);
         //      $('.photo__gallery ul').append('<li>' + img + '</li>');
         //    };
         //    reader.readAsDataURL(input.files[0]);

            let formData = new FormData();
            formData.append('file[]', input.files[0]);
            formData.append('type', 'image');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route("trainerProfileUpdate") }}',
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (response) {
                    window.location.reload();
                },
                error: function (response) {
                    $('.image_response').append('<div class="alert alert-info text-center py-3">' + response + '</div>');
                }
            });
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



        function initialize() {
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());
                $("#lat_area").removeClass("d-none");
                $("#long_area").removeClass("d-none");
            });
        }
        $(document).ready(function(){
         $('.doc-3dots').click(function(){
            event.stopPropagation();
            $('.edit-del', this).toggleClass('show-flex');
         });
         $('.close-edit-del').click(function(){
            event.stopPropagation();
            $(this).closest('.edit-del').toggleClass('show-flex');
         });
         $('.edit-del').click(function(){
            event.stopPropagation();
            //$('.edit-del', this).toggle();
         });
         $('.g-fa-eye').click(function(){
            $(this).closest('.gallery-item').find(".g-open").click();
         });

        });
        function saveTitle(id) {

            var val = $("#"+id).val();

           $("#"+id).closest('.docbox__cont').find('.get-text').html(val);
           let image_id = $("#"+id).closest('.edit-del').find('.removeDoc').data('id');

           var jsObj = { 'caption': val }

           $.ajax({
              url: "{{ route('edit-caption', ['']) }}/"+image_id,
              type: 'PUT',
              data: jsObj
           }).done(function (response) {
               $("img.update-img-alt").attr('alt', val)
               $('.edit-del').removeClass('show-flex');
               alertify.success(response.message)
           }).catch(function (error) {
              console.log(error)
           })

        };

    </script>



<script type="module">
import lightGallery from "https://cdn.skypack.dev/lightgallery@2.0.0-beta.4";
// import lgZoom from "https://cdn.skypack.dev/lightgallery@2.0.0-beta.4/plugins/zoom";

const $galleryContainer = document.getElementById("gallery-container");


lightGallery($galleryContainer, {
//   speed: 500,
//   controls: true,
//   plugins: [lgZoom]
});

// lightGallery(document.getElementById('open-website'), {
//     selector: 'this'
// });
</script>

@endpush
