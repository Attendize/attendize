@if ($paginator->hasPages())
<div class="pagination_blk">
    <span>Видно на странице - {{$events->count()}}/{{$events->total()}}</span>
    <div class="arrows_block">
        <a  class='arrows' id='left_arrow' href="#"><img src="{{asset('assets/images/icons/left.png')}}"></a>
        <a class='arrows' id='right_arrow' href="#"><img src="{{asset('assets/images/icons/right.png')}}"></a>
    </div>
</div>