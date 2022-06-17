<div class="modal modal-custom-centered modal-remove-account fade" id="approveTrainerProfileModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form class="personal__form w-100" action="{{ route('approvedTrainer') }}" method="post">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="trainer_id" class="trainer_id">
                    <input type="hidden" name="approved" value="1">
                    <input type="hidden" name="status" value="approved">
                    <h3 class="approve-modal-title"></h3>
                    <p id="approved_name"></p>
                    <div class="actions">
                        <button class="btn btn-primary-o mr10" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-success approveModalbtn">Active</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>