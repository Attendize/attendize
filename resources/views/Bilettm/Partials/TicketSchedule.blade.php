<div class="col-12 p-0">

    <h2 class="main-title" style="padding-left: 5px">Расписание</h2>
    @if($event->end_date->isPast())
        <div class="alert alert-boring">
            @lang("Public_ViewEvent.event_already", ['started' => trans('Public_ViewEvent.event_already_ended')])
        </div>
    @else
        @if(count($ticket_dates) > 0)
        <div class="main-title-bottom-line" style="margin-left: 5px"></div>
        <h4 class="date-small-title">Дата проведения</h4>
        <div class="date-box-wrap">
            @foreach($ticket_dates as $date =>$ticket)
                <a href="">{{$date}}</a>
            @endforeach
            {{--<a href="" class="active-date">20.07.2019</a>--}}
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
                <div class="form-group d-block">
                    <input type="submit" value="Купить билет">
                </div>
            </form>
        </div>
        @else

                <div class="alert alert-boring">
                    @lang("Public_ViewEvent.tickets_are_currently_unavailable")
                </div>
        @endif
    @endif
</div>