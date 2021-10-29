{{--<ul class="c-header-nav">
    <li class="c-header-nav-item px-3">
        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
    </li>
</ul>--}}
<ul class="c-header-nav mfs-auto mfe-1">
    <!-- Authentication Links -->
    @auth
        <li class="c-header-nav-item dropdown">
            <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
               aria-expanded="false">
                <div class="c-avatar">
                    <img class="c-avatar-img" src="{{Auth::user()->default_profile}}" alt="{{Auth::user()->email}}">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pt-0">
                <div class="dropdown-header bg-light py-2 text-right">
                    <strong>{{Auth::user()->name}}</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-user c-icon mfe-2"></i>
                    <span>{{ __('Profile') }}</span>
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                    @csrf
                </form>
                <a class="dropdown-item" href="#" onclick="event.preventDefault();$('#logout-form').submit();">
                    <i class="fas fa-sign-out-alt c-icon mfe-2"></i>
                    <span>{{ __('Log Out') }}</span>
                </a>
            </div>
        </li>
    @endauth
</ul>
