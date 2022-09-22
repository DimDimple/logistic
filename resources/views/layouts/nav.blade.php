<nav>
    <div class="logo">
        <a><img src={{ asset('assets/images/logoDMgo.png') }} alt="">
        </a>

        @if (Route::has('login'))

            <div class="user">
                @if (Auth::user() ? Auth::user()->image : '')
                    <img class="image rounded-circle" src="{{ asset('/storage/images/' . Auth::user()->image) }}"
                        alt="profile_image" style="width: 50px;height: 50px; border: 3px solid #eee"
                        onclick="menuToggle()">
                @endif
                @auth
                @else
                    <a href="{{ route('login') }}" class="text-sm text-black-500 dark:text-black-500"
                        style="text-decoration: none; text-align: center;">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-black-500 dark:text-black-500"
                            style="text-decoration: none;margin-left:10px">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <div class="menu">
        @php
            $currentRouteName = request()
                ->route()
                ->getName();
        @endphp
        <ul>
            <li><a href="{{ asset('/home') }}" class="{{ $currentRouteName === 'home' ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ asset('/track') }}"  class="{{ $currentRouteName === 'track' ? 'active' : '' }}">Track&Trace</a></li>
            <li><a href="{{ asset('/information') }}" class="{{ $currentRouteName === 'information' ? 'active' : '' }}">Information</a></li>
            <li><a href="{{ asset('/contact') }}" class="{{ $currentRouteName === 'contact' ? 'active' : '' }}">Contact us</a></li>
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

{{-- script active --}}
{{-- <script>
    $(document).ready(function() {

        $(".one").click(function() {
            $(this).addClass("active").siblings().removeClass("active");
        });
    });
</script> --}}


<script>
    function menuToggle() {
        const toggleMenu = document.querySelector('.menu-profile');
        toggleMenu.classList.toggle('active');

        // const menu = document.getElementById("menu-profile");
        // menu.innerHTML = "Hide";

    }
</script>
