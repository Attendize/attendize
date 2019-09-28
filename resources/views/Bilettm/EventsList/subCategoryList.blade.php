@extends('Bilettm.Layouts.EventsPage')
@push('inner_content')
    <section class="movie-items-group">
        <div class="container">
            <div class="row kinoteator tab-part">
                <div class="tab-header d-flex justify-content-between col-12">
                    <h2>{{$category->title}}</h2>
                    <div style="height: 5px; margin-left: 5px; position: absolute; bottom: 10px; width: 100px; background-color: rgba(211,61,51,1)"></div>
                    <a class="btn btn-danger" href="{{$category->url}}">Весь репертуар</a>
                </div>
                <div class="tab-ozi col-12">
                    <!-- Nav tabs -->
                    <ul class="nav u-nav-v1-1 g-mb-20" role="tablist" data-target="nav-1-1-default-hor-left" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-lightgray g-mb-20">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="" role="tab">Популярное</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="" role="tab">Новые</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="tab">Сегодня <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">SLink 1</a>
                                <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">SLink 2</a>
                                <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">SLink 3</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="tab">Дата <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">DLink 1</a>
                                <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">DLink 2</a>
                                <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">DLink 3</a>
                            </div>
                        </li>
                    </ul>
                    <!-- End Nav tabs -->

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="container">
                            <div class="row">
                                @foreach($events as $event)
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
        </div>
    </section>
@endpush