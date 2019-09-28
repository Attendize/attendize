@if(!empty($musical))
<section id="konserty" class="container" style="background-image: url({{asset('assets/images/bg/konserty.jpg')}}); background-repeat: no-repeat; background-size: 100%; padding: 100px 0;">
    <div class="tab-header d-flex justify-content-between col-12">
        <h2 class="">{{$musical->title}}</h2>
        <div style="height: 5px; margin-left: 5px; position: absolute; bottom: 10px; width: 100px; background-color: #ffffff"></div>
        <a class="" href="{{$musical->url}}">Посмотреть все</a>
    </div>
    <div class="tab-ozi col-12">
       <!-- End Nav tabs -->
        <div class="owl-carousel container row" id="konserty-tab1" style="padding: 0 !important; margin: 0">

            <div class="slider-slider row">
                @foreach($musical->events->slice(0,4) as $event)
                    @include('Bilettm.Partials.MusicalItem',['event'=>$event])
                @endforeach
            </div>
            @if($musical->count()>4)
                <div class="slider-slider row">
                    @foreach($musical->events->slice(4) as $event)
                        @include('Bilettm.Partials.MusicalItem',['event'=>$event])
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
@endif