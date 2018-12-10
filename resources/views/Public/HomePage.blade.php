@extends('Public.Layouts.HomePageLayout')
@section('head')
    {!!HTML::style('assets/out/revolution-slider/revolution/css/layers.css')!!}
    {!!HTML::style('assets/out/revolution-slider/revolution/css/settings.css')!!}
    {!!HTML::style('assets/out/revolution-slider/revolution/css/navigation.css')!!}
    {!!HTML::style('assets/out/icon-material/material-icons.css')!!}

@stop
@section('content')
    @include('Public.Partials.PublicHeader')

    <section id="home" >
        <div id="promoSliderWrapper" class="rev_slider_wrapper fullscreen-container" data-alias="scroll-effect76" style="background-color: #111111; padding: 0;">
            <!-- START REVOLUTION SLIDER 5.0.7 fullscreen mode -->
            <div id="promoSlider" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.0.7">
                <ul>
                    <!-- SLIDE  -->
                    <li data-index="rs-309"
                        data-transition="slideoverhorizontal"
                        data-slotamount="default"
                        data-easein="Power4.easeInOut"
                        data-easeout="Power4.easeInOut"
                        data-masterspeed="1000"
                        data-thumb="assets/img-temp/100x50/img1.jpg"
                        data-rotate="0"
                        data-fstransition="fade"
                        data-fsmasterspeed="1500"
                        data-fsslotamount="7"
                        data-saveperformance="off"
                        data-title="Unify Agency">
                        <!-- MAIN IMAGE -->
                        <img class="rev-slidebg" src="{{URL::asset('assets/img-temp/1920x1080/img1.jpg')}}" alt="Image description"
                             data-bgposition="center center"
                             data-bgfit="cover"
                             data-bgrepeat="no-repeat"
                             data-bgparallax="10"
                             data-no-retina>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div id="promoSliderLayer11" class="tp-caption tp-shape tp-shapewrapper rs-parallaxlevel-0" style="z-index: 5; background-color: rgba(0, 0, 0, 0.50); border-color: rgba(0, 0, 0, 0); background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.45) 100%);"
                             data-x="['center','center','center','center']"
                             data-hoffset="['0','0','0','0']"
                             data-y="['bottom','bottom','bottom','bottom']"
                             data-voffset="['0','0','0','0']"
                             data-width="full"
                             data-height="['400','400','400','550']"
                             data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-style_hover="cursor:default;"
                             data-transform_in="opacity:0;s:1500;e:Power2.easeInOut;"
                             data-transform_out="opacity:0;s:1000;s:1000;"
                             data-start="0"
                             data-basealign="slide"
                             data-responsive_offset="off"
                             data-responsive="off"></div>


                    </li>
                    <!-- SLIDE  -->
                    <li data-index="rs-311"
                        data-transition="slideoverhorizontal"
                        data-slotamount="default"
                        data-easein="Power4.easeInOut"
                        data-easeout="Power4.easeInOut"
                        data-masterspeed="1000"
                        data-thumb="assets/img-temp/100x50/img3.jpg"
                        data-rotate="0"
                        data-saveperformance="off"
                        data-title="Scroll Down">
                        <!-- MAIN IMAGE -->
                        <img class="rev-slidebg" src="{{URL::asset('assets/img-temp/1920x1080/img1.jpg')}}" alt="Image description"
                             data-bgposition="center center"
                             data-bgfit="cover"
                             data-bgrepeat="no-repeat"
                             data-bgparallax="10"
                             data-no-retina>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div id="promoSliderLayer311" class="tp-caption tp-shape tp-shapewrapper rs-parallaxlevel-0" style="z-index: 5; background-color: rgba(0, 0, 0, 0.50); border-color: rgba(0, 0, 0, 0); background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.45) 100%);"
                             data-x="['center','center','center','center']"
                             data-hoffset="['0','0','0','0']"
                             data-y="['bottom','bottom','bottom','bottom']"
                             data-voffset="['0','0','0','0']"
                             data-width="full"
                             data-height="['400','400','400','550']"
                             data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-style_hover="cursor:default;"
                             data-transform_in="opacity:0;s:1500;e:Power2.easeInOut;"
                             data-transform_out="opacity:0;s:1000;s:1000;"
                             data-start="0"
                             data-basealign="slide"
                             data-responsive_offset="off"
                             data-responsive="off"></div>

                        <!-- LAYER NR. 2 -->
                        <div id="promoSliderLayer31" class="tp-caption BigBold-Title tp-resizeme rs-parallaxlevel-0" style="z-index: 6; text-transform: uppercase; white-space: nowrap;"
                             data-x="['left','left','left','left']"
                             data-hoffset="['50','50','30','17']"
                             data-y="['bottom','bottom','bottom','bottom']"
                             data-voffset="['110','110','180','160']"
                             data-fontsize="['110','100','70','60']"
                             data-lineheight="['100','90','60','60']"
                             data-width="['none','none','none','400']"
                             data-height="none"
                             data-whitespace="['nowrap','nowrap','nowrap','normal']"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_in="x:0px;y:[100%];"
                             data-mask_out="x:inherit;y:inherit;"
                             data-start="500"
                             data-splitin="none"
                             data-splitout="none"
                             data-basealign="slide"
                             data-responsive_offset="off">Scroll down
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div id="promoSliderLayer34" class="tp-caption BigBold-SubTitle rs-parallaxlevel-0" style="z-index: 7; min-width: 410px; max-width: 410px; white-space: normal;"
                             data-x="['left','left','left','left']"
                             data-hoffset="['55','55','33','20']"
                             data-y="['bottom','bottom','bottom','bottom']"
                             data-voffset="['40','1','74','58']"
                             data-fontsize="['15','15','15','13']"
                             data-lineheight="['24','24','24','20']"
                             data-width="['410','410','410','280']"
                             data-height="['60','100','100','100']"
                             data-whitespace="normal"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                             data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-start="650"
                             data-splitin="none"
                             data-splitout="none"
                             data-basealign="slide"
                             data-responsive_offset="off"
                             data-responsive="off">This Premium Revolution Slider Template Features an Exclusive Scroll Effect. Get it Now!
                        </div>

                        <!-- LAYER NR. 4 -->
                        <div id="promoSliderLayer37" class="tp-caption BigBold-Button rev-btn rs-parallaxlevel-0" style="z-index: 8; text-transform: uppercase; white-space: nowrap; border-color: rgba(255, 255, 255, 0.25); outline: none; box-shadow: none; box-sizing: border-box; -moz-box-sizing: border-box; -webkit-box-sizing: border-box;"
                             data-x="['left','left','left','left']"
                             data-hoffset="['480','480','30','20']"
                             data-y="['bottom','bottom','bottom','bottom']"
                             data-voffset="['50','50','30','20']"
                             data-width="none"
                             data-height="none"
                             data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                             data-style_hover="c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);cursor:pointer;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                             data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-start="650"
                             data-splitin="none"
                             data-splitout="none"
                             data-actions='[
                       {"event":"click","action":"scrollbelow","offset":"px"}
                     ]'
                             data-basealign="slide"
                             data-responsive_offset="off"
                             data-responsive="off">Read more
                        </div>

                        <!-- LAYER NR. 5 -->
                        <div id="promoSliderLayer312" class="tp-caption BigBold-Button rev-btn rs-parallaxlevel-0" style="z-index: 9; white-space: nowrap; padding: 15px 20px 15px 20px; border-color: rgba(255, 255, 255, 0.25); outline: none; box-shadow: none; box-sizing: border-box; -moz-box-sizing: border-box; -webkit-box-sizing: border-box;"
                             data-x="['left','left','left','left']"
                             data-hoffset="['676','676','226','216']"
                             data-y="['bottom','bottom','bottom','bottom']"
                             data-voffset="['50','50','30','20']"
                             data-width="none"
                             data-height="none"
                             data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                             data-style_hover="c:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 1.00);cursor:pointer;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                             data-transform_out="y:50px;opacity:0;s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-start="650"
                             data-splitin="none"
                             data-splitout="none"
                             data-actions='[
                       {"event":"click","action":"jumptoslide","slide":"next","delay":""}
                     ]'
                             data-basealign="slide"
                             data-responsive_offset="off"
                             data-responsive="off">
                            <i class="fa fa-chevron-right"></i>
                        </div>
                    </li>
                </ul>
                <div class="tp-static-layers"></div>
                <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
            </div>
        </div><!-- END REVOLUTION SLIDER -->
    </section>

    @include('Public.Partials.PublicContent')

    @include('Public.Partials.PublicFooter')
@stop
@section('foot')
    {!!HTML::script('assets/out/revolution-slider/revolution/js/jquery.themepunch.tools.min.js')!!}
    {!!HTML::script('assets/out/revolution-slider/revolution/js/jquery.themepunch.revolution.min.js')!!}
    {!!HTML::script('assets/out/revolution-slider/revolution/js/extensions/revolution.extension.actions.min.js')!!}
    {!!HTML::script('assets/out/revolution-slider/revolution/js/extensions/revolution.extension.layeranimation.min.js')!!}
    {!!HTML::script('assets/out/revolution-slider/revolution/js/extensions/revolution.extension.navigation.min.js')!!}
    {!!HTML::script('assets/out/revolution-slider/revolution/js/extensions/revolution.extension.parallax.min.js')!!}
    {!!HTML::script('assets/out/revolution-slider/revolution/js/extensions/revolution.extension.slideanims.min.js')!!}
    <script>
        // initialization of revolution slider
        var tpj = jQuery,
            promoSlider;

        tpj(document).on('ready', function () {
            if (tpj('#promoSlider').revolution == undefined) {
                revslider_showDoubleJqueryError('#promoSlider');
            } else {
                promoSlider = tpj('#promoSlider').show().revolution({
                    sliderType: 'standard',
                    jsFileLocation: '../../revolution/js/',
                    sliderLayout: 'fullscreen',
                    dottedOverlay: 'none',
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: 'off',
                        keyboard_direction: 'horizontal',
                        mouseScrollNavigation: 'off',
                        onHoverStop: 'off',
                        touch: {
                            touchenabled: 'on',
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: 'horizontal',
                            drag_block_vertical: false
                        },
                        bullets: {
                            enable: true,
                            hide_onmobile: true,
                            hide_under: 960,
                            style: 'zeus',
                            hide_onleave: false,
                            direction: 'horizontal',
                            h_align: 'center',
                            v_align: 'bottom',
                            h_offset: 80,
                            v_offset: 50,
                            space: 5,

                        }
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [868, 768, 960, 720],
                    lazyType: 'none',
                    parallax: {
                        type: 'mouse',
                        origo: 'slidercenter',
                        speed: 2000,
                        levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                        disable_onmobile: 'on'
                    },
                    shadow: 0,
                    spinner: 'off',
                    stopLoop: 'on',
                    stopAfterLoops: 0,
                    stopAtSlide: 1,
                    shuffle: 'off',
                    autoHeight: 'off',
                    fullScreenAlignForce: 'off',
                    fullScreenOffset: '60px',
                    disableProgressBar: 'on',
                    hideThumbsOnMobile: 'off',
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: 'off',
                        nextSlideOnWindowFocus: 'off',
                        disableFocusListener: false
                    }
                });

                var newCall = new Object(),
                    cslide;

                newCall.callback = function () {
                    var proc = promoSlider.revgetparallaxproc(),
                        fade = 1 + proc,
                        scale = 1 + (Math.abs(proc) / 10);

                    punchgs.TweenLite.set(promoSlider.find('.slotholder, .rs-background-video-layer'), {
                        opacity: fade,
                        scale: scale
                    });
                };

                newCall.inmodule = 'parallax';
                newCall.atposition = 'start';

                promoSlider.bind('revolution.slide.onloaded', function (e) {
                    promoSlider.revaddcallback(newCall);
                });
            }
        });
    </script>
@stop