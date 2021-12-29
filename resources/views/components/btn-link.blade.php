@props([
    'href'=>false,
    'title'=>'',
    'text'=>'',
    'iClass'=>'',
    'class'=>'',
    'disabled'=>false,
    'id'=>false
])
<a
    @if($href)
    href="{{$href}}"
    @elseif(!$disabled)
    href="javascript:;"
    @endif
    class="p-2 {{$class}}"
    @if($id)
    id="{{$id}}"
    @endif
    title="{{empty($title)?$title:$text}}"
>
    <i class="{{$iClass}}"></i>
    <span>{{!empty($text)?$text:$slot}}</span>
</a>
