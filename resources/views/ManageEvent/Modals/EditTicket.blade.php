<div role="dialog"  class="modal fade " style="display: none;">
    {!! Form::model($ticket, ['url' => route('postEditTicket', ['ticket_id' => $ticket->id, 'event_id' => $event->id]), 'class' => 'ajax']) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title">
                    <i class="ico-ticket"></i>
                    @lang("ManageEvent.edit_ticket", ["title"=>$ticket->title])</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('title', trans("ManageEvent.ticket_title"), array('class'=>'control-label required')) !!}
                    {!!  Form::text('title', null,['class'=>'form-control', 'placeholder'=>'E.g: General Admission']) !!}
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('price', trans("ManageEvent.ticket_price"), array('class'=>'control-label required')) !!}
                            {!!  Form::text('price', null,
                                        array(
                                        'class'=>'form-control',
                                        'placeholder'=>trans("ManageEvent.price_placeholder")
                                        ))  !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('quantity_available', trans("ManageEvent.quantity_available"), array('class'=>' control-label')) !!}
                            {!!  Form::text('quantity_available', null,
                                        array(
                                        'class'=>'form-control',
                                        'placeholder'=>trans("ManageEvent.quantity_available_placeholder")
                                        )
                                        )  !!}
                        </div>
                    </div>
                </div>

                <div class="form-group more-options">
                    {!! Form::label('description', trans("ManageEvent.ticket_description"), array('class'=>'control-label')) !!}
                    {!!  Form::text('description', null,
                                array(
                                'class'=>'form-control'
                                ))  !!}
                </div>

                <div class="row more-options">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('start_sale_date', trans("ManageEvent.start_sale_on"), array('class'=>' control-label')) !!}

                            {!!  Form::text('start_sale_date', $ticket->getFormattedDate('start_sale_date'),
                                [
                                    'class' => 'form-control start hasDatepicker',
                                    'data-field' => 'datetime',
                                    'data-startend' => 'start',
                                    'data-startendelem' => '.end',
                                    'readonly' => ''
                                ]) !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            {!!  Form::label('end_sale_date', trans("ManageEvent.end_sale_on"),
                                        [
                                    'class'=>' control-label '
                                ])  !!}
                            {!!  Form::text('end_sale_date', $ticket->getFormattedDate('end_sale_date'),
                                [
                                    'class' => 'form-control end hasDatepicker',
                                    'data-field' => 'datetime',
                                    'data-startend' => 'end',
                                    'data-startendelem' => '.start',
                                    'readonly' => ''
                                ])  !!}
                        </div>
                    </div>
                </div>

                <div class="row more-options">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('min_per_person', trans("ManageEvent.minimum_tickets_per_order"), array('class'=>' control-label')) !!}
                           {!! Form::selectRange('min_per_person', 1, 100, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('max_per_person', trans("ManageEvent.maximum_tickets_per_order"), array('class'=>' control-label')) !!}
                           {!! Form::selectRange('max_per_person', 1, 100, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row more-options">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="custom-checkbox">
                                {!! Form::checkbox('is_hidden', null, null, ['id' => 'is_hidden']) !!}
                                {!! Form::label('is_hidden', trans("ManageEvent.hide_this_ticket"), array('class'=>' control-label')) !!}
                            </div>
                        </div>
                    </div>
                    @if ($ticket->is_hidden)
                        <div class="col-md-12">
                            <h4>{{ __('AccessCodes.select_access_code') }}</h4>
                            @if($ticket->event->access_codes->count())
                                <?php
                                $isSelected = false;
                                $selectedAccessCodes = $ticket->event_access_codes()->get()->map(function($accessCode) {
                                    return $accessCode->pivot->event_access_code_id;
                                })->toArray();
                                ?>
                                @foreach($ticket->event->access_codes as $access_code)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="custom-checkbox mb5">
                                                {!! Form::checkbox('ticket_access_codes[]', $access_code->id, in_array($access_code->id, $selectedAccessCodes), ['id' => 'ticket_access_code_' . $access_code->id, 'data-toggle' => 'toggle']) !!}
                                                {!! Form::label('ticket_access_code_' . $access_code->id, $access_code->code) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="alert alert-info">
                                    @lang("AccessCodes.no_access_codes_yet")
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
                <a href="javascript:void(0);" data-show-less-text="{!! trans("ManageEvent.less_options") !!}" class="show-more-options">
                    @lang("ManageEvent.more_options")
                </a>
            </div> <!-- /end modal body-->
            <div class="modal-footer">
                {!! Form::button(trans("basic.cancel"), ['class'=>"btn modal-close btn-danger",'data-dismiss'=>'modal']) !!}
                {!! Form::submit(trans("ManageEvent.save_ticket"), ['class'=>"btn btn-success"]) !!}
                {!! Form::close() !!}
                <div class="delTkPreModal">
                    {!! Form::open(array('url' => route('postDeleteTicket',['ticket_id' => $ticket->id, 'event_id' => $event->id]), 'class'=>'ajax','id'=>'delTicketPost'. $event->id)) !!}
                      
                      <button type="submit" class="btn btn-warning pull-left">Delete</button>
                    {!! Form::close() !!}
                </div>                                                        
            </div>
        </div><!-- /end modal content-->

    </div>
</div>

  <script>
  (function(){
      var confModal =
  '    <div class="modal" role="dialog" id="delTkConfirmDialog">'+
  '    <div class="modal-dialog modal-md">'+
  '        <div class="modal-content">'+
  '            <div class="modal-header">'+
  '                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
  '                <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete the ticket?</h4>'+
  '            </div>'+
  '            <div class="modal-footer">'+
  '                <button type="button" class="btn btn-default" id="modal-btn-si1">Yes</button>'+
  '                <button type="button" class="btn btn-primary" id="modal-btn-no2">No</button>'+
  '            </div>'+
  '        </div>'+
  '    </div>'+
  '</div>';
      var modalConfirm = function(callback){
          $(".delTkPreModal").on("click", function(e){
              $('#delTkConfirmDialog').remove();
              $('body').append(confModal);
              e.stopPropagation();
              e.preventDefault();
              selectedDelTk = $(this).find('form').attr('id').split('delTicketPost')[1];
              $("#delTkConfirmDialog").modal('show');
              $("#modal-btn-si1").on("click", function(){
                  callback(true);
              });
              $("#modal-btn-no2").on("click", function(){
                  callback(false);
              });
          });
      };
      modalConfirm(function(confirm){
          $("#delTkConfirmDialog").modal('hide');
          if(confirm){
              setTimeout(function(){
                  $("#delTicketPost" + selectedDelTk).submit();
              },200);
          }else{
              selectedDelTk = null;
          }
      });
  })();
  </script>