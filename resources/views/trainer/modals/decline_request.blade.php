<div class="modal modal-custom-centered modal-decline-session-request fade" id="declineSessionRequestModal">
    <div class="modal-dialog">
        <div class="modal-content beforeAccept">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3><span class="colored">Delete</span> Request</h3>
                <p id="reject0">Are you sure want to decline Carol's session request?</p>
                <div class="actions">
                    <input type="hidden" name="traineeid" id="reject_trainee_id">
                    <input type="hidden" name="rejectrowid" id="reject_row_id">
                    <input type="hidden" name="type" value="decline" id="reject_type">
                    <button class="btn btn-danger-o mr10" data-dismiss="modal">CANCEL</button>
                    <button onclick="acceptSession('reject')" class="btn btn-danger action_button">DECLINE</button>
                </div>
            </div>
        </div>
        <div class="modal-content afterAccept d-none">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3><span class="colored">Session</span> Deleted</h3>
                <div class="__img">
                    <img src="{{ asset('assets/trainer/images/trainee/big_img1.png') }}" alt="">
                </div>
                <p><i class="fa fa-times-circle" aria-hidden="true"></i> Session rejected with <strong id="traineeName">Carol
                        Brendon</strong></p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
