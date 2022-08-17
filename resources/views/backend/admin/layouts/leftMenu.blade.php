<div class="vertical-menu">


    {{-- icon --}}
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="/home" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logoDMgo.png') }}" alt="" height="80">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logoDMgo.png') }}" alt="" height="80">
            </span>
        </a>

        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logoDMgo.png') }}" alt="" height="80">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logoDMgo.png') }}" alt="" height="80">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class='bx bxs-dashboard bx-flip-horizontal' style='color:#414040'  ></i>
                        <span class="badge rounded-pill bg-danger float-end">1</span>
                        <span>Dashboard</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/admin">Admin</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class='bx bxs-group bx-flip-horizontal' style='color:#414040' ></i>
                        <span class="badge rounded-pill bg-danger float-end">1</span>
                        <span>Manage User</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/admin/employee">Employee</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class='bx bxs-map-pin bx-flip-horizontal' style='color:#414040' ></i>
                        <span class="badge rounded-pill bg-danger float-end">1</span>
                        <span>Manage Branch</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/admin/branch">Branch</a></li>
                        {{-- <li><a href="/admin/manager">Branch Manager</a></li> --}}
                        <li><a href="/admin/location">Location</a></li>

                    </ul>


                    {{-- <ul class="sub-menu" aria-expanded="false">

                    </ul> --}}
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
