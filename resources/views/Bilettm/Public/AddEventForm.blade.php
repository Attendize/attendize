<div class="title-and-btn">
    <div class="tab-header d-flex justify-content-between col-12 px-0 m-auto" style="width: calc(100% - 10px)">
        <h4 class="font-weight-bold">Добавить событие</h4>
        <div style="height: 5px; position: absolute; bottom: 15px; width: 100px; background-color: rgba(211,61,51,1)"></div>
        <div class="">
            <a class="modal-send red_button" style="float: right" href="">Send</a>
            <span style="float: right; font-size: 12px" class="text-right font-weight-bold">*Required field(s)</span>
        </div>
    </div>
    <div class="">
        <form action="{{route('add_event')}}" class="row w-100 m-auto" method="post">
            @csrf
            <div class="form-group col-6">
                <label for="">First Name*</label>
                <input type="text" placeholder="Orazgeldi" class="form-control">
            </div>
            <div class="form-group col-6">
                <label for="">Phone*</label>
                <input type="text" placeholder="+99362222222" class="form-control">
            </div>
            <div class="form-group col-6">
                <label for="">Venue*</label>
                <input type="text" placeholder="Konsertny zal Turkmenistan" class="form-control">
            </div>
            <div class="form-group col-6">
                <label for="">Email*</label>
                <input type="email" placeholder="Sizin elektron poctanyz" class="form-control">
            </div>
            <div class="form-group col-12" style="padding: 0 5px">
                <label for="">Message*</label>
                <textarea name="" id="" cols="30" rows="5" placeholder="Message" class="form-control"></textarea>
            </div>
        </form>
        <p style="padding: 0 5px; color: #000000; margin: auto; font-size: 13px; font-weight: bold">* Gechirmek isleyan charaniz  barada maglumatlary doldyryp bize ugradyn! maglumatlarynyzy seljerip siz bilen habarlasharys.</p>
    </div>
</div>