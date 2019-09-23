@extends('Bilettm.Layouts.BilettmLayout')

@section('content')

    @include('Bilettm.ViewEvent.Partials.HeaderSection')
    {{--@include('Public.ViewEvent.Partials.EventShareSection')--}}
    @include('Bilettm.ViewEvent.Partials.ViewOrderSection')
    @include('Bilettm.ViewEvent.Partials.FooterSection')
    
@stop
