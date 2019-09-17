<section id="kinoteator" class="kinoteator-section container">
    <div class="tab-header d-flex justify-content-between col-12 px-0">
        <h2 class="">Кинотеатры</h2>
        <div style="height: 5px; position: absolute; bottom: 0; width: 100px; background-color: rgba(211,61,51,1)"></div>
        <a class="" href="{{route('showCategoryEventsPage')}}">Посмотреть все</a>
    </div>
    <div class="tab-ozi col-12 px-0">

        <div class="owl-carousel container row" id="kinoteator-tab1" style="padding: 0 !important; margin: 0">
            <div class="slider-slider">
                <div class="row w-100 m-auto">
                    <div class="col-6">
                        @include('Bilettm.Partials.CinemaItem',['event'=>$cinema->shift(1),'size'=>'big'])
                    </div>
                    <div class="col-6">
                        <div class="row">
                            @foreach($cinema->slice(0,4) as $cinemaEvent)
                            <div class="col-6">
                                @include('Bilettm.Partials.CinemaItem',['event'=>$cinemaEvent])

                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            @if($cinema->count()>4)
                <div class="slider-slider">
                    <div class="row">
                        @foreach($cinema->slice(4) as $cinemaEvent)
                            <div class="col-6">
                                @include('Bilettm.Partials.CinemaItem',['event'=>$cinemaEvent])
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
</section>