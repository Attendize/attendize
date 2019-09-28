<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>{{$title ?? 'Bilet TM'}}</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {{-- Encrypted CSRF token for Laravel, in order for Ajax requests to work --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap4/bootstrap.min.css')}}">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('vendor/icon-awesome/css/font-awesome.min.css')}}">

    @yield('after_styles')
    @stack('after_styles')

<!-- CSS Unify Theme -->
    <link rel="stylesheet" href="{{asset('assets/stylesheet/styles.e-commerce.css')}}">

    <!--  KMB Custom css  -->
    <link rel="stylesheet" href='{{asset("assets/stylesheet/custom.css")}}'>
    <link rel="stylesheet" href='{{asset("assets/stylesheet/custom_new.css")}}'>

</head>

<body>
<main>
    @include('Bilettm.Partials.PublicHeader')
    @yield('content')
    @include('Bilettm.Partials.PublicFooter')
</main>
<!-- JS Global Compulsory -->
<script src="{{asset('assets/javascript/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/popper.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap4/bootstrap.min.js')}}"></script>

<script src="{{ asset('vendor/chosen/chosen.jquery.js') }}"></script>
{{--<script src="{{ asset('vendor/jquery-ui/ui/widgets/datepicker.js') }}"></script>--}}

@yield('after_scripts')

@stack('after_scripts')
{!!HTML::script(config('attendize.cdn_url_static_assets').'/assets/javascript/frontend.js')!!}
<script>
    $('document').ready(function(){
        $('#top-header-submit').click(function(){
            $('#main-header-search-form').submit();
        })
    });
</script>
@if(session()->get('message'))
    <script>showMessage('{{\Session::get('message')}}');</script>
@endif
</body>