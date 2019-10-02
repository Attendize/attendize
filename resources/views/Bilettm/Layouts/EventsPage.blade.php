@extends('Bilettm.Layouts.BilettmLayout')

@section('after_styles')
    <link href="{{asset('vendor/gijgo/gijgo.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('category',$category)}}
    @include("Bilettm.Partials.FilterMenu")

    @foreach($sub_cats as $cat)

        <section class="movie-items-group firts-child">
            <div class="container">
                <div class="row kinoteator tab-part">
                    <div class="tab-header d-flex justify-content-between col-12">
                        <h2  class="font-weight-bold">{{$cat->title}}</h2>
                        <div style="height: 5px; position: absolute; bottom: 0px; width: 100px; background-color: rgba(211,61,51,1)"></div>
                        <a class="red_button" href="{{$cat->url}}">Весь репертуар</a>
                    </div>
                    <div class="tab-ozi col-12" style="margin-top: 10px">

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="container">
                                <div class="row">
                                    @foreach($cat->cat_events as $event)
                                        @include("Bilettm.EventsList.{$category->view_type}",['event'=>$event])
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- End Tab panes -->
                    </div>
                </div>
            </div>
        </section>

    @endforeach
            <section id="first-add-wrapper" style="margin: 100px 0;">
                <div class="container">
                    <div class="row" style="padding: 0 20px;">
                        <a href="" style="width: 100%">
                            <img src="{{asset('assets/images/advs/first.png')}}" style="width: 100%">
                        </a>
                    </div>
                </div>
            </section>

@endsection
@push('after_styles')
<style type="text/css">
    .red_button{
        color: #ffffff;
        background-color: #d33d33;
        height: fit-content;
        font-size: 20px;
        padding: 12px 60px;
        border-radius: 5px;
        margin-right: 5px;
        transition-property: background-color;
        transition-duration: .2s;
    }
</style>
@endpush
@section('after_scripts')

    <script src="{{asset('vendor/gijgo/gijgo.min.js')}}" type="text/javascript"></script>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: 'Дата <i class="fa fa-caret-down"></i>'
            }
        });
    </script>

@endsection