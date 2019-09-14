@extends('Bilettm.Layouts.BilettmLayout')
@section('content')
    @include('Bilettm.ViewEvent.Partials.CheckoutHeader')

    @include('Bilettm.ViewEvent.Partials.CreateOrderSection')
    <script>var OrderExpires = {{strtotime($expires)}};</script>
    @include('Bilettm.ViewEvent.Partials.CheckoutFooter')
@endsection