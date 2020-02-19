<section id="location" class="container p0">
    <div class="row">
        <div class="col-md-12">
            <div class="google-maps content">
                <?php if(!empty(config("attendize.google_maps_geocoding_key"))): ?>
                <iframe frameborder="0" style="border:0;" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{$event->map_address}}&amp;aq=0&amp;oq={{$event->map_address}}&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq={{$event->map_address}}&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
                <?php elseif(!empty(config("attendize.google_maps_embed_key"))): ?>
                <iframe frameborder="0" style="border:0;" src="https://www.google.com/maps/embed/v1/place?key={{config("attendize.google_maps_embed_key")}}&q={{$event->location_address_line_1}}%20{{$event->location_address_line_1}}%20{{$event->location_state}}%20{{$event->location_post_code}}"></iframe>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>