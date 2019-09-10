@extends('Bilettm.Layouts.BilettmLayout')
@section('content')
    @foreach($events as $event)
        @include('Bilettm.Partials.EventItem')
    @endforeach
@endsection