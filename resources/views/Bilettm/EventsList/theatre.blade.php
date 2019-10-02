<div class="col-4">
    <article class="u-block-hover">
        <div class="g-bg-cover">
            <img class="d-flex align-items-end" src="{{asset($event->image_url ?? '#')}}" style="border-radius: 5px">
        </div>
        <div class="u-block-hover__additional--partially-slide-up h-100 text-center g-z-index-1 mt-auto" style="background-image: url({{asset('assets/images/bg/teatr.png')}})">
            <div class="overlay-details smalll">
                <span class="">{{$event->start_date->format('H:s d.m.Y')}}</span>
                <h1>{{$event->title}}</h1>
                <h6>{{$event->subCategory->title}}</h6>
            </div>
        </div>
    </article>
</div>