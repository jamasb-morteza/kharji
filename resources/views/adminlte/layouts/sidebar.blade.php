<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <x-adminlte.sidenav-item
        iclass="fa fa-user"
        title="کاربران"
        slug="users"
        :href="route('users.index')"
        :selected="$attributes['selected-side-nav']==='users'"
    />
    <x-adminlte.sidenav-item
        iclass="fa fa-users"
        title="تیم‌ها"
        slug="teams"
        :href="route('team.index')"
        :selected="$attributes['selected-side-nav']==='users'"
    />
    <x-adminlte.sidenav-item
        iclass="fas fa-money-bill"
        title="مخارج"
        slug="expends"
        :href="route('expends.index')"
        :selected="$attributes['selected-side-nav']==='expends'"
    />
</ul>
