<div class="modal modal-custom-centered modal-session-request fade" id="sessionRequestModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3><span class="colored">Session</span> Request</h3>
                <div class="__img">
                    <img id="imageRequest" src="{{ asset('assets/trainer/images/trainee/big_img1.png') }}" alt="">
                </div>
                <div class="__cont">
                    <h4 id="nameRequest">Carol Brendon</h4>
                    <div class="listing">
                        <ul>
                            <li><img src="{{ asset('assets/trainer/images/icons/calendar.png') }}" alt=""><span id="dateRequest"> 23/08/2021 </span></li>
                            <li><img src="{{ asset('assets/trainer/images/icons/clock.png') }}" alt=""><span id="timeRequest">08 : 00 AM </span></li>
                            <!-- <li><img src="{{ asset('assets/trainer/images/icons/fitness.png') }}" alt="">1 - on - 1</li> -->
                            <li><img src="{{ asset('assets/trainer/images/icons/location.png') }}" alt=""><span id="locationRequest">Your Location </span></li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="__action">
                    <button class="btn btn-success accept-req">Accept</button>
                    <button class="btn btn-danger decline-req">Decline</button>
                </div> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
