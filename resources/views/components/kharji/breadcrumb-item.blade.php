@props(['active'=>false,'title'=>''])
<li class="breadcrumb-item d-flex align-items-center {{$active?'active':''}}">
    @if(isset($attributes['href']) && !empty($attributes['href']))
        <a href="{{$attributes['href']}}">{{$title}}</a>
    @else
        {{$title}}
    @endif
</li>
