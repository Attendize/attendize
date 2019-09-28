@extends('Bilettm.Layouts.BilettmLayout')
@section('after_styles')
    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/themes/base/jquery-ui.min.css') }}">
@endsection

@section('content')
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('category',$category)}}
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
        <div class="container">
            <div class="row">
                <div class="col-9">
                    @foreach($events as $event)
                        @include('Bilettm.Partials.EventItem')
                    @endforeach
                </div>
                <div class="col-3">
                    <div id="datepickerInlineFrom" class="u-datepicker-v1 g-brd-gray-light-v2 g-mb-40 g-mb-0--xl" data-range="true" data-to="datepickerInlineTo"></div>
                </div>
            </div>
        </div>
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

@section('after_scripts')
    <script  src="{{ asset('vendor/jquery-ui/ui/widget.js') }}"></script>
    <script  src="{{ asset('vendor/jquery-ui/ui/version.js') }}"></script>
    <script  src="{{ asset('vendor/jquery-ui/ui/keycode.js') }}"></script>
    <script  src="{{ asset('vendor/jquery-ui/ui/position.js') }}"></script>
    <script  src="{{ asset('vendor/jquery-ui/ui/unique-id.js') }}"></script>
    <script  src="{{ asset('vendor/jquery-ui/ui/safe-active-element.js') }}"></script>

    <!-- jQuery UI Helpers -->
    <script  src="{{ asset('vendor/jquery-ui/ui/widgets/menu.js') }}"></script>
    <script  src="{{ asset('vendor/jquery-ui/ui/widgets/mouse.js') }}"></script>

    <!-- jQuery UI Widgets -->
    <script  src="{{ asset('vendor/jquery-ui/ui/widgets/datepicker.js') }}"></script>

    <!-- JS Unify -->
    <script  src="{{ asset('assets/javascript/components/hs.datepicker.js') }}"></script>

    <!-- JS Plugins Init. -->
    <script >
        $(document).on('ready', function () {
            // initialization of forms
            $.HSCore.components.HSDatepicker.init('#datepickerDefault, #datepickerInline, #datepickerInlineFrom, #datepickerFrom');
        });
    </script>
@endsection