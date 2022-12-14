<div class="vertical-menu">


    {{-- icon --}}
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="/manager/dashboard" class="logo logo-dark">
            <span class="logo-sm" style="">
                <img src="{{ asset('images/preview.png') }}" alt="" height="40">
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
                    <a href="/manager/dashboard" class="waves-effect">
                        <i class="ri-home-gear-line"></i>
                        <span>Dashboard</span>

                    </a>
                </li>


                <li class="menu-title">Pages</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class='bx bx-package'></i>
                        <span class="badge rounded-pill bg-danger float-end">3</span>
                        <span>Form Package</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href={{ route('packages.create') }}>Add Package</a></li>
                        <li><a href="/manager/packages">Record</a></li>
                        <li><a href="/manager/packageType">Package Type</a></li>
                    </ul>
                </li>


                <li class="menu-title">Components</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class='bx bxs-user-account'></i>
                        <span class="badge rounded-pill bg-danger float-end">2</span>
                        <span>Manage User</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/manager/employeebranch">Branch Employee</a></li>
                        <li><a href="/manager/position">Position</a></li>


                    </ul>
                </li>
                <li>
                    <a href="/manager/tracking" class="waves-effect">
                        <i class='bx bx-search-alt'></i>
                        <span>Tracking</span>
                    </a>
                </li>


                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class='bx bx-list-check' ></i>
                        <span class="badge rounded-pill bg-danger float-end">4</span>
                        <span>Packages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li><a href="/manager/pending">Pending</a></li>
                        <li><a href="/manager/shipped">Shipped</a></li>
                        <li><a href="/manager/received">Received</a></li>
                        <li><a href="/manager/completed">Completed</a></li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="/manager/reports" class="waves-effect">
                        <i class='bx bxs-report' ></i>
                        <span>Reports</span>
                    </a>
                </li> --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
