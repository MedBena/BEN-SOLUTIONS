<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="26">
            </span>
        </a>
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="26">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">                 
                <li class="nav-item">
                    <a href="{{url('/home')}}" class="nav-link menu-link"> <i class="bi bi-speedometer2"></i> <span data-key="t-dashboard">Dashboard</span> </a>
                </li>   
                @if (\Request::get('location') === "home")
                    @include('layout.menu.menu-home')
                @elseif(\Request::get('location') === "settings")
                    @include('layout.menu.menu-settings')
                @endif

                {{-- <li class="menu-title"><span data-key="t-menu">Menu</span></li> --}}
                

                {{-- <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i class="bi bi-hdd-stack"></i> <span data-key="t-widgets">Widgets</span>
                    </a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="bi bi-journal-medical"></i> <span data-key="t-pages">Users</span>
                    </a>
                    
                    <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{url('/users')}}" class="nav-link" data-key="t-team"> List </a>
                            </li>
                        </ul>
                    </div>
                </li>
                --}}
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>