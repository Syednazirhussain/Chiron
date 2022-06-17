<nav class="main-header navbar navbar-expand">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24.09" height="13.398" viewBox="0 0 24.09 13.398">
                    <g id="menu" transform="translate(-0.09 -2)">
                        <path id="Path_10708" data-name="Path 10708"
                              d="M17.086,124.675H1a1,1,0,0,1,0-2.007H17.086a1,1,0,0,1,0,2.007Zm0,0"
                              transform="translate(0.09 -114.973)" fill="#222"/>
                        <path id="Path_10709" data-name="Path 10709"
                              d="M23.086,2.007H1A1,1,0,0,1,1,0H23.086a1,1,0,1,1,0,2.007Zm0,0"
                              transform="translate(0.09 2)" fill="#222"/>
                        <path id="Path_10710" data-name="Path 10710"
                              d="M9.086,247.339H1a1,1,0,0,1,0-2.008H9.086a1,1,0,0,1,0,2.008Zm0,0"
                              transform="translate(0.09 -231.941)" fill="#222"/>
                    </g>
                </svg>
            </a>
        </li>
        <?php $route = Route::currentRouteName(); ?>
        <li class="nav-item d-inline-flex align-items-center ml-3">
            @if($route == 'trainee_index')
                <h3>Dashboard</h3>
            @elseif($route == 'trainer')
                <h3>Trainers</h3>
            @elseif($route == 'trainerSearch')
                <h3>Trainers</h3>
            @elseif($route == 'upcoming_session1')
                <h3>Upcoming Sessions</h3>
            @elseif($route == 'previous_session1')
                <h3>Previous Sessions</h3>
            @elseif($route == 'payment_info')
                <h3>Payment Info</h3>
            @elseif($route == 'trainee_profile')
                <h3>Profile</h3>
            @endif
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <span>{{ auth()->user()->name }}</span>
                @if(auth()->user()->profile_image)
                    <img src="{{ asset($storage.auth()->user()->profile_image) }}">
                @else
                    <img src="{{ asset('assets/trainee/images/default-user.png') }}">
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('trainee_profile') }}" class="dropdown-item">
                    <span class="icon"><i class="fas fa-user"></i></span> My Profile
                </a>
                <a href="{{ route('trineelogout')}}" target="_self" class="dropdown-item">
                    <span class="icon"><i class="fas fa-sign-out-alt"></i></span> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

