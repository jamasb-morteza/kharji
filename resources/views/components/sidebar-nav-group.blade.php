<li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
    <a href="" class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
        @if(isset($attributes['iclass']))
        <i class="{{$attributes['iclass']}} c-sidebar-nav-icon"></i>
        @endif
        {{ isset($title)?$title:'placeholder' }}
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        @if(isset($items))
            {!! $items !!}
        @endif
    </ul>
</li>
