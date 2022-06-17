<div class="modal modal-custom-centered modal-remove-account fade" id="declineTrainerProfileModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form class="personal__form w-100" action="{{ route('approvedTrainer') }}" method="post">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="trainer_id" class="trainer_id">
                    <input type="hidden" name="approved" value="2">
                    <input type="hidden" name="status" value="cancelled">
                <h3 class="decline-modal-title"></h3>
                <!-- <p id="reject0"></p> -->
                    <p id="declined_name"></p>
                <div class="actions">
                    <button class="btn btn-primary-o mr10" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger">Deactive</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
