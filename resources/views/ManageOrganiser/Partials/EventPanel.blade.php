<div class="panel panel-success event">
    <div class="panel-heading" data-style="background-color: {{{$event->bg_color}}};background-image: url({{{$event->bg_image_url}}}); background-size: cover;" {{$event->deleted_at==null?'':'style=background-color:gray;'  }}   >
        <div class="event-date">
            <div class="month">
                {{strtoupper(explode("|", trans("basic.months_short"))[$event->start_date->format('n')])}}
            </div>
            <div class="day">
                {{$event->start_date->format('d')}}
            </div>
        </div>
        <ul class="event-meta">
            <li class="event-title">
                <a title="{{{$event->title}}}" href="{{route('showEventDashboard', ['event_id'=>$event->id])}}">
                    {{{ Str::limit($event->title, $limit = 75, $end = '...') }}}
                </a>
            </li>
            <li class="event-organiser">
                By <a href='{{route('showOrganiserDashboard', ['organiser_id' => $event->organiser->id])}}'>{{{$event->organiser->name}}}</a>
            </li>
        </ul>

    </div>

    <div class="panel-body">
        <ul class="nav nav-section nav-justified mt5 mb5">
            <li>
                <div class="section">
                    <h4 class="nm">{{ $event->tickets->sum('quantity_sold') }}</h4>
                    <p class="nm text-muted">@lang("Event.tickets_sold")</p>
                </div>
            </li>

            <li>
                <div class="section">
                    <h4 class="nm">{{ $event->getEventRevenueAmount()->display() }}</h4>
                    <p class="nm text-muted">@lang("Event.revenue")</p>
                </div>
            </li>
        </ul>
    </div>
    <div class="panel-footer">
        <ul class="nav nav-section nav-justified">
            <li>
                <a href="{{ $event->deleted_at==null? route('showEventCustomize',['event_id' => $event->id]) : '#' }}" {!! $event->deleted_at==null? "" : 'disabled data-toggle'.'="tooltip" title="'.trans("basic.restorebeforeusingthis").'"' !!} >
                    <i class="ico-edit"></i> @lang("basic.edit")
                </a>
            </li>
            <li>
                <a href="{{ $event->deleted_at==null? route('duplicateEvent', ['event_id' => $event->id ] ) : '#' }}" {!! $event->deleted_at==null? "" : 'disabled data-toggle'.'="tooltip" title="'.trans("basic.restorebeforeusingthis").'"' !!} >
                    <i class="ico-copy"></i> @lang("basic.duplicate")
                </a>
            </li>
            <li>
                <a href="{{  $event->deleted_at==null? route('archiveEvent',['event_id' => $event->id]) : route('restoreEvent', ['event_id' => $event->id]) }}">
                    <i class="{{ $event->deleted_at==null?'ico-trash':'ico-undo' }}" > </i> {{ $event->deleted_at==null? '  '.trans("basic.archive") : '  '.trans("basic.restore") }}
                </a>
            </li>
            <li>
                <a href="{{ $event->deleted_at==null? route('showEventDashboard', ['event_id' => $event->id]): '#' }}" {!! $event->deleted_at==null? "" : 'disabled data-toggle'.'="tooltip" title="'.trans("basic.restorebeforeusingthis").'"' !!} >
                    <i class="ico-cog"></i> @lang("basic.manage")
                </a>
            </li>
            <li class="delEvPreModal">
                 {!! Form::open(array('url' => route('postDeleteEvent'), 'class'=>'ajax','id'=>'delEventPost'. $event->id)) !!}
                     {!! Form::hidden('event_id',$event->id)  !!}
                     <button type="submit" class="btn btn-link"><i class="ico-remove2"></i> Delete</button>
                 {!! Form::close() !!}
             </li>            
        </ul>
    </div>
</div>

 <script>
 (function(){
     var confModal =
 '    <div class="modal" role="dialog" id="delEvConfirmDialog">'+
 '    <div class="modal-dialog modal-md">'+
 '        <div class="modal-content">'+
 '            <div class="modal-header">'+
 '                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
 '                <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete the event?</h4>'+
 '            </div>'+
 '            <div class="modal-footer">'+
 '                <button type="button" class="btn btn-default" id="modal-btn-si1">Yes</button>'+
 '                <button type="button" class="btn btn-primary" id="modal-btn-no2">No</button>'+
 '            </div>'+
 '        </div>'+
 '    </div>'+
 '</div>';
     var modalConfirm = function(callback){
         $(".delEvPreModal").on("click", function(e){
             $('#delEvConfirmDialog').remove();
             $('body').append(confModal);
             e.stopPropagation();
             e.preventDefault();
             selectedDelEv = $(this).find('form').attr('id').split('delEventPost')[1];
             $("#delEvConfirmDialog").modal('show');
             $("#modal-btn-si1").on("click", function(){
                 callback(true);
             });
             $("#modal-btn-no2").on("click", function(){
                 callback(false);
             });
         });
     };
     modalConfirm(function(confirm){
         $("#delEvConfirmDialog").modal('hide');
         if(confirm){
             setTimeout(function(){
                 $("#delEventPost" + selectedDelEv).submit();
             },200);
         }else{
             selectedDelEv = null;
         }
     });
 })();
 </script>
