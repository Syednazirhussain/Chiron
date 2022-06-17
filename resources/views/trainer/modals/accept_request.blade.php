<div class="modal modal-custom-centered modal-accept-session-request fade acceptSessionRequestModal" id="acceptSessionRequestModal">
    <div class="modal-dialog">
        <div class="modal-content beforeAccept">
            <div class="modal-body">
                <button type="button" class="close acceptSessionRequestModalClose" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3><span class="colored">Accept</span> Request</h3>
                <p id="accept0">Are you sure want to Accept Carol's session request?</p>
                <div class="actions">
                    <input type="hidden" name="traineeid" id="accept_trainee_id">
                    <input type="hidden" name="acceptrowid" id="accept_row_id">
                    <input type="hidden" name="type" value="accept" id="accept_type">
                    <button class="btn btn-success-o mr10" data-dismiss="modal">CANCEL</button>
                    <button onclick="acceptSession('accept')" class="btn btn-success action_button">ACCEPT</button>
                </div>
            </div>
        </div>
        <div class="modal-content afterAccept d-none">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 id="thanks"><span class="colored">Thank You</span> Smitham</h3>
                <p><i class="fa fa-check-circle" aria-hidden="true"></i> Session accepted with <strong id="traineeName">Carol Brendon</strong></p>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

