<nav>
    <div class="logo">
        <a><img src={{ asset('assets/images/logoDMgo.png') }} alt="" style="width: 150px; height: 100px">
        </a>

        @if (Route::has('login'))

            <div class="hidden d-flex fixed top-0 right-0 px-6 py-4 sm:block" style="margin: 20px 0px 0px 0px">
                {{-- @if (Auth::user()->image)
                    <img class="image rounded-circle" src="{{ asset('/storage/images/' . Auth::user()->image) }}"
                        alt="profile_image" style="width: 50px;height: 50px; padding: 10px; margin: 0px; ">
                @endif --}}
                @auth
                    <li class="nav-item dropdown" style="position:absolute; top:15px; right: 90px; display:flex;">
                        <button onclick="menuToggle()">
                            {{ Auth::user()->name }}
                        </button>
                    </li>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-black-500 dark:text-black-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-black-500 dark:text-black-500"
                            style="margin-left:10px">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <div class="menu">
        <ul>
            <li><a href="/home">Home</a></li>
            <li><a href="/track">Track&Trace</a></li>
            <li><a href="/information">Information</a></li>
            <li><a href="/contact">About us</a></li>
        </ul>
    </div>
</nav>



<div class="menu-profile" id="menu-profile">
    <h3> {{ Auth::user() ? Auth::user()->name : '' }}</h3>
    <ul>
        <li><a href="/editprofile"><i class='bx bx-edit-alt'></i>Edit Profile</a></li>
        <li><a href="/changepassword"><i class='bx bx-lock'></i>Change Password</a></li>
        <li><a href="/orderlist"><i class='bx bx-collection'></i> My Order List</a></li>
        {{-- <li><img src="" alt=""><a href="#">Feedback</a></li> --}}
        <li>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <i class='bx bx-log-out'></i>
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

    </ul>
</div>

<script>
    function menuToggle() {
        const toggleMenu = document.querySelector('.menu-profile');
        toggleMenu.classList.toggle('active');

        // const menu = document.getElementById("menu-profile");
        // menu.innerHTML = "Hide";

    }
</script>
