<nav class="navbar navbar-expand-lg header-nav">
    <div class="navbar-header">
        <a id="mobile_btn" href="javascript:void(0);">
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
        </a>
        <a href="{{url('/')}}" class="navbar-brand logo">
            <img src="{{asset('theme/img/logo.png')}}" class="img-fluid" alt="Logo">
        </a>
    </div>
    <div class="main-menu-wrapper">
        <div class="menu-header">
            <a href="{{url('/')}}" class="menu-logo">
                <img src="{{asset('theme/img/logo.png')}}" class="img-fluid" alt="Logo">
            </a>
            <a id="menu_close" class="menu-close" href="javascript:void(0);">
                <i class="fas fa-times"></i>
            </a>
        </div>
        <ul class="main-nav">
            <li class="active">
                <a href="{{url('/')}}">Home</a>
            </li>

            <li>
                <a href="{{route('login.show')}}" target="_blank">Admin</a>
            </li>
            <li>
                <a href="{{route('login.show.mdDocotr')}}" target="_blank">MD</a>
            </li>

            <li>
                <a href="{{route('login.show.seniorMdDocotr')}}" target="_blank">SMD</a>
            </li>
        </ul>
    </div>
    <ul class="nav header-navbar-rht">
        <li class="nav-item">
            <a class="nav-link header-login" href="{{route('login.show.user')}}">login / Signup </a>
        </li>
    </ul>
</nav>
