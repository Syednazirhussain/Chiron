@extends('trainee.layouts.app')
@section('title', 'Payment Information')


@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <div class="paymentInfo__panel panel__style">
        <div class="loaderSignUp" id="loaderShow">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                 style="margin: auto; background: rgba(241, 242, 243, 0); display: block; shape-rendering: auto;"
                 width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                <g transform="rotate(0 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.9166666666666666s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(30 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.8333333333333334s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(60 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s"
                                 repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(90 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.6666666666666666s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(120 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.5833333333333334s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(150 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s"
                                 repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(180 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.4166666666666667s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(210 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.3333333333333333s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(240 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s"
                                 repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(270 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.16666666666666666s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(300 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                 begin="-0.08333333333333333s" repeatCount="indefinite"></animate>
                    </rect>
                </g>
                <g transform="rotate(330 50 50)">
                    <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#0092d9">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s"
                                 repeatCount="indefinite"></animate>
                    </rect>
                </g>
            </svg>
        </div>
        <div class="hed">
            <h4><span class="colored mr-1">Change</span>Payment Info</h4>
        </div>
        <br>






        <div class="payment-img">
            <img src="{{ asset('assets/trainee/images/stripe.png') }}" alt="">
        </div>
        <div class="form-group col-md-12 text-left" id="savedCard">
                    <div class="row show_stripe {{ Auth::user()->last_four_card_digits ? '' : 'd-none' }}" >
                        <div class="col-md-9 ">
                            <div class="btn">
                            <span class="text-primary">Already Saved Card</span>: Card **** **** **** {{ Auth::user()->last_four_card_digits }} Expire date {{Auth::user()->exp_month ?? ''}}/{{Auth::user()->exp_year ?? ''}}
                        </div> </div>
                        <div class="col-md-3">
                            <button class="btn btn-link" type="button" id="changePayment" onclick="show_stripe_form()">Change Method</button>
                        </div>
                    </div>
                    </div>

<div class="row stripe_form {{ !Auth::user()->last_four_card_digits ? '' : 'd-none' }}">

    <div class="col-md-5">
        <div class="form">
            <div id="errors"></div>
            <form id="basic-form" name="form-s11" class="form stripe_trainee_payment">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                <div class="row m-0">
                    <div class="form-group col-md-12">
                        <label for="">Full Name <span class="text-danger">*</span></label>
                        <input type="text" name="card_name" id="card_name"
                               class="form-control"
                               placeholder="Name" required>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="form-group col-md-12">
                        <label for="">Card Number <span class="text-danger">*</span></label>
                        {{--                        <label for="">Ending with {{$user->last_four_card_digits}}</label>--}}
                        <input type="text" name="card" id="card" class="form-control"
                               required>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="form-group col-md-6">
                        <label for="">Expiry Month <span class="text-danger">*</span></label>
                        <input type="text" name="exp_month" id="exp_month" value="{{ old('exp_month' )}}"
                               class="form-control"
                               onkeypress='validate(event)' placeholder="MM" maxlength="2" minlength="2">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Expiry Year<span class="text-danger">*</span></label>

                        <input type="text" name="exp_year" id="exp_year" value="{{ old('exp_year')}}"
                               class="form-control"
                               onkeypress='validate(event)' placeholder="YYYY" maxlength="4" minlength="4" required>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="form-group col-md-6">
                        <label for="">CVV<span class="text-danger">*</span></label>
                        <input type="text" name="cvv" id="cvv" class="form-control" onkeypress='validate(event)'
                               placeholder="xxx" maxlength="3" minlength="3" required>
                    </div>
                </div>
                <div class="row m-0">
                        <div class="form-group col-md-12 text-right">
                        <button type="button" class="btn btn-default {{ Auth::user()->last_four_card_digits ? '' : 'd-none' }}" onclick="old_stripe_form()">Cancel</button>

                        <button class="submit btn btn-primary" id="payment_save" type="submit">Save</button>
                    </div>


                </div>
            </form>


        </div>
    </div>

    <div class="col-md-7">
        <div class="card-wrapper"></div>
    </div>

</div>

    </div>

@endsection

<style>
    #payment_stripe{
        display: none;
    }
    #savedCard {
    display: flex;
}
</style>

@push('scripts')

    <script>
        function show_stripe_form() {
        $('.stripe_form').removeClass('d-none');
        $('.show_stripe').addClass('d-none');
        $(".card_exists").val("0");
        }
        function old_stripe_form() {
            $('.stripe_form').addClass('d-none');
            $('.show_stripe').removeClass('d-none');
            $(".card_exists").val("1");

        }
        $(document).ready(function () {



            $("#basic-form").validate({
                errorClass: "error text-danger" ,
                rules: {

                    card_name: {
                        required: true,
                    },
                    card: {
                        required: true,
                    },
                    exp_month: {
                        required: true,
                        max:12
                    },
                    exp_year: {
                        required: true,
                        min:new Date().getFullYear()
                    },
                    cvv: {
                        required: true,
                    },

                },
                messages: {
                    card_name: {

                    },
                    card: {

                    },
                    exp_month: {

                    },
                    exp_year: {

                    },
                    cvv: {

                    },

                }
                , submitHandler: function (form) {

                    // e.preventDefault();
                    let formData = new FormData(form);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route('cstore') }}',
                        data: formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        success: function (response) {
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
                                $('html, body').animate({
                                    scrollTop: 0
                                }, 'slow');
                                setTimeout(function () {
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
                                $('html, body').animate({
                                    scrollTop: 0
                                }, 'slow');
                            }
                        }, error: function (response) {

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
                            $('html, body').animate({
                                scrollTop: 0
                            }, 'slow');

                            console.log('error');
                        }
                    })


                }
            });
        });
    </script>
    {{--old ajax--}}
    <script type="text/javascript">

    </script>
    {{--    old ajax ends here --}}

    <style>


        .loaderSignUp {
            /* background: #00000070; */
            height: 344%;
            width: 100%;
            /* position: absolute; */
            z-index: 10;
            top: 0;
            vertical-align: middle;
            display: none;
        }

        .loaderSignUp svg {
            position: relative;
            top: 20%;
        }


    </style>

@endpush
