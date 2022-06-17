@extends('admin.layouts.app')
@section('content')

    <div class="sessions__user__panel panel__style mb-4">
    <div class="hed">
            <h4>Upcoming Transactions</h4>
        </div>
        <div class="table table-responsive mb-0">
            <table id="sessions_table" class="table table-all-sessions table__style mb0">
                <div id="message" style="text-align:center"></div>
                <thead>
                <tr>
                    <th>Trainer</th>
                    <th>Trainee</th>
                    <th>Sessions</th>
                    <th>Date</th>
                    <th>Time</th>
                    {{-- <th>Admin Fee</th> --}}
                    <th>Trainer Fee</th>
                    <th style="text-align:center;">
                    @if( $amount > 0 )
                        <!-- <button class="btn btn-success paymentModal" data-toggle="modal"  data-target="#paymentModal">
                            Remittance: $<span id="totalAmount">{{ $amount ? $amount : 0 }}</span>
                        </button> -->
                    @endif
                    </th>
                </tr>
                </thead>
                @include('admin/modals/payment')
                @if(isset($allSessions) && $allSessions->count() > 0)
                    @foreach($allSessions as $key => $session)

                        <tr>
                            <td>

                                <div class="custom-flex">
                                    <div class="user-img">
                                            @if($session->trainer->profile_image)
                                                <img
                                                    src="{{ asset($storage.$session->trainer->profile_image) }}"
                                                    alt="">
                                            @else
                                                <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                                            @endif
                                    </div>
                                    <div class="user-name">
                                            @if($session->trainer->deleted == 1)
                                                <a href="#" data-toggle="tooltip" title="Account Is Blocked">
                                                    <b style="color: red"> {{$session->trainer->name}} </b>
                                                </a>
                                            @else
                                                {{$session->trainer->name}}
                                            @endif

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="custom-flex">
                                    <div class="user-img">
                                        @if(count($session->myTraineesNames) > 0)
                                            @if($session->myTraineesNames[0]->profile_image)
                                                <img
                                                    src="{{ asset($storage.$session->myTraineesNames[0]->profile_image) }}"
                                                    alt="">
                                            @else
                                                <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                                            @endif
                                        @else
                                            <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                                        @endif
                                    </div>
                                    <div class="user-name">
                                        @if(count($session->myTraineesNames) > 0)
                                            {{$session->myTraineesNames[0]->name}}
                                        @else
                                            -
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td>{{$session->training_session}}</td>
                            <td>{{date('j F, Y', strtotime($session->date))}}</td>
                            <td>{{$session->start_time}}</td>

                            {{-- <td> ${{ $session->userPayments->adminFee ?? 0}} </td> --}}
                            <td> ${{ trainer_earning($session->userPayments) ?? 0}} </td>
                            <td style="text-align:center;">

                            @if($session->transfer_id == NULL)
                                @if( compare_date(Carbon\Carbon::now() , $session->activation_date ) <= 0 )
                                    <input type="hidden" name="sessions_ids[]" value="{{ $session['id'] }}" />
                                    <button id="makePayment" class="btn btn-success sessPaymentModal">
                                        Payable
                                    </button>
                                @else
                                    <button id="makePayment" class="btn btn-danger sessPaymentModal">
                                        {{ compare_date(Carbon\Carbon::now() , $session->activation_date ) }} days left
                                    </button>
                                @endif
                            @else
                            <button id="makePayment" class="btn btn-success" disabled='disabled'>
                            Paid
                            </button>
                            @endif
                            </td>


                        </tr>
                    @endforeach
                @else
                <tr > <td colspan="9" style="vertical-align : middle;text-align:center;"> No Record Found </td> </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
