<!-- Modal -->
<div class="modal fade modal-custom-centered" id="userDeleteModal" tabindex="-1" role="dialog" aria-labelledby="userDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header justify-content-center">
            <h3 class="modal-title" id="userDeleteModalLabel">Confirmation</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body py-3 font-w-500 text-center">
            Are you sure you want to delete this user.?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger deleteConfirmClicked">Confirm</button>
        </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    let user_id = 0
    $('.userDelete').on('click', function(e) {
        user_id = $(this).data('id')
        e.preventDefault()
    })


</script>
