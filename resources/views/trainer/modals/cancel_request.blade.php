<div class="modal modal-custom-centered modal-cancel-session-request fade" id="cancelSessionRequestModal">
    <div class="modal-dialog">
        <div class="modal-content beforeAccept">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3><span class="colored">Cancel</span> Request</h3>
                <p id="cancel0">Are you sure want to Cancel Carol's session request?</p>
                <div class="actions">
                    <input type="hidden" name="traineeid" id="cancel_trainee_id">
                    <input type="hidden" name="cancelrowid" id="cancel_row_id">
                    <input type="hidden" name="type" value="cancel" id="cancel_type">
                    <button class="btn btn-danger-o mr10" data-dismiss="modal">CLOSE</button>
                    <button onclick="acceptSession('cancel')" class="btn btn-danger action_button">CANCEL</button>
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
                <p><i class="fa fa-times-circle" aria-hidden="true"></i> Session rejected with <strong id="traineeName">Carol Brendon</strong></p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
