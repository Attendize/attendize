<!-- Nav tabs -->
<ul class="nav u-nav-v1-1 g-mb-20" role="tablist" data-target="nav-1-1-default-hor-left"
    data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-lightgray g-mb-20">
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
        <a class="nav-link" id="date-click">Дата <i class="fa fa-caret-down"></i></a>
        <div class="p-3" id="date-click-content" style="background-color: #ffffff; left: -200px; border-radius: 5px; position: absolute; width: auto; z-index: 10; box-shadow: 2px 2px 5px rgba(0,0,0,.2), -2px 2px 5px rgba(0,0,0,.2), 2px -2px 5px rgba(0,0,0,.2), -2px -2px 5px rgba(0,0,0,.2);">
            <div style="position: relative; z-index: 10">
                <div class="col-xl-12 p-0" style="border-radius: 5px">
                    <!-- Datepicker -->
                    <div id="datepickerInline" class="u-datepicker-v1 u-shadow-v32 g-brd-none rounded"></div>
                    <!-- End Datepicker -->
                </div>
            </div>
        </div>
    </li>
</ul>
@push('after_scripts')
@endpush
<!-- End Nav tabs -->