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

            @if(auth()->user())
                @if($route == 'trainer_index')
                    <h3>Trainer Dashboard</h3>
                @elseif($route == 'my_trainees')
                    <h3>My Trainees</h3>
                @elseif($route == 'traineeSearch')
                    <h3>My Trainees</h3>
                @elseif($route == 'upcoming_session')
                    <h3>Upcoming Sessions</h3>
                @elseif($route == 'previous_session')
                    <h3>Previous Sessions</h3>
                @elseif($route == 'earnings')
                    <h3>Earnings</h3>
                @elseif($route == 'profile')
                    <h3>Profile</h3>
                @endif
            @else
                <b style="color: red"> {{strtoupper('Account is Blocked')}} </b>
            @endif
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <!-- <li class="nav-item dropdown user-notify">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa fa-bell"></i>
            <span class="badge navbar-badge"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header"><span class="latest">2</span> NEW notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item active">
              <span class="icon"><i class="far fa-dot-circle"></i></span> 5 new members joined.
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item active">
              <span class="icon"><i class="far fa-dot-circle"></i></span> Very long description here that may not fit into the page and may cause design problems
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <span class="icon"><i class="far fa-dot-circle"></i></span> You changed your username.
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">View All</a>
          </div>
        </li> -->
        <li class="nav-item dropdown user-menu">
            <a class="nav-link" data-toggle="dropdown" href="javascript:void(0);">
                <span>{{ auth()->user()->name }}</span>
                @if(auth()->user()->profile_image)
                    <img src="{{ asset($storage.auth()->user()->profile_image) }}">
                @else
                    <img src="{{ asset('assets/trainee/images/default-user.png') }}">
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                @if(auth()->user()->deleted != 1)
                    <a href="{{ route('profile') }}" class="dropdown-item">
                        <span class="icon"><i class="fas fa-user"></i></span> My Profile
                    </a>
                @endif
                <a href="{{ route('trainerlogout')}}" target="_self" class="dropdown-item">
                    <span class="icon"><i class="fas fa-sign-out-alt"></i></span> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

