<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="#" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="#" alt="" height="20">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="#" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="#" alt="" height="20">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            {{-- <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="ri-search-line"></span>
                </div>
            </form> --}}

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="mb-3 m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="ri-fullscreen-line"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                {{-- <button type="button" class="btn header-item noti-icon waves-effect"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-notification-3-line"></i>
                    <span class="noti-dot"></span>
                </button> --}}
                {{-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small"> View All</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="#" class="text-reset notification-item">
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs me-3 mt-1">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="ri-shopping-cart-line"></i>
                                    </span>
                                    <div class="noti-top-icon">
                                        <i class="mdi mdi-heart text-white bg-danger"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 text-truncate">
                                    <h6 class="mt-0 mb-1">Order placed <span class="mb-1 text-muted fw-normal">If
                                            several languages the
                                            grammar</span></h6>
                                    <p class="mb-0 font-size-12"><i class="mdi mdi-clock-outline"></i> 3 min
                                        ago</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="text-reset notification-item">
                            <div class="d-flex align-items-center">
                                <div class="mt-1">
                                    <img src="#"
                                        class="me-3 rounded-circle avatar-xs mt-1" alt="user-pic">
                                    <div class="noti-top-icon">
                                        <i class="mdi mdi-circle text-white bg-success"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 text-truncate">
                                    <h6 class="mt-0 mb-1">James Lemire <span class="mb-1 text-muted fw-normal">It will
                                            seem like simplified
                                            English.</span></h6>
                                    <p class="mb-0 font-size-12"><i class="mdi mdi-clock-outline"></i> 1 hours
                                        ago</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="text-reset notification-item">
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs me-3 mt-1">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="ri-checkbox-circle-line"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 text-truncate">
                                    <h6 class="mt-0 mb-1">Your item is shipped <span
                                            class="mb-1 text-muted fw-normal">If several languages coalesce the
                                            grammar.</span></h6>
                                    <p class="mb-0 font-size-12"><i class="mdi mdi-clock-outline"></i> 3 min
                                        ago</p>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="text-reset notification-item">
                            <div class="d-flex align-items-center">
                                <div class="mt-1">
                                    <img src="#" class="me-3 rounded-circle avatar-xs"
                                        alt="user-pic">
                                    <div class="noti-top-icon">
                                        <i class="mdi mdi-heart text-white bg-danger"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 text-truncate">
                                    <h6 class="mt-0 mb-1">Salena Layfield <span class="mb-1 text-muted fw-normal">As a
                                            skeptical Cambridge friend
                                            of mine occidental.</span></h6>
                                    <p class="mb-0 font-size-12"><i class="mdi mdi-clock-outline"></i> 1 hours
                                        ago</p>
                                </div>
                            </div>
                        </a>

                        <a href="#" class="text-reset notification-item">
                            <div class="d-flex align-items-center">
                                <img src="#" class="me-3 rounded-circle avatar-xs"
                                    alt="user-pic">
                                <div class="flex-grow-1 text-truncate">
                                    <h6 class="mt-0 mb-1">Jonathon Joseph <span
                                            class="mb-1 text-muted fw-normal">Friend of mine occidental.</span>
                                    </h6>
                                    <p class="mb-0 font-size-12"><i class="mdi mdi-clock-outline"></i> 5 min
                                        ago</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top">
                        <div class="d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                                <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>

            <div class="dropdown d-inline-block user-dropdown">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ asset('/storage/images/' . Auth::user()->image) }}"
                        alt="Header Avatar">
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <div class="p-4">
                        <div class="row d-flex justify-content-center align-items-center flex-column">
                            <div class="col-auto">
                                <h5 class="name">
                                    <a href="#">{{ Auth::user()->name }}</a>
                                </h5>

                            </div>
                            <div class="col-auto">
                                 <span class="email">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px; ">
                        <!-- item-->
                        <a href="/editprofilem" class="text-reset notification-item">
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs me-3 mt-1">
                                    <span class="avatar-title bg-soft-primary rounded-circle font-size-16">
                                        <i class="ri-user-line text-primary font-size-16"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 text-truncate">
                                    <h6 class="mb-1">Profile</h6>
                                    <p class="mb-1 font-size-12">Modify your personal details.</p>
                                </div>
                            </div>
                        </a>
                        <!-- item-->
                        {{-- <a href="/changepasswordm" class="text-reset notification-item">
                            <div class="d-flex align-items-center">
                                <div class="avatar-xs me-3 mt-1">
                                    <span class="avatar-title bg-soft-warning rounded-circle font-size-16">
                                        <i class="ri-wallet-2-line text-warning font-size-16"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1 text-truncate">
                                    <h6 class="mb-1">Change Password</h6>
                                    <p class="mb-1 font-size-12">Modify your password.</p>
                                </div>
                            </div>
                        </a> --}}


                    </div>
                    <!-- item-->
                    <div class="account-dropdown__footer">
                        <a class="dropdown-item"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();"><i
                                class="bx bx-power-off"></i><span>Logout</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