@push('scripts')
{{--
    @include('admin.modals.payment')
<script>
    $(document).ready(function () {
        var setAmount, setCharge_id, setTrainer_id, setSession_id, data_id;

        $(document).on('click', '.sessPaymentModal', function(e) {
            setAmount      =   $(this).attr('data-amount');
            setCharge_id   =   $(this).attr('data-charge-id');
            setTrainer_id  =   $(this).attr('data-trainer-id');
            setSession_id  =   $(this).attr('data-session-id');
            data_id        =   $(this).attr('data-id');

            $('.wklyPaybtn').hide();
            $('.sessionPaymentbtn').show();
            $('#totalAmountModal').html( $(this).attr('data-amount-ne') );
        });

        $(document).on('click', '.paymentModal', function(e) {
            $('.wklyPaybtn').show();
            $('.sessionPaymentbtn').hide();
            $('#totalAmountModal').html( $('#totalAmount').text() );
        });

        //making single payment
        $(document).on('click', '.makePayment', function(e) {
            e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });

                let thiskey     =   $(this);
                let amount      =   setAmount;
                let charge_id   =   setCharge_id;
                let trainer_id  =   setTrainer_id;
                let session_id  =   setSession_id;
                let id          =   data_id;

                $.ajax({
                    type: 'POST',
                    url: '{{ route('make_payment') }}',
                    data:{'trainer_id':trainer_id, 'amount':amount, 'charge_id':charge_id, 'session_id':session_id},
                    beforeSend: function(){
                        thiskey.text('processing...');
                        thiskey.attr('disabled',true);
                        $('#wklyPay').attr('disabled',true);
                        $('.'+id).text('processing...');
                        $('.sessPaymentModal').attr('disabled',true);
                        $('.paymentModal').attr('disabled',true);

                    },
                    success: function (data) {
                        if( data.code == 404) {
                            $("#btnCancel").trigger('click');
                            $('#message').addClass('alert alert-danger');
                        } else {
                            $('.paymentModal').attr('disabled',false);
                            thiskey.attr('disabled',false);
                            $('.sessPaymentModal').attr('disabled',false);
                            $('.'+id).text('Paid');
                            $('.'+id).attr('disabled',true);

                            // let amount = data.transfer.amount/100;
                            // if( ($('#totalAmount').text() - amount) == 0 ) {
                            //     $('#wklyPay').attr('disabled',true);
                            // }
                            // $('#totalAmount').text( $('#totalAmount').text() - amount);
                            $("#btnCancel").trigger('click');
                            $('#message').addClass('alert alert-success')
                            setTimeout(function () {
                                window.location.reload()
                            }, 1000);
                        }
                        $('#message').text(data.message);

                    },
                    error: function (data) {
                        console.log(data.message);
                    }
                });
            });
    });

    $(document).ready(function () {
        //making weekly payment
        $(document).on('click', '#wklyPay', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            let thiskey     =   $(this);
            // let amount      =   thiskey.attr('data-amount');
            let trainer_id  =   thiskey.attr('data-trainer-id');
            var sessions_ids;
            sessions_ids = $("input[name='sessions_ids[]']").map(function(){return $(this).val();}).get();

            $.ajax({
                type: 'POST',
                url: '{{ route('make_all_payments') }}',
                data:{'trainer_id':trainer_id, 'sessions_ids':sessions_ids},
                beforeSend: function(){

                    thiskey.attr('disabled',true);
                    thiskey.text('processing...');
                    $('.sessPaymentModal').text('processing...');
                    $('.sessPaymentModal').attr('disabled',true);
                    $('.paymentModal').text('processing...');
                    $('.paymentModal').attr('disabled',true);
                },
                success: function (data) {
                    console.log(data);
                    if( data.code == 404) {
                        $("#btnCancel").trigger('click');
                        $('#message').addClass('alert alert-danger');
                    } else {
                        thiskey.text('Paid');
                        thiskey.attr('disabled',true);

                        $('.paymentModal').text('Paid');
                        $('.paymentModal').attr('disabled',true);

                        $('.sessPaymentModal').text('Paid');
                        $('.sessPaymentModal').attr('disabled',true);

                        $("#btnCancel").trigger('click');
                        $('#message').addClass('alert alert-success');

                        setTimeout(function () {
                            window.location.reload()
                        }, 1000);
                    }
                    $('#message').text(data.message);

                },
                error: function (data) {
                    console.log(data.message);
                }
            });
        });
    });

</script>
--}}
@endpush
