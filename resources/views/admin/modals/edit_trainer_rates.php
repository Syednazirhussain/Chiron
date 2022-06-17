<div class="modal modal-custom-centered modal-manage-admin-location modal-edit-trainer-rates  fade" id="editTrainerRatesModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="modal-error-msg" class="modal-error-msg"></div>

                <h3><span class="colored">Set </span>Rates</h3>
                <h4>Hourly Rate(Bases on your location)</h4>
                <form id="admin-rate-form">
                    <div class="form row text-center">
                        <input type="hidden" id="user_type1" name="user_type" value="for_admin">
                        
                        <div class="form-group form-duration col-12">
                            <label for="">2 - on - 1 Sessions : </label>
                            <input class="form-control u_num_field" placeholder="$" type="text"
                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                   min="1" maxlength="3" name="one_on_one" id="one_on_one1" required>
                            <span> /hr</span>
                        </div>
                        <div class="form-group form-duration col-12">
                            <label for="">Set Commissions : </label>
                            <input class="form-control u_num_field" placeholder="$" type="text"
                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                   min="1" maxlength="3" name="two_on_one" id="two_on_one1" required>
                            <span> /hr</span>
                        </div>
                    </div>

                    <div class="actions text-center">
                        <input type="submit" class="btn btn-primary" id="submit-admin" value="Save">
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
