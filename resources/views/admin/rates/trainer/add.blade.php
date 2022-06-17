<div class="modal modal-custom-centered modal-manage-trainer-location fade" id="manageTrainerLocationModal"
     tabindex="-1">
    <div class="modal-dialog" id="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form id="basic-form">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3>Add More<span class="colored"> Location</span></h3>
                    <h4>Manage Trainer Hourly Rates</h4>
                    {{--                                {{dd($countryEmptyTrainerRates)}}--}}
                    {{--                @if($countryEmptyTrainerRates->Rates == null)--}}
                    {{--               {{dd('aa')}} --}}
                    {{--                @endif--}}

                    <div class="form row">
                        <input type="hidden" id="user_type" name="user_type" value="for_trainer">
                        <div class="form-group col-md-12">
                            <label class="w-100" for="">Location <span class="text-danger">*</span></label>
                            <select class="form-select form-control" name="location" id="location">
                                <option value="" disabled>-Select</option>

                                @foreach($countries as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>
                            <!-- <input class="form-control" placeholder="Add Location" type="text" name="location" id="location" value=""> -->
                        </div>
                        <div class="form-group form-duration col-md-6">
                            <label for="">1 - on - 1 (Trainer fees)<span class="text-danger">*</span></label>
                            <input class="form-control u_num_field" placeholder="$" type="text"
                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                   min="1" maxlength="3" name="for_trainer[101]" id="one_on_one" required>

                            <span>/hr</span>
                        </div>
                        <div class="form-group form-duration col-md-6">
                            <label for="">2 - on - 1 (Trainer fees)<span class="text-danger">*</span></label>
                            <input class="form-control u_num_field" placeholder="$" type="text"
                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                   min="1" maxlength="3" name="for_trainer[201]" id="two_on_one" required>
                            <span>/hr</span>
                        </div>

                        <div class="form-group form-duration col-md-6">
                            <label for="">1 - on - 1 (Admin fees)<span class="text-danger">*</span></label>
                            <input class="form-control u_num_field" placeholder="$" type="text"
                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                   min="1" maxlength="3" name="for_admin[101]" id="one_on_onse" required>

                            <span>/hr</span>
                        </div>
                        <div class="form-group form-duration col-md-6">
                            <label for="">2 - on - 1 (Admin fees)<span class="text-danger">*</span></label>
                            <input class="form-control u_num_field" placeholder="$" type="text"
                                   oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                   min="1" maxlength="3" name="for_admin[201]" id="two_son_one" required>
                            <span>/hr</span>
                        </div>

                    </div>

                    <div class="actions text-right">
                        <button class="btn btn-danger-o mr10" data-dismiss="modal">Cancel</button>
                        <input class="btn btn-primary submit" type="submit" value="ADD">
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
        $(document).ready(function () {
            $("#basic-form").validate({
                errorClass: "error text-danger",
                validClass: "valid success-alert",
                rules: {
                    'for_admin[101]': {required: true},
                    'for_admin[201]': {required: true},
                    'for_trainer[101]': {required: true},
                    'for_trainer[201]': {required: true}
                },
                messages: {
                    // one_on_one: {
                    //     required: "Please enter amount"
                    // }, two_on_one: {
                    //     required: "Please enter amount"
                    // }
                }, submitHandler: function (e) {
                    let formData = new FormData();
                    $.each($('#basic-form').serializeArray(), function(i, field) {
                        formData.append(field.name, field.value);
                    });
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
                                $('#errors').html(html)
                                $('#manageTrainerLocationModal .close' ).click();

                            } else if (response.code == 404) {
                                let html = ''
                                html += '<div class="alert alert-danger alert-dismissable alert-sticky"><div class="cont">'
                                html += '<ul><li>' + response.message + '</li></ul><div class="alert__icon"><span></span></div></div></div>'
                                $('#errors').html(html)
                            }
                            setTimeout(function() {
                                $('#errors').fadeOut('fast');
                                window.location.reload()
                            }, 100);
                        }
                    })
                }
            });
        });

        //for adding number validation in firefox

        // $.fn.inputFilter = function (inputFilter) {
        //     return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function () {
        //         if (inputFilter(this.value)) {
        //             this.oldValue = this.value;
        //             this.oldSelectionStart = this.selectionStart;
        //             this.oldSelectionEnd = this.selectionEnd;
        //         } else if (this.hasOwnProperty("oldValue")) {
        //             this.value = this.oldValue;
        //             this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        //         } else {
        //             this.value = "";
        //         }
        //     });
        // };


        $(".u_num_field").inputFilter(function (value) {
            return /^-?\d*$/.test(value);
        });

        //validation ends for firefox num

    </script>
@endpush
