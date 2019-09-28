<div class="js-slide">
    <a class="d-block" href="{{$event->event_url}}">
        <img class="img-fluid w-100" src="{{asset($event->image_url ?? '#')}}">
        <div class="teator-overlay">
            <div class="texts-wrapper" style="color: #ffffff">
                <span class="">{{$event->start_date->format('H:s, d.m.Y')}}</span>
                <h2>{{$event->title}}</h2>
                <h5>{{$event->venue_name}}</h5>
            </div>
        </div>
    </a>
</div>