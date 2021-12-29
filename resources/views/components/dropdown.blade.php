<li {!! $attributes->merge(['class' => 'nav-item dropdown']) !!} {{$attributes->only('id')}}>
    <a href="#" class="nav-link" role="button" data-toggle="dropdown" aria-expanded="false">
        {{ $trigger }}
    </a>

    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="{{$attributes->get('id')}}">
        {{ $slot }}
    </div>
</li>
