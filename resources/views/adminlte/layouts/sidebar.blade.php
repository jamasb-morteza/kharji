<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <x-adminlte.sidebar-nav-group>
        <x-adminlte.sidenav-item
            iclass="fa fa-user"
            title="کاربران"
            href="{{route('users.index')}}"
            :selected="$attributes['selected-side-nav']==='users'"
        />
        <x-adminlte.sidenav-item
            iclass="fa fa-users"
            title="تیم‌ها"
            href="{{route('team.index')}}"
            :selected="$attributes['selected-side-nav']==='users'"
        />
        <x-adminlte.sidenav-item
            iclass="fas fa-money-bill"
            title="مخارج"
            href="{{route('expends.index')}}"
            :selected="$attributes['selected-side-nav']==='expends'"
        />
    </x-adminlte.sidebar-nav-group>
</ul>
