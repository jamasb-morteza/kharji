<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <x-adminlte.sidebar-nav-group
        :selected="$attributes['selected-side-nav']==='dashboard'"
        title="کاربران"
        iclass="fas fa-tachometer-alt"
    >
        <x-slot name="items">
            <x-adminlte.sidenav-item
                iclass="fa fa-user"
                title="کاربران"
                href="{{route('users.index')}}"
                :selected="$attributes['selected-side-nav']==='auth.users.index'"
            />
            <x-adminlte.sidenav-item
                iclass="fa fa-shield"
                title="نقش‌ها"
                href="{{route('users.create')}}"
                :selected="$attributes['selected-side-nav']==='auth.roles.index'"
            />
        </x-slot>

    </x-adminlte.sidebar-nav-group>

    <x-adminlte.sidebar-nav-group
        :selected="$attributes['selected-side-nav']==='dashboard'"
        title="ارزها"
{{--        iclass="fas fa-tachometer-alt"--}}
    >
        <x-slot name="items">
            <x-adminlte.sidenav-item
                iclass="fas fa-money-bill"
                title="ارز"
                href="{{route('currencies.index')}}"
                :selected="$attributes['selected-side-nav']==='currency.currency.index'"
            />
            <x-adminlte.sidenav-item
                iclass="fas fa-coins"
                title="سکه"
                href="{{route('coins.index')}}"
                :selected="$attributes['selected-side-nav']==='currency.gold.index'"
            />
            <x-adminlte.sidenav-item
                iclass="fab fa-bitcoin"
                title="رمزارز"
                href="{{route('users.create')}}"
                :selected="$attributes['selected-side-nav']==='currency.crypto.index'"
            />
        </x-slot>
    </x-adminlte.sidebar-nav-group>
{{--    <x-adminlte.sidebar-nav-header title="Sample"/>--}}

</ul>
