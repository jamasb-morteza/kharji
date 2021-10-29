@props(['title'=>'','href'=>'#','class'=>''])
<a class="c-subheader-nav-link {{$class}}" href="{{$href}}">
    @if(isset($icon) && !empty($icon))
        {!! $icon !!}
    @elseif(isset($attributes['fa-icon']))
        <i class="c-icon {{$attributes['fa-icon']}} mx-1"></i>
    @endif
    {{$title}}
</a>
