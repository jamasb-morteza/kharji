<li class="c-sidebar-nav-item">
    <a href="{{isset($attributes['href'])?$attributes['href']:'#'}}"
       class="c-sidebar-nav-link {{isset($selected) && $selected===true?'c-active':''}}">
        @if(isset($icon))
            {!! $icon !!}
        @elseif(isset($attributes['iclass']))
            <i class="{{$attributes['iclass']}}"></i>
        @endif
        <span class="mr-2">
            @if(isset($title))
                {!! $title !!}
            @elseif(isset($attributes['title']))
                {{$attributes['title']}}
            @endif
        </span>
    </a>
</li>
