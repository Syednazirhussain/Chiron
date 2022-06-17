@extends('trainee.layouts.app')
@section('title', 'Trainer Profile')

@section('content')

    <div class="trainer__profile__panel panel__style">
        <div class="cover-photo">
            <img src="{{ asset('assets/trainee/images/profile/cover.png') }}" alt="coverphoto">
        </div>
        <div class="trainer__desc__wrapper row">
            <div class="trainer__info col-md-3">
                <div class="profile-pic">
                    @if($trainer->profile_image)
                        <img src="{{ asset($storage.$trainer->profile_image) }}" alt="">
                    @else
                        <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                @endif
                <!-- <img src="{{ asset('assets/trainee/images/profile/profile.png') }}" alt="Profile Photo"> -->
                </div>
                <h3>{{$trainer->name}}</h3>
                <h4>{{$trainer->email}}</h4>
                <p>Joined on {{date('d/m/Y', strtotime($trainer->created_at))}}</p>
{{--                <h5><img class="mr-1" src="{{ asset('assets/trainee/images/icons/verified.png') }}" alt="">30 Verified--}}
{{--                    Sessions</h5>--}}
                
                <div class="social__link">
                    <ul>
                        @if(isset($trainer->getProfile))
                            <li><a target="__blank" href="{{$trainer->getProfile->insta}}"><i
                                        class="fab fa-instagram"></i></a>
                            </li>
                            <li><a target="__blank" href="{{$trainer->getProfile->twitter}}"><i
                                        class="fab fa-twitter"></i></a>
                            </li>
                            <li><a target="__blank" href="{{$trainer->getProfile->facebook}}"><i
                                        class="fab fa-facebook-f"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="trainer__details col-md-5">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="trainer-profile-tab1-tab" data-toggle="pill"
                           href="#trainer-profile-tab1" role="tab" aria-controls="trainer-profile-tab1"
                           aria-selected="true">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="trainer-profile-tab2-tab" data-toggle="pill"
                           href="#trainer-profile-tab2"
                           role="tab" aria-controls="trainer-profile-tab2" aria-selected="false">Availability</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="trainer-profile-tab3-tab" data-toggle="pill"
                           href="#trainer-profile-tab3"
                           role="tab" aria-controls="trainer-profile-tab3" aria-selected="false">Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="trainer-profile-tab4-tab" data-toggle="pill"
                           href="#trainer-profile-tab4"
                           role="tab" aria-controls="trainer-profile-tab4" aria-selected="false">Reviews</a>
                    </li>
                </ul>

                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-two-tabContent">
                        <div class="tab-pane fade show active" id="trainer-profile-tab1" role="tabpanel"
                             aria-labelledby="trainer-profile-tab1-tab">
                            @if(isset($trainer->getProfile))
                                <div class="aboutme__tab">
                                    <p>{{$trainer->getProfile->about}}</p>
                                    <div class="training__specialties">
                                        <h4>Training Specialties</h4>
                                        @if(isset($trainer->getProfile) && isset($trainer->getProfile->specialties))
                                            <?php $data = json_decode($trainer->getProfile->specialties); ?>
                                            <ul>
                                                @foreach($data as $row)
                                                    <li>{{$row}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <div class="session__type">
                                            <div class="mb-4"> <strong> Training Options</strong> </div>
                                            
                                            @if(isset($trainer->getAddress))
                                            @php
                                            $sessions =  explode(',',$trainer->getAddress->training_session);
                                           @endphp
                                           
                                           <ul>
                                                  @if(in_array('1 on 1',$sessions))
                                                  <li>
                                                    1 on 1  
                                                </li>
                                                 
                                                  @endif
                                        
                                                  @if(in_array('2 on 1',$sessions))
                                                  <li>
                                                      2 on 1
                                                    </li>
                                        
                                                  @endif
                                              
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="trainer-profile-tab2" role="tabpanel"
                             aria-labelledby="trainer-profile-tab2-tab">
                            {{-- @if(isset($trainer->getProfile))
                            @if(isset($trainer->getProfile->getSessionTimings))
                            <div class="availibility__tab">
                                <table class="table">
                                    <tbody>
                                        <?php $days = ['SU' => 'Sunday', 'MO' => 'Monday', 'TU' => 'Tuesday', 'WE' => 'Wednesday', 'TH' => 'Thursday', 'FR' => 'Friday', 'SA' => 'Saturday']; ?>
                                        @foreach($trainer->getProfile->getSessionTimings as $row)
                                        <tr>
                                            <td>{{$days[$row->day]}}</td>
                            <td>{{$row->time}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                        @endif
                        @endif --}}
                            {{--                        td available-time    , td available-day --}}
                            <div class="availibility-table event-none">
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
                                @if(isset($times))
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
                                @else
                                    time Not Set Yet
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="trainer-profile-tab3" role="tabpanel"
                             aria-labelledby="trainer-profile-tab3-tab">
                            @if(isset($trainer->getImages))
                                <div class="photos__tab">
                                    <ul>
                                        @foreach($trainer->getImages as $row)
                                            @if($row->source_type == 'image')
                                                <li><img src="{{ asset('assets/trainer/images/'.$row->source) }}"
                                                         alt=""></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="tab-pane fade" id="trainer-profile-tab4" role="tabpanel"
                             aria-labelledby="trainer-profile-tab4-tab">
                            <div class="reviews__tab">
                                <div class="card card-widget add-new-review widget-user-2">
                                    <div class="widget-user-header">
                                        <div class="widget-user-image">
                                            @if(Auth::user()->profile_image)
                                                <img class="img-circle elevation-2"
                                                     src="{{ asset($storage.Auth::user()->profile_image) }}"
                                                     alt="">
                                            @else
                                                <img class="img-circle elevation-2"
                                                     src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                                            @endif
                                        </div>
                                        <form class="personal__form w-100" action="{{ route('reviewPosted') }}"
                                              method="post">
                                            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="trainer_id" value="{{request()->route('id')}}">
                                            <input type="hidden" id="ratingValInput" name="ratingValInput" value="">
                                            <h3 class="widget-user-username">{{Auth::user()->name}}
                                                <div class='rating-stars text-center'>
                                                    <ul id='stars'>
                                                        <li class='star' title='Poor' data-value='1'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                        <li class='star' title='Fair' data-value='2'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                        <li class='star' title='Good' data-value='3'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                        <li class='star' title='Excellent' data-value='4'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                        <li class='star' title='WOW!!!' data-value='5'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </h3>
                                            <div class="form-group">
                                                <input type="text" name="comments" class="form-control"
                                                       placeholder="Type your review here...">
                                                <button class="btn btn-review">
                                                    <img src="{{ asset('assets/trainee/images/icons/send.png') }}"/>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @if(count($reviews) > 0)
                                    @foreach($reviews as $row)
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
                                                <h3 class="widget-user-username">{{$row->traineeNames[0]->name}} <span
                                                        class="date">{{date('j F, Y', strtotime($row->created_at));}}</span>
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
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="trainer__location col-md-4">
                <div class="hourly__rates">

                    <h4>Hourly Rates
                    </h4><span class="price">
                            @if(isset($trainer->getAddress))
                            
                                @if(isset($trainer->getAddress->getRatesForTrainer))
                                @php
                                $sessions =  explode(',',$trainer->getAddress->training_session);
                                @endphp
                                

                                    {{-- 1 on 1 session  ${{($trainer->getAddress->getRatesForTrainer->one_on_1_training_charge)}}
                                    / hr
                                    <br>
                                    2 on 1 session  ${{$trainer->getAddress->getRatesForTrainer->two_on_1_training_charge}}  /
                                    hr --}}
                                    @if(in_array('1 on 1',$sessions))
                                    <span class="price mx-4">1 on 1 session  $ <strong>{{ get_price_by_location($trainer,'one_on_1_training_charge',true,true) }}</strong> /hr</span>
                                
                                    <br>
                                    @endif
                                    
                                    @if(in_array('2 on 1',$sessions))
                                    <span class="price2">    2 on 1 session  $
                                        <strong>{{ get_price_by_location($trainer,'two_on_1_training_charge',true,true) }}</strong> /hr
                                        </span>
                                    @endif
                                    <br/>
                                    

                                @endif
                            @endif
                    </span>
                    <span class="tax"> Plus Applicable {{config('constants.rates.sales_tax') }}% Sales Tax </span>
                    <br><br>
                    <a href="{{ route('appointment', [ $trainer->id,'#appointmentTab1' ]) }}"
                       class="btn btn-primary mb-3">Book
                        With {{$trainer->name}}</a>
                    <a href="{{ route('appointment', [ $trainer->id,'#appointmentTab2' ]) }}" class="btn btn-primary-o">Message
                        {{$trainer->name}}</a>
                </div>
                <div class="map__location">
                    {{-- <img src="{{ asset('assets/trainee/images/map.png') }}" alt=""> --}}
                </div>
                <div class="personal__gym">
                    <h4>Personal Gym</h4>
                    @if(isset($trainer->getAddress->getCountry))
                        {{-- <p><img src="{{ asset('assets/trainee/images/icons/map-location.png') }}" alt=""> --}}
                           <p> 
                            <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBWIQCZ1lQxoEa8lDEthzywnKPPwjnDvwA
                            &q={{$trainer->getAddress->getCountry->name}}" height="200" style="border:0;width:100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
                           
                            {{-- {{$trainer->getAddress->postal_code}} --}}   {{$trainer->getAddress->address}},
                            {{$trainer->getAddress->getCountry->name}}</p>
                @endif
                <!-- <h5><img src="{{ asset('assets/trainee/images/icons/car.png') }}" alt=""> I Can Travel Within 15 Miles Of Zip Code N0H 2C0</h5> -->
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars li').on('mouseover', function () {
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function (e) {
                    if (e < onStar) {
                        $(this).addClass('hover');
                    } else {
                        $(this).removeClass('hover');
                    }
                });

            }).on('mouseout', function () {
                $(this).parent().children('li.star').each(function (e) {
                    $(this).removeClass('hover');
                });
            });

            /* 2. Action to perform on click */
            $('#stars li').on('click', function () {
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star');

                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }

                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }

                // JUST RESPONSE (Not needed)
                var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                $("#ratingValInput").val(ratingValue);
            });
        });

    </script>
@endpush
