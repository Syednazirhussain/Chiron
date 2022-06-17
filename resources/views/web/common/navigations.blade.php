<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{route('/')}}">
                <img src="{{ asset('assets/web/images/logo.png') }}" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="col justify-content-center navbar-nav check-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroller" href="{{ route('/', [ '#aboutUs' ]) }}">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroller" href="{{ route('/', [ '#howItWork' ]) }}">How it works</a>
                        {{-- <a class="nav-link scroller" href="{{url('/#howItWork')}}">How it works</a> --}}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('faqss') }}">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroller" href="{{ route('/', [ '#contactUs' ]) }}">Contact Us</a>
                    </li>
                </ul>

                @if(Auth::check() == true)

                    @if(Auth::user()->role_id == 1)
                        <div class="col-auto forms-nav me-3">
                            <a href="{{route('home')}}" class="btn btn-default-o">DASHBOARD</a>
                        </div>
                    @endif

                    @if(Auth::user()->role_id == 2)
                        <div class="col-auto forms-nav me-3">
                            <a href="{{route('trainer_index')}}" class="btn btn-default-o">DASHBOARD</a>
                        </div>
                    @endif
                    @if(Auth::user()->role_id == 3)
                        <div class="col-auto forms-nav me-3">
                            <a href="{{route('trainer')}}" class="btn btn-default-o">DASHBOARD</a>
                        </div>
                    @endif
                @else
                    <div class="col-auto forms-nav me-3">
                        <a href="{{ route('accountLogin') }}" class="btn btn-default-o">LOGIN</a>
                    </div>
                    <div class="col-auto forms-nav">
                        <a href="{{ route('accountType') }}" class="btn btn-default-o">SIGNUP</a>
                    </div>
                @endif
            </div>
        </div>
    </nav>
</header>
