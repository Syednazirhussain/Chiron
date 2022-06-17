@extends('web.layouts.app')
@section('content')

<section class="acc-forgot">
    <div class="container">
        <div class="row justify-content-center">
            <div class="forgot__box col-md-5">

                <h2>Reset Your<br/> <span>Password</span></h2>
                @include('flash-message')
                <form action="{{ route('forget.password.post') }}" method="POST" id="forgetForm">
                @csrf

                @php
                    if (!isset($token)) {
                        $token = \Request::route('token');
                    }
                @endphp

                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label for="">Email <span class="text-danger">*</span> </label>
                    <input type="text" name="email" class="form-control" placeholder="name@domain.com" required >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary w-100" id="submit_button">Forgot Password</button>
                </div>
                <div class="form-group mt-4">
                    <h5>Go back to <a href="{{ route('accountLogin') }}">Login</a> screen</h5>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>


<script>
$( document ).ready(function() {
    $("#forgetForm").validate({
        errorClass: "error text-danger" ,
        validClass: "valid success-alert",
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        submitHandler: function(form) {
            // return false;
            $('#submit_button').text('Sending...');
            form.submit();
        }
    });
});
</script>

@endsection
