<li class="nav-item">
    <a href="{{isset($attributes['href'])?$attributes['href']:'#'}}"
       class="nav-link {{isset($selected) && $selected===true?'active':''}}">
        @if(isset($icon))
            {!! $icon !!}
        @elseif(isset($attributes['iclass']))
            <i class="{{$attributes['iclass']}} nav-icon"></i>
        @else
            <i class="far fa-circle nav-icon"></i>
        @endif
        <p>
            @if(isset($title))
                {!! $title !!}
            @elseif(isset($attributes['title']))
                {{$attributes['title']}}
            @endif
        </p>
    </a>
</li>
