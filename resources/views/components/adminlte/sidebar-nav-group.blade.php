<li class="nav-item {{isset($attributes['menu-open']) && $attributes['menu-open']?'menu-open':''}}">
    <a href="#" class="nav-link active">
        @if(isset($icon))
            {!! $icon !!}
        @elseif(isset($attributes['iclass']))
            <i class="nav-icon {{$attributes['iclass']}}"></i>
        @endif
        <p>
            {{ isset($title)?$title:'placeholder' }}
            <i class="left fas fa-angle-right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @if(isset($items))
            {!! $items !!}
        @endif
    </ul>
</li>
