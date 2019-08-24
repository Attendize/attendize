@extends('Bilettm.Layouts.BilettmLayout')
@section('content')
    @include('Bilettm.Partials.BreadCrumbs')

    <section style="margin-top: 30px; margin-bottom: 100px">
        <div class="container">
            <div class="row m-0">
                <div class="col-10">
                    <div class="container" style="padding: 0 !important;">
                        <div class="row">
                            <div class="col-12 p-0" style="margin-bottom: 30px">
                                <h2 class="main-title">«{{$event->title}}»</h2>
                                <div class="main-title-bottom-line"></div>
                            </div>
                            <div class="col-12 p-0" style="padding-left: 10px !important;">
                                @if($event->images->count())
                                    <img style="width: 450px" class="details-image" alt="{{$event->title}}" src="{{config('attendize.cdn_url_user_assets').'/'.$event->images->first()['image_path']}}" property="image">
                                {{--<img src="assets/assets/img/teator/tall6.png" style="width: 450px" class="details-image">--}}
                                @endif
                                    {!! Markdown::parse($event->description) !!}
                            </div>
                            <div class="col-12 p-0">
                                <h2 class="main-title" style="padding-left: 5px">Расписание</h2>
                                <div class="main-title-bottom-line" style="margin-left: 5px"></div>
                                <h4 class="date-small-title">Дата проведения</h4>
                                <div class="date-box-wrap">
                                    <a href="">10.07.2019</a>
                                    <a href="" class="active-date">20.07.2019</a>
                                </div>
                                <h4 class="time-small-title">Время проведения</h4>
                                <div class="time-box-wrap">
                                    <form action="">
                                        <div class="form-group">
                                            <input type="checkbox" id="time1">
                                            <label for="time1"><span>09:30</span></label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="time2">
                                            <label for="time2"><span>12:25</span></label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="time3">
                                            <label for="time3"><span>15:55</span></label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2 text-center">
                    <a id="submit-a">Купить билет</a>
                    @include('Bilettm.Partials.EventShareButtons')
                    <img src="assets/assets/img/konserty/adv.png" style="width: 100%">
                </div>
                <div class="col-12 p-0">
                    @include('Bilettm.Partials.EventTags')
                </div>
            </div>
        </div>
    </section>
@endsection