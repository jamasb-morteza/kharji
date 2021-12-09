<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/jalali_date_picker/jalalidatepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/select2/dist/css/select2.min.css')}}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{asset('/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ mix('js/dashboard.js') }}" defer></script>
    <script src="{{asset('/plugins/jalali_date_picker/jalalidatepicker.min.js')}}"></script>
    <script src="{{asset('/plugins/autoNumeric4.2/autonumeric4.1.js')}}"></script>
    <script src="{{asset('/plugins/select2/dist/js/select2.min.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('/js/kharji.js')}}"></script>
</head>
<body class="c-app font-sans antialiased">
<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand">
        <a href="/">
            <x-application-logo class="c-sidebar-brand-minimized" width="40"/>
            <x-application-logo class="c-sidebar-brand-full" width="50"/>
        </a>
    </div>

    @include('layouts.sidebar')

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
            data-class="c-sidebar-minimized"></button>
</div>
<div class="c-wrapper">
    <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none ml-auto" type="button" data-target="#sidebar"
                data-class="c-sidebar-show">
            <span class="c-header-toggler-icon"></span>
        </button>
        <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar"
                data-class="c-sidebar-lg-show" responsive="true">
            <span class="c-header-toggler-icon"></span>
        </button>
        @include('layouts.navigation')
        <div class="c-subheader justify-content-between px-3">
            <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
                @if(isset($header_breadcrumbs))
                    {!! $header_breadcrumbs !!}
                @endif
            </ol>
            <div class="c-subheader-nav mfe-2">
                @if(isset($subheader_nav_link))
                    {!! $subheader_nav_link !!}
                @endif
            </div>
        </div>
    </header>

    <div class="c-body">
        <main class="c-main">

            <div class="container">
                <div class="row fade-in">
                    <div class="col p-xs-0">
                        {{ $slot }}
                    </div>

                    @if (isset($aside))
                        <div class="col-lg-3">
                            {{ $aside ?? '' }}
                        </div>
                    @endif
                </div>
            </div>

        </main>

        <footer class="c-footer">
            <div>
                <a href="https://jetstream.laravel.com/1.x/introduction.html">Jetstream</a> © 2020 Laravel.
            </div>
            <div class="ml-auto">Powered by&nbsp;<a href="https://jamasb.me/">JamasbMe</a></div>
        </footer>
    </div>
</div>
<x-kharji.alerts-script/>
@stack('scripts')
</body>
</html>
