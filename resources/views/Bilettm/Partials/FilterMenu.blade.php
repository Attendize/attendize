@section('after_styles')
    <link href="{{asset('vendor/gijgo/gijgo.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

<nav>
    <div class="container">
        <ul class="nav u-nav-v1-1 g-mb-20 category-filter" role="tablist" data-target="nav-1-1-default-hor-left" data-tabs-mobile-type="slide-up-down" data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-lightgray g-mb-20">

            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="" role="tab">Популярное</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="" role="tab">Новые</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="tab">Сегодня <i class="fa fa-caret-down"></i></a>
                <div class="dropdown-menu filter-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">Сегодня</a>
                    <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">На неделе</a>
                    <a class="dropdown-item nav-link" data-toggle="tab" href="" role="tab">В этом месяце</a>
                </div>
            </li>
            <li class="nav-item dropdown" style="position: relative; margin-left: -20px;">
                <form action="#gij" class="calendar-form">
                    {{--<a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="tab">Дата <i class="fa fa-caret-down"></i></a>--}}
                    <input id="datepicker" placeholder="Select date" />
                </form>
            </li>
        </ul>
    </div>
</nav>

@section('after_scripts')

    <script src="{{asset('vendor/gijgo/gijgo.min.js')}}" type="text/javascript"></script>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            icons: {
                rightIcon: 'Дата <i class="fa fa-caret-down"></i>'
            }
        });
    </script>

@endsection