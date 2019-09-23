<div class="container film">
    <div class="row">
        <div class="col-md-3 col-3 col-lg-3">
            <img class="film_img" src="{{asset($event->images->first()->image_path ?? '#')}}"/>
        </div>
        <div class="col-md-6 col-lg-6 col-6">
            <div class="film_op">
                <div class="date">
                    <div class="day">
                        <h4>{{$event->start_date->format('d.m.Y')}}</h4>
                        <h6>{{$event->getSeansCount()}}</h6>
                    </div>
                </div>
                <h2 class="film_name"><a href="{{$event->event_url}}">{{$event->title}}</a></h2>
                <div id="desc">
                    {!! Markdown::parse($event->description) !!}
                </div>
                @if($event->starting_ticket_price)
                <div class="buy_and_salary">
                    <span class="cost">Цена ot: {{$event->starting_ticket_price}} TMT</span>
                    <a class="btn btn-danger buy_button" href="{{$event->event_url}}">Купить</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>