@props([
    'class'=>'',
    'name'=>'',
])
<input type="text" {{$attributes->only('value')}} class="form-control text-left only-number {{$class}}"
       name="{{$name}}" {{$attributes->only('id')}} >
