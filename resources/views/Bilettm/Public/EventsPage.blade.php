@extends('Bilettm.Layouts.BilettmLayout')
@section('content')
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('category',$category??null)}}
    <!-- Films Opisanie Buttons section -->
    <section id='cat_and_buttons'>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-4">

                    <select id='vybor_select' >
                        <option class="cat_op" >На этой недели</option>
                        <option class="cat_op">Исполнители</option>
                        <option class="cat_op">Мероприятие</option>
                        <option class="cat_op">Концерты</option>
                    </select>
                </div>
                <div class="col-md-8 col-lg-8 col-8">
                    <div id='cat_buts'>
                        @foreach($navigation as $nav)
                            <a class=" btn btn-danger active_cat_but cat_but" href="{{$nav->url}}">{{$nav->title}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id='opisanie_section'>
    @foreach($events as $event)
        @include('Bilettm.Partials.EventItem')
    @endforeach
        <div class="container film">
            <div class="row">
                <div class="col-md-9 col-lg-9 col-sm-9 col-9">
                    <div class="pagination_blk">
                        <span>Видно на странице - 5/48</span>
                        <div class="arrows_block">
                            <a  class='arrows' id='left_arrow' href="#"><img src="{{asset('assets/images/icons/left.png')}}"></a>
                            <a class='arrows' id='right_arrow' href="#"><img src="{{asset('assets/images/icons/right.png')}}"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection