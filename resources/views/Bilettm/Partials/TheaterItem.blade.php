<div class="js-slide">
    <a class="d-block">
        <img class="img-fluid w-100" src="{{$event->images->first()->image_path ?? '#'}}">
        <div class="teator-overlay">
            <div class="texts-wrapper" style="color: #ffffff">
                <span class="">{{$event->start_date->format('H:s, dd.mm.yyyy')}}</span>
                <h2>«{{$event->title}}»</h2>
                <h5>{{$event->venue_name}}</h5>
            </div>
        </div>
    </a>
</div>