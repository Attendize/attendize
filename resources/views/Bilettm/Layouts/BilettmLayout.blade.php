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
    <link  rel="stylesheet" href="{{ asset('vendor/jquery-ui/themes/base/jquery-ui.min.css') }}">
<!-- CSS Unify Theme -->
    <link rel="stylesheet" href="{{asset('assets/stylesheet/styles.e-commerce.css')}}">

    <!--  KMB Custom css  -->
    <link rel="stylesheet" href='{{asset("assets/stylesheet/custom.css")}}'>

</head>

<body>
<main>
    @include('Bilettm.Partials.PublicHeader')
    @yield('content')2
    @include('Bilettm.Partials.PublicFooter')
</main>
<!-- JS Global Compulsory -->
<script src="{{asset('assets/javascript/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/popper.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap4/bootstrap.min.js')}}"></script>

<script src="{{ asset('vendor/chosen/chosen.jquery.js') }}"></script>
<script src="{{ asset('vendor/jquery-ui/ui/widgets/datepicker.js') }}"></script>

@yield('after_scripts')

@stack('after_scripts')

<!-- JS Unify -->
<script src="{{ asset('assets/javascript/components/hs.select.js') }}"></script>
<script src="{{ asset('assets/javascript/components/hs.datepicker.js') }}"></script>

<!-- JS Plugins Init. -->
<script >
    $(document).ready(function () {
        // initialization of custom select
        $.HSCore.components.HSSelect.init('.js-custom-select');

        // initialization of forms
        $.HSCore.components.HSDatepicker.init('#datepickerInline');
    });
</script>

<script>
    $(document).ready(function(){
        $('#date-click').click(function () {
            $('#date-click-content').toggleClass('show-content');
        });
    });
</script>

</body>