<div class="modal modal-custom-centered modal-manage-admin-location fade" id="editAdminLocationModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3>Edit<span class="colored"> Location</span></h3>
                <h4>Manage Admin Fee</h4>
                
                <div class="form row">
                    <input type="hidden" id="user_type" name="user_type" value="for_trainer">
                    <div class="form-group col-md-6">
                        <label class="w-100" for="">Location</label>
                        <input class="form-control" placeholder="Add Location" type="text" name="location" id="location" value="Bancroft, Ontario, Canada">
                    </div>
                    <div class="form-group form-duration col-md-3">
                        <label for="">1 - on - 1 Training</label>
                        <input class="form-control" placeholder="$" type="text" name="one_on_one" id="one_on_one" value="1">
                        <span>/hr</span>
                    </div>
                    <div class="form-group form-duration col-md-3">
                        <label for="">2 - on - 1 Training</label>
                        <input class="form-control" placeholder="$" type="text" name="two_on_one" id="two_on_one" value="2">
                        <span>/hr</span>
                    </div>
                </div>

                <div class="actions text-right">
                    <button class="btn btn-danger-o mr10" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" id="submit">Update</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('scripts')
<script>
    $("#submit").on('click', function (e) {
        e.preventDefault();
        let formData = new FormData();
        formData.append('location', $('#location').val());
        formData.append('one_on_one', $('#one_on_one').val());
        formData.append('two_on_one', $('#two_on_one').val());
        formData.append('user_type', $('#user_type').val());

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ route('setterainerrates') }}',
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (response) {
                console.log(response)
                if (response.code == 200) {
                    let html = ''
                    html += '<div class="alert alert-success alert-dismissable alert-sticky">'
                    html += '<div class="cont">'
                    html += '<ul>'
                    html += '<li>' + response.message + '</li>'
                    html += '</ul>'
                    html += '<div class="alert__icon"><span></span></div>'
                    html += '</div>'
                    html += '</div>'
                    $('#errors').html(html)
                    setTimeout(() => {
                        window.location.reload()
                    }, 1000);

                } else if (response.code == 404) {
                    let html = ''
                    html += '<div class="alert alert-danger alert-dismissable alert-sticky">'
                    html += '<div class="cont">'
                    html += '<ul>'
                    html += '<li>' + response.message + '</li>'
                    html += '</ul>'
                    html += '<div class="alert__icon"><span></span></div>'
                    html += '</div>'
                    html += '</div>'
                    $('#errors').html(html)
                }
            }
        })
    })
</script>
@endpush