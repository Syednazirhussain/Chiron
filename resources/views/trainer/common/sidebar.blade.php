<aside class="main-sidebar">
    <!-- Brand Logo -->
    <a class="brand-link user-panel" href="{{route('/')}}">
        <img src="{{asset('assets/trainer/images/logo.png')}}" alt="Logo">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

{

                @if(auth()->user())


                <li class="nav-item">
                    <a href="{{ route('trainer_index') }}" class="nav-link">
                        <i class="icons">
                            <svg id="dashboard-24px_1_" data-name="dashboard-24px (1)"
                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path id="Path_6611" data-name="Path 6611" d="M0,0H24V24H0Z" fill="none"/>
                                <path class="colored" id="Path_6612" data-name="Path 6612"
                                      d="M3,13h8V3H3Zm0,8h8V15H3Zm10,0h8V11H13ZM13,3V9h8V3Z" fill="#fff"/>
                            </svg>
                        </i> <span>My Dashboard</span>
                    </a>
                </li>

                    <li class="nav-item">
                        <a href="{{ route('upcoming_session') }}" class="nav-link">
                            <i class="icons">
                                <svg id="timeline_black_24dp" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24">
                                    <g id="Group_2325" data-name="Group 2325">
                                        <rect id="Rectangle_1695" data-name="Rectangle 1695" width="24" height="24"
                                              fill="none"/>
                                    </g>
                                    <g id="Group_2328" data-name="Group 2328">
                                        <g id="Group_2327" data-name="Group 2327">
                                            <g id="Group_2326" data-name="Group 2326">
                                                <path class="colored" id="Path_10702" data-name="Path 10702"
                                                      d="M23,8a2.006,2.006,0,0,1-2,2,1.7,1.7,0,0,1-.51-.07l-3.56,3.55A1.766,1.766,0,0,1,17,14a2,2,0,0,1-4,0,1.766,1.766,0,0,1,.07-.52l-2.55-2.55a1.966,1.966,0,0,1-1.04,0L4.93,15.49A1.7,1.7,0,0,1,5,16a2,2,0,1,1-2-2,1.7,1.7,0,0,1,.51.07L8.07,9.52A1.766,1.766,0,0,1,8,9a2,2,0,0,1,4,0,1.766,1.766,0,0,1-.07.52l2.55,2.55a1.966,1.966,0,0,1,1.04,0l3.55-3.56A1.7,1.7,0,0,1,19,8a2,2,0,0,1,4,0Z"
                                                      fill="#eef0f2"/>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </i> <span>Upcoming Sessions</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('previous_session') }}" class="nav-link">
                            <i class="icons">
                                <svg id="flag_black_24dp" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24">
                                    <path id="Path_10703" data-name="Path 10703" d="M0,0H24V24H0Z" fill="none"/>
                                    <g id="calendar" transform="translate(2.294 1.54)">
                                        <path class="colored" id="Path_10717" data-name="Path 10717"
                                              d="M15.905,4.357a1.059,1.059,0,0,0-1.07-1.047h-.267v.786a.529.529,0,0,1-.535.524H13.5a.529.529,0,0,0,.535-.524V2.524a.535.535,0,0,0-1.07,0v.786H11.627v.786a.529.529,0,0,1-.535.524h-.535a.529.529,0,0,0,.535-.524V2.524a.535.535,0,0,0-1.07,0v.786h-1.6v.786a.529.529,0,0,1-.535.524H7.348a.529.529,0,0,0,.535-.524V2.524a.535.535,0,0,0-1.07,0v.786H5.476v.786a.529.529,0,0,1-.535.524H4.407a.529.529,0,0,0,.535-.524V2.524a.535.535,0,0,0-1.07,0v.786h-.8A1.059,1.059,0,0,0,2,4.357V5.928H15.905Z"
                                              fill="#eef0f2"/>
                                        <path class="colored" id="Path_10718" data-name="Path 10718"
                                              d="M42.88,40a2.88,2.88,0,1,0,2.88,2.88A2.88,2.88,0,0,0,42.88,40Zm0,3.4a.52.52,0,0,1-.19-.037l-.956.765-.327-.409.957-.765a.5.5,0,0,1,.254-.528V40.786h.524v1.644a.522.522,0,0,1-.262.975Z"
                                              transform="translate(-27.761 -27.761)" fill="#eef0f2"/>
                                        <path class="colored" id="Path_10719" data-name="Path 10719"
                                              d="M3.07,28.689h8.824a3.332,3.332,0,0,1-.267-1.309,3.4,3.4,0,0,1,2.139-3.142H12.429V22.666h1.6v1.475a3.493,3.493,0,0,1,1.872-.071V19H2v8.641a1.058,1.058,0,0,0,1.07,1.047Zm9.359-8.9h1.6v1.571h-1.6Zm-2.941,0h1.6v1.571h-1.6Zm0,2.88h1.6v1.571h-1.6Zm0,2.88h1.6v1.571h-1.6ZM6.546,19.786h1.6v1.571h-1.6Zm0,2.88h1.6v1.571h-1.6Zm0,2.88h1.6v1.571h-1.6ZM3.6,19.786h1.6v1.571H3.6Zm0,2.88h1.6v1.571H3.6Zm0,2.88h1.6v1.571H3.6Z"
                                              transform="translate(0 -12.26)" fill="#eef0f2"/>
                                    </g>
                                </svg>
                            </i> <span>Previous Sessions</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('my_trainees')}}" class="nav-link">
                            <i class="icons">
                                <svg id="person_black_24dp" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24">
                                    <path id="Path_10705" data-name="Path 10705" d="M0,0H24V24H0Z" fill="none"/>
                                    <path class="colored" id="Path_10706" data-name="Path 10706"
                                          d="M12,12A4,4,0,1,0,8,8,4,4,0,0,0,12,12Zm0,2c-2.67,0-8,1.34-8,4v2H20V18C20,15.34,14.67,14,12,14Z"
                                          fill="#eef0f2"/>
                                </svg>
                            </i> <span>My Trainees</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('earnings') }}" class="nav-link">
                            <i class="icons">
                                <svg id="payments-24px" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24">
                                    <path id="Path_6404" data-name="Path 6404" d="M0,0H24V24H0Z" fill="none"/>
                                    <path class="colored" id="Path_6405" data-name="Path 6405"
                                          d="M19,14V6a2.006,2.006,0,0,0-2-2H3A2.006,2.006,0,0,0,1,6v8a2.006,2.006,0,0,0,2,2H17A2.006,2.006,0,0,0,19,14Zm-9-1a3,3,0,1,1,3-3A3,3,0,0,1,10,13ZM23,7V18a2.006,2.006,0,0,1-2,2H4V18H21V7Z"
                                          fill="#eef0f2"/>
                                </svg>
                            </i> <span>Earnings</span>
                        </a>
                    </li>
            @endif

            <li class="nav-item">
                <a href="{{ route('setup_account') }}" class="nav-link">
                    <i class="icons">
                        <svg id="payments-24px" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                            <path id="Path_6404" data-name="Path 6404" d="M0,0H24V24H0Z" fill="none"/>
                            <path class="colored" id="Path_6405" data-name="Path 6405"
                                    d="M19,14V6a2.006,2.006,0,0,0-2-2H3A2.006,2.006,0,0,0,1,6v8a2.006,2.006,0,0,0,2,2H17A2.006,2.006,0,0,0,19,14Zm-9-1a3,3,0,1,1,3-3A3,3,0,0,1,10,13ZM23,7V18a2.006,2.006,0,0,1-2,2H4V18H21V7Z"
                                    fill="#eef0f2"/>
                        </svg>
                    </i> <span>Account</span>
                </a>
            </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
