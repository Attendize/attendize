<section id="teator " class="container teator">
    <div class="tab-header d-flex justify-content-between col-12">
        <h2 class="">Театоры</h2>
        <div style="height: 5px; margin-left: 5px; position: absolute; bottom: 10px; width: 100px; background-color: rgba(211,61,51,1)"></div>
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
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="tab">Жанры <i class="fa fa-caret-down"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">JLink 1</a>
                    <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">JLink 2</a>
                    <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">JLink 3</a>
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
            <li style="position: absolute; right: 0;">
                <a id="slide-teator-prev" style="margin-right: 5px;">
                    <img src="assets/assets/img/icons/left.png" style="width: 32px">
                </a>
                <a id="slide-teator-next" style="margin-right: 20px">
                    <img src="assets/assets/img/icons/right.png" style="width: 32px">
                </a>
            </li>
        </ul>
        <!-- End Nav tabs -->
        <div class="kinoteator-tab1-wrapper">

            <div class="row">
                <div class="col-md-10">
                    <div id="carousel-09-1" class="js-carousel text-center g-font-size-0 g-mb-20 g-mb-0--sm" data-infinite="true" data-vertical="true" data-arrows-classes="u-arrow-v1 g-absolute-centered--x g-width-35 g-height-35 g-font-size-18 g-color-gray g-bg-white" data-arrow-left-classes="fa fa-angle-up g-top-0" data-arrow-right-classes="fa fa-angle-down g-bottom-0" data-nav-for="#carousel-09-2">
                        @foreach($theater as $event)
                            @include('Bilettm.Partials.TheaterItem',['event'=>$event])
                        @endforeach
                    </div>
                </div>

                <div class="col-md-2">
                    <div id="carousel-09-2" class="js-carousel text-center u-carousel-v3 g-mx-minus-10 g-mx-minus-0--sm g-my-minus-5--sm" data-infinite="true" data-center-mode="true" data-vertical="true" data-slides-show="4" data-is-thumbs="true" data-nav-for="#carousel-09-1">
                        @foreach($theater as $event)
                            <div class="js-slide g-px-10 g-px-0--sm g-py-5--sm">
                                <img class="img-fluid w-100" src="{{$event->images->first()->image_path ?? '#'}}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>