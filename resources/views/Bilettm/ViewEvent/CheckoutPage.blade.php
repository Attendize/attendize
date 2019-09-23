@extends('Bilettm.Layouts.BilettmLayout')
@section('content')
    @include('Bilettm.ViewEvent.Partials.HeaderSection')

    @include('Bilettm.ViewEvent.Partials.CreateOrderSection')

    @include('Bilettm.ViewEvent.Partials.FooterSection')
@endsection
@section('after_scripts')
    @include("Shared.Partials.LangScript")
    {!!HTML::script(config('attendize.cdn_url_static_assets').'/assets/javascript/frontend.js')!!}
    <script>
        var OrderExpires = {{strtotime($expires)}};
        $('#mirror_buyer_info').on('click', function(e) {
            $('.ticket_holder_first_name').val($('#order_first_name').val());
            $('.ticket_holder_last_name').val($('#order_last_name').val());
            $('.ticket_holder_email').val($('#order_email').val());
        });
        function setCountdown($element, seconds) {

            var endTime, mins, msLeft, time, twoMinWarningShown = false;

            function twoDigits(n) {
                return (n <= 9 ? "0" + n : n);
            }

            function updateTimer() {
                msLeft = endTime - (+new Date);
                if (msLeft < 1000) {
                    alert(lang("time_run_out"));
                    location.reload();
                } else {

                    if (msLeft < 120000 && !twoMinWarningShown) {
                        showMessage(lang("just_2_minutes"));
                        twoMinWarningShown = true;
                    }

                    time = new Date(msLeft);
                    mins = time.getUTCMinutes();
                    $element.html('<b>' + mins + ':' + twoDigits(time.getUTCSeconds()) + '</b>');
                    setTimeout(updateTimer, time.getUTCMilliseconds() + 500);
                }
            }

            endTime = (+new Date) + 1000 * seconds + 500;
            updateTimer();
        }
    </script>
    @if(isset($secondsToExpire))
        <script>if($('#countdown')) {setCountdown($('#countdown'), {{$secondsToExpire}});}</script>
    @endif
@endsection