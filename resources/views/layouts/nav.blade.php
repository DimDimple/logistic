<nav>
    <div class="logo">
        <a><img src={{ asset('assets/images/logoDMgo.png') }} alt="" style="width: 150px; height: 100px">
        </a>

        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block" style="margin: 20px 0px 0px 0px">
                @auth
                <li class="nav-item dropdown" style="position:absolute; top:15px; right: 150px; display:flex;">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end d-flex"  aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-black-500 dark:text-black-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-black-500 dark:text-black-500" style="margin-left:10px">Register</a>
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