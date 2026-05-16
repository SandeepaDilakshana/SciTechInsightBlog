<header class="top-header-area d-flex align-items-center justify-content-between">
    <div class="left-side-content-area d-flex align-items-center">
        <!-- Mobile Logo -->
        <div class="mobile-logo">
            <a href="index.html"><img src="{{ asset('admin_template/img/core-img/small-logo.png') }}"
                    alt="Mobile Logo"></a>
        </div>

        <!-- Triggers -->
        <div class="flapt-triggers">
            <div class="menu-collasped" id="menuCollasped">
                <i class='bx bx-grid-alt'></i>
            </div>
            <div class="mobile-menu-open" id="mobileMenuOpen">
                <i class='bx bx-grid-alt'></i>
            </div>
        </div>

        <!-- Left Side Nav -->
        <ul class="left-side-navbar d-flex align-items-center">
            {{-- <li class="hide-phone app-search">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="bx bx-search-alt"></span>
            </li> --}}
        </ul>
    </div>

    <div class="right-side-navbar d-flex align-items-center justify-content-end">
        <!-- Mobile Trigger -->
        <div class="right-side-trigger" id="rightSideTrigger">
            <i class='bx bx-menu-alt-right'></i>
        </div>

        <!-- Top Bar Nav -->
        <ul class="right-side-content d-flex align-items-center">


            <li class="nav-item dropdown">

            </li>

            <li class="nav-item dropdown">

            </li>

            <li class="nav-item dropdown">
                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img src="{{ asset(Auth::user()->profile->avatar) }}" alt="Profile">
                </button>

                <div class="dropdown-menu profile dropdown-menu-right">
                    <div class="user-profile-area">
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <i class="bx bx-user font-15" aria-hidden="true"></i> My profile
                        </a>

                        <a href="{{ route('logout') }}" class="dropdown-item"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bx bx-power-off font-15" aria-hidden="true"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
