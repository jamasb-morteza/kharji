@props([
    'title'=>'',
    'iClass'=>'fas fa-bars',
    'btnClass'=>'btn-success'
])
<div class="btn-group">
    <button type="button" class="btn {{$btnClass}} btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
        <i class="{{$iClass}}"></i>
        {{$title}}
    </button>
    <div class="dropdown-menu" role="menu">
        {!! $slot !!}
    </div>
</div>
