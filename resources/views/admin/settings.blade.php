@extends('admin.layouts.app')
@section('title', 'Settings')
@section('content')

<div class="admin__profile__panel panel__style">
    <form id="setting-form">
        <div class="row personal__info">
            <div class="col-md-6 form__lft">
                <input type="hidden" value="{{$setting['id']}}" name="id" id="id">
                <div class="form-group form-duration col">
                    <label for="">Sales Tax<span class="text-danger">*</span></label>
                    <input class="form-control valid success-alert" placeholder="$" type="text"

                           min="1" maxlength="7" name="sales_tax" id="sales_tax" value="{{$setting['sales_tax']}}" required>

                </div>
                <div class="form-group form-duration col">
                    <label for="">Extra Charge<span class="text-danger">*</span></label>
                    <input class="form-control valid success-alert" placeholder="$" type="text"

                           min="1" maxlength="7" name="extra_charge" id="extra_charge" value="{{$setting['extra_charge']}}" required>


                </div>
                <div class="form-group form-duration col">
                    <label for="">Stripe Fee<span class="text-danger">*</span></label>
                    <input class="form-control valid success-alert" placeholder="$" type="text"

                           min="1" maxlength="7" name="stripe_fee" id="stripe_fee" value="{{$setting['stripe_fee']}}" required>

                </div>
                <div class="actions col-12">

                    <input class="btn btn-primary submit" type="submit" value="Update">
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>

    $(document).ready(function($){
        $(".submit").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();

        let formData = {
            sales_tax: $('#sales_tax').val(),
            extra_charge: $('#extra_charge').val(),
            stripe_fee: $('#stripe_fee').val(),
            id: $('#id').val(),
        };
        var type = "POST";
        $.ajax({
            type: type,
            url : "{{route('settings_update')}}",
            data: formData,

            success: function (data) {
                alertify.success(data.message);

            },
            error: function (data) {
                if(JSON.parse(data.responseText).errors){
                    let myObj = JSON.parse(data.responseText).errors;
                    var message  =  '<ol>';
                        if ('extra_charge' in myObj){
                            message = "<li>"+JSON.parse(data.responseText).errors.extra_charge[0]+"</li>";
                    }
                    if ('sales_tax' in myObj){
                        message += '<li>'+JSON.parse(data.responseText).errors.sales_tax[0]+"</li>";
                    }
                    if ('stripe_fee' in myObj){
                        message += '<li>'+JSON.parse(data.responseText).errors.stripe_fee[0]+"</li>";
                    }
                    message  += '</ol>';
                    alertify.error(message);
                }
            }
        });
    });







console.log(jQuery().jquery);
});
</script>

