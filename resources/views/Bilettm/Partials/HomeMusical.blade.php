<section id="konserty" class="container" style="background-image: url({{asset('assets/images/bg/konserty.jpg')}}); background-repeat: no-repeat; background-size: 100%; padding: 100px 0;">
    <div class="tab-header d-flex justify-content-between col-12">
        <h2 class="">Концерты</h2>
        <div style="height: 5px; margin-left: 5px; position: absolute; bottom: 10px; width: 100px; background-color: #ffffff"></div>
        <a class="" href="">Посмотреть все</a>
    </div>
    <div class="tab-ozi col-12">
        <!-- Nav tabs -->
        <ul class="nav u-nav-v1-1 g-mb-20" role="tablist" data-target="nav-1-1-default-hor-left" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-lightgray g-mb-20">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="" role="tab">Популярное</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="" role="tab">Новые</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="tab">Сегодня <i class="fa fa-caret-down"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">SLink 1</a>
                    <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">SLink 2</a>
                    <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">SLink 3</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="tab">Дата <i class="fa fa-caret-down"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">DLink 1</a>
                    <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">DLink 2</a>
                    <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">DLink 3</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="tab">Площадка <i class="fa fa-caret-down"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">PLink 1</a>
                    <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">PLink 2</a>
                    <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">PLink 3</a>
                </div>
            </li>
        </ul>
        <!-- End Nav tabs -->
        <div class="owl-carousel container row" id="konserty-tab1" style="padding: 0 !important; margin: 0">

            <div class="slider-slider row">
                @foreach($musical->slice(0,4) as $event)
                    @include('Bilettm.Partials.MusicalItem',['event'=>$event])
                @endforeach
            </div>
            @if($musical->count()>4)
                <div class="slider-slider row">
                    @foreach($musical->slice(4) as $event)
                        @include('Bilettm.Partials.MusicalItem',['event'=>$event])
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
