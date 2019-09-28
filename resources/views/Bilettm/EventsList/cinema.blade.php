@extends('Bilettm.Layouts.EventsPage')

@push('inner_content')

@foreach($sub_cats as $cat)
    <div class="row kinoteator tab-part">
        <div class="tab-header d-flex justify-content-between col-12">
            <h2>{{$cat->title}}</h2>
            <div style="height: 5px; margin-left: 5px; position: absolute; bottom: 10px; width: 100px; background-color: rgba(211,61,51,1)"></div>
            <a class="btn btn-danger" href="{{$cat->url}}">Весь репертуар</a>
        </div>
        <div class="tab-ozi col-12">

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="container">
                    <div class="row">
                        @foreach($cat->cat_events as $event)
                        <div class="col-3">
                            @include('Bilettm.Partials.CinemaItem')
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- End Tab panes -->
        </div>
    </div>
@endforeach

@endpush