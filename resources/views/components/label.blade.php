@props([
    'value',
    'required'
])

<label {{ $attributes->merge(['class'=>'label-standard']) }}>
    {{ $value ?? $slot }}
    @if(isset($required))
        <span class="text-danger">*</span>
    @endif
</label>
