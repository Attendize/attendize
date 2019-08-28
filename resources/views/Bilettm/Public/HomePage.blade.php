@extends('Bilettm.Layouts.BilettmLayout')
@section('after_styles')
    <link rel="stylesheet" href="{{asset('vendor/slick-carousel/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/owlcarousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/owlcarousel/assets/owl.theme.default.min.css')}}">
@endsection
@section('content')
@if($sliders->count()>0)
    @include('Bilettm.Partials.HomeSlider')
@endif
@if($cinema->count()>0)
    @include('Bilettm.Partials.HomeCinema')
@endif
@if($musical->count()>0)
    @include('Bilettm.Partials.HomeMusical')
@endif
<section id="first-add-wrapper" style="margin: 100px 0;">
    <div class="container">
        <div class="row" style="padding: 0 20px;">
            <a href="" style="width: 100%">
                <img src="{{asset('assets/images/advs/first.png')}}" style="width: 100%">
            </a>
        </div>
    </div>
</section>

@if($theatre->count()>0)
    @include('Bilettm.Partials.HomeTheatre')
@endif
<section id="second-add-wrapper" style="margin: 100px 0;">
    <div class="container">
        <div class="row" style="padding: 0 20px;">
            <a href="" style="width: 100%">
                <img src="{{asset('assets/images/advs/second.png')}}" style="width: 100%">
            </a>
        </div>
    </div>
</section>
@endsection
@section('after_scripts')
    <script src="{{asset('vendor/jquery-migrate/jquery-migrate.min.js')}}"></script>
    <!-- JS Implementing Plugins -->
    <script src="{{asset('vendor/slick-carousel/slick/slick.js')}}"></script>
    <script src="{{asset('vendor/dzsparallaxer/dzsparallaxer.js')}}"></script>
    <!-- JS Unify home teatr slider un ulanan sliderimin scriptleri -->
    <script src="{{asset('assets/javascript/hs.core.js')}}"></script>
    <script src="{{asset('assets/javascript/components/hs.carousel.js')}}"></script>
    <script src="{{asset('vendor/owlcarousel/owl.carousel.min.js')}}"></script>
    <!-- JS Plugins Init. -->
    <script>
        $(document).ready(function(){
            $("#slide-teator-prev").click(function(){
                $("#carousel-09-1 .js-prev").click();
            });
            $("#slide-teator-next").click(function(){
                $("#carousel-09-1 .js-next").click();
            });
        });
        // home page teatrda ulanan sliderim un script
        $(document).on('ready', function () {
            // initialization of carousel
            $.HSCore.components.HSCarousel.init('[class*="js-carousel"]');

            $('#carouselCus1').slick('setOption', 'responsive', [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3
                }
            }, {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            }], true);
        });
        //owl carousel
        $(document).ready(function(){
            $("#main-top-slider").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
            });
            $("#kinoteator-tab1").owlCarousel({
                items: 1,
            })
            $("#konserty-tab1").owlCarousel({
                items: 1,
            })
            $("#teator-tab1").owlCarousel({
                items: 1,
            })
        });
    </script>
@endsection