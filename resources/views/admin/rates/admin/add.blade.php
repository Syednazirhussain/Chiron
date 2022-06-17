<div class="modal modal-custom-centered modal-manage-admin-location fade" id="manageAdminLocationModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="modal-error-msg" class="modal-error-msg"></div>

                <h3>Add More<span class="colored"> Location</span></h3>
                <h4>Manage Admin Fee</h4>
                <form id="admin-rate-form">
                    <div class="form row">
                        <input type="hidden" id="user_type1" name="user_type" value="for_admin">
                        <div class="form-group col-md-6">
                            <label class="w-100" for="">Location</label>
                            <!-- countries -->
                            <select class="form-select form-control" name="location1" id="location1">
                                <option value="" disabled>-Select</option>
                                @foreach($countries as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            <!-- <input class="form-control" placeholder="Add Location" type="text" name="location" id="location1" value=""> -->
                        </div>
                        <div class="form-group form-duration col-md-3">
                            <label for="">1 - on - 1 Training</label>
                            <input class="form-control u_num_field" placeholder="$" type="text"
                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                   min="1" maxlength="3" name="one_on_one" id="one_on_one1" required>
                            <span>/hr</span>
                        </div>
                        <div class="form-group form-duration col-md-3">
                            <label for="">2 - on - 1 Training</label>
                            <input class="form-control u_num_field" placeholder="$" type="text"
                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                   min="1" maxlength="3" name="two_on_one" id="two_on_one1" required>
                            <span>/hr</span>
                        </div>
                    </div>

                    <div class="actions text-right">
                        <button class="btn btn-danger-o mr10" data-dismiss="modal">Cancel</button>
                        {{--                        <button class="btn btn-primary" id="submit-admin">Add</button>--}}
                        <input type="submit" class="btn btn-primary" id="submit-admin" value="Add">
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('scripts')
    <script>


        $("#admin-rate-form").validate({
            errorClass: "error text-danger",
            validClass: "valid success-alert",
            rules: {
                one_on_one: {required: true},
                two_on_one: {required: true}
            },
            messages: {
                one_on_one: {
                    required: "Please enter amount"
                }, two_on_one: {
                    required: "Please enter amount"
                }
            }, submitHandler: function (e) {
                let formData = new FormData();
                formData.append('location', $('#location1').val());
                formData.append('one_on_one', $('#one_on_one1').val());
                formData.append('two_on_one', $('#two_on_one1').val());
                formData.append('user_type', $('#user_type1').val());
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
                        if (response.code == 200) {
                            let html = ''
                            html += '<div class="alert alert-success alert-dismissable alert-sticky"><div class="cont">'
                            html += '<ul><li>' + response.message + '</li></ul><div class="alert__icon"><span></span></div></div></div>'
                            $('#admin-response').html(html)

                        } else if (response.code == 404) {
                            let html = ''
                            html += '<div class="alert alert-danger alert-dismissable alert-sticky"><div class="cont">'
                            html += '<ul><li>' + response.message + '</li>'
                            html += '</ul><div class="alert__icon"><span></span></div></div></div>'
                            $('#admin-response').html(html)
                        }
                        setTimeout(function () {
                            $('#admin-response').fadeOut('fast');
                        }, 1000);
                    },
                    error: function (response) {
                        console.log(response);
                        alert(response);
                        let html = ''
                        html += '<div class="alert alert-danger alert-dismissable alert-sticky"><li>' + 'All fields Are Required' + '</li>'
                        html += '</ul><div class="alert__icon"><span></span></div></div></div>'
                        $('.modal-error-msg').html(html)
                    }
                })
            }
        });

        //for adding number validation in firefox

        $.fn.inputFilter = function (inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function () {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    this.value = "";
                }
            });
        };


        $(".u_num_field").inputFilter(function (value) {
            return /^-?\d*$/.test(value);
        });

        //validation ends for firefox num


    </script>
@endpush
