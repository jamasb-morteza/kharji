<ul class="c-header-nav d-md-down-none">
    <li class="c-header-nav-item px-3">
        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
    </li>
</ul>

<ul class="c-header-nav mr-auto ml-4">
    <!-- Authentication Links -->
    @auth
        <x-dropdown id="navbarDropdown">
            <x-slot name="trigger">
                <img src="{{Auth::user()->avatar}}" alt="" class="img-circle">
                {{ Auth::user()->name }}
            </x-slot>

            <x-slot name="content">
                <!-- Authentication -->
                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Log Out') }}</a>
                </form>

            </x-slot>
        </x-dropdown>
    @endauth
</ul>
