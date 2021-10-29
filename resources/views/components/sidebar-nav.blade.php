<ul class="c-sidebar-nav ps ps--active-y">
    <x-sidenav-item
        iclass="fa fa-user"
        title="کاربران"
        href="{{route('users.index')}}"
        :selected="$attributes['selected-side-nav']==='users'"
    />
    <x-sidenav-item
        iclass="fa fa-users"
        title="تیم‌ها"
        href="{{route('team.index')}}"
        :selected="$attributes['selected-side-nav']==='users'"
    />
    <x-sidenav-item
        iclass="fas fa-money-bill"
        title="مخارج"
        href="{{route('expends.index')}}"
        :selected="$attributes['selected-side-nav']==='expends'"
    />
    {{--<x-sidebar-nav-group title="احراز هویت" iclass="fa fa-lock">
        <x-slot name="items">

        </x-slot>
    </x-sidebar-nav-group>--}}
</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
