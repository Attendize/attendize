@extends('Shared.Layouts.Master')

@section('title')
@parent

Event Modules
@stop

@section('top_nav')
@include('ManageEvent.Partials.TopNav')
@stop

@section('menu')
@include('ManageEvent.Partials.Sidebar')
@stop

@section('page_title')
<i class='ico-clipboard4 mr5'></i>
Event Modules
@stop

@section('head')

@stop

{{--
    @section('page_header')
    @stop
 --}}

@section('content')
<div class="row">

    @foreach($modules as $i => $status)
        <div class="col-xs-12 col-md-6">
            <h4>{{ $i }} modules</h4>
            @foreach($status as $name)

            <div class="panel panel-success">

                <div class="panel-heading">
                    <h3 class="panel-title">
                        @if($i == 'Active')
                            <a href='/module/{{$event->id}}/{{ $name }}'>{{ ucfirst($name) }}</a>
                            <a href="/event/{{ $event->id }}/{{ $name }}/toggle" class="pull-right">
                                <i style="cursor:pointer" class="text-danger ico-cancel-circle"></i>
                            </a>
                        @else
                            {{ ucfirst($name) }}
                            <a href="/event/{{ $event->id }}/{{ $name }}/toggle" class="pull-right">
                                <i style="cursor:pointer" class="text-info ico-plus"></i>
                            </a>
                        @endif
                    </h3>
                </div>

                <div class="panel-body">
                    {{  \App\Models\Module::getDescription($name) }}
                </div>
            </div>

            @endforeach
        </div>
    @endforeach
</div>
@stop
