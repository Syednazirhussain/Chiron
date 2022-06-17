@extends('admin.layouts.app')
@section('content')

<div class="earning__user__panel panel__style mb-4">
    <div id="message" style="text-align:center"></div>
    @if (\Session::has('msg'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('msg') !!}</li>
        </ul>
    </div>
    @endif
    <div class="hed hed__filter">
        <div class="filter__tab">
            <h5>Filter By</h5>
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="earning-first-tab1-tab" data-toggle="pill" href="#earning-first-tab1"
                    role="tab" aria-controls="earning-first-tab1" aria-selected="true">Weekly</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="earning-first-tab2-tab" data-toggle="pill" href="#earning-first-tab2"
                    role="tab" aria-controls="earning-first-tab2" aria-selected="false">Monthly</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="earning-first-tab3-tab" data-toggle="pill" href="#earning-first-tab3"
                    role="tab" aria-controls="earning-first-tab3" aria-selected="false">Annually</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content mt-5" id="custom-tabs-one-tabContent">
        <div class="tab-pane fade show active" id="earning-first-tab1" role="tabpanel"
        aria-labelledby="earning-first-tab1-tab">   
        <div class="hed">
            <h4>Earnings – <span class="colored">Weekly summary</span> for Trainer Remittance </h4>
        </div>
        @include('admin.earning.earning-table',['data' => $earnings['lastWeekSessions'],'dates'=>$earning_dates['last_week']])
        
    </div>
    <div class="tab-pane fade" id="earning-first-tab2" role="tabpanel" aria-labelledby="earning-first-tab2-tab">
        <div class="hed">
            <h4>Earnings – <span class="colored">Monthly summary</span> for Trainer Remittance </h4>
        </div>
        @include('admin.earning.earning-table',['data' => $earnings['lastMonthSessions'],'dates'=>$earning_dates['last_month']])

    </div>
    <div class="tab-pane fade" id="earning-first-tab3" role="tabpanel" aria-labelledby="earning-first-tab3-tab">
        <div class="hed">
            <h4>Earnings – <span class="colored">Annually summary</span> for Trainer Remittance </h4>
        </div>
        @include('admin.earning.earning-table',['data' => $earnings['lastYearSessions'],'dates'=>$earning_dates['last_year']])
    </div>
</div>
</div>
@if(1)
    <div class="earning__user__panel panel__style mb-4">
        <div class="hed hed__filter">
            <div class="filter__tab">
                <h5>Filter By</h5>
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="earning-second-tab1-tab" data-toggle="pill"
                        href="#earning-second-tab1" role="tab" aria-controls="earning-second-tab1"
                        aria-selected="true">Weekly</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="earning-second-tab2-tab" data-toggle="pill" href="#earning-second-tab2"
                        role="tab" aria-controls="earning-second-tab2" aria-selected="false">Monthly</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="earning-second-tab3-tab" data-toggle="pill" href="#earning-second-tab3"
                        role="tab" aria-controls="earning-second-tab3" aria-selected="false">Annually</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content mt-5" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="earning-second-tab1" role="tabpanel"
            aria-labelledby="earning-second-tab1-tab">
            <div class="hed">
                <h4><span class="colored">Weekly</span> – Admin Fees</h4>
            </div>
            <div class="table table-responsive mb0">
                <table class="table table-earnings table__style mb0">
                    <thead>
                        <tr>
                            <th>Week</th>
                            <th>Total Sessions <br /> Conducted</th>
                            <th>Weekly Hourly <br /> Rate Earned</th>
                            <th>Sales Tax <br /> Earned</th>
                            <th>Billing <br /> Costs</th>
                            <th>Net Weekly <br /> Earnings</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($earnings['lastWeekAdminFee']))
                        @foreach($earnings['lastWeekAdminFee'] as $row)
                        <tr>
                            <td>   
                                <span class="colored">{{$earning_dates['last_week'] ?? ''}}</span>
                            </td>
                            <td>{{$row->session_conducted ?? ''}}</td>
                            <td>${{$row->amount ?? '0'}}</td>
                            <td>${{$row->tax_amount ?? '0'}}</td>
                            <td>${{$row->stripe_charges-$row->pro_rate_billing ?? '0'}}</td>
                            <?php $netWeeklyEarnings = $row->amount + $row->tax_amount - ($row->stripe_charges-$row->pro_rate_billing); ?>
                            <td>${{$netWeeklyEarnings ?? '0'}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="earning-second-tab2" role="tabpanel" aria-labelledby="earning-second-tab2-tab">
            <div class="hed">
                <h4><span class="colored">Monthly</span> – Admin Fees</h4>
            </div>
            <div class="table table-responsive mb0">
                <table class="table table-earnings table__style mb0">
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Total Sessions <br /> Conducted</th>
                            <th>Monthly Hourly <br /> Rate Earned</th>
                            <th>Sales Tax <br /> Earned</th>
                            <th>Billing <br /> Costs</th>
                            <th>Net Monthly <br /> Earnings</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($earnings['lastMonthAdminFee']))
                        @foreach($earnings['lastMonthAdminFee'] as $row)
                        <tr>
                            <td>
                                <span class="colored">{{$earning_dates['last_month'] ?? ''}}</span>
                            </td>
                            <td>{{$row->session_conducted ?? ''}}</td>
                            <td>${{$row->amount ?? ''}}</td>
                            <td>${{$row->tax_amount ?? ''}}</td>
                            <td>${{$row->stripe_charges -$row->pro_rate_billing  ?? ''}}</td>
                            <?php $netWeeklyEarnings = $row->amount + $row->tax_amount - ($row->stripe_charges-$row->pro_rate_billing); ?>
                            <td>${{$netWeeklyEarnings ?? ''}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="earning-second-tab3" role="tabpanel" aria-labelledby="earning-second-tab3-tab">
            <div class="hed">
                <h4><span class="colored">Annually</span> – Admin Fees</h4>
            </div>
            <div class="table table-responsive mb0">
                <table class="table table-earnings table__style mb0">
                    <thead>
                        <tr>
                            <th>Annual</th>
                            <th>Total Sessions <br /> Conducted</th>
                            <th>Annual Hourly <br /> Rate Earned</th>
                            <th>Sales Tax <br /> Earned</th>
                            <th>Billing <br /> Costs</th>
                            <th>Net Annual <br /> Earnings</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($earnings['lastYearAdminFee']))
                        @foreach($earnings['lastYearAdminFee'] as $row)
                        <tr>
                            <td>
                                <span class="colored">{{$earning_dates['last_year'] ?? ''}}</span>
                            </td>
                            <td>{{$row->session_conducted ?? ''}}</td>
                            <td>${{$row->amount ?? ''}}</td>
                            <td>${{$row->tax_amount ?? ''}}</td>
                            <td>${{$row->stripe_charges- $row->pro_rate_billing ?? ''}}</td>
                            <?php $netWeeklyEarnings = $row->amount + $row->tax_amount - ($row->stripe_charges-$row->pro_rate_billing) ?>
                            <td>${{$netWeeklyEarnings ?? ''}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endif
</div>
@include('admin/earning/payments',['id'=>$row->trainer_id ?? 0])
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        console.log('earning page loaded');
    });

    var trainer_id12;
        $('button').click(function() {
            let amount      = $(this).attr('data-amount');
            $('#totalAmountModal').text(amount);
            $('#totalAmount2').text(amount);
            trainer_id12 = $(this).attr('data-trainer-id');
            $('.wklyPaybtn').attr('data-trainer-id', trainer_id12);
        })
    $(document).ready(function () {
            //making weekly payment
            $(document).on('click', '#wklyPay', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                let thiskey         =   $(this);
                let trainer_id      =   $(this).attr('data-trainer-id');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('make_all_payments') }}',

                    data:{'trainer_id':trainer_id},
                    beforeSend: function(){
                        thiskey.attr('disabled',true);
                        thiskey.text('processing...');
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

                            $("#btnCancel").trigger('click');
                            $('#message').addClass('alert alert-success');
                            $('#message').text('Payment transferred successfully.');
                            setTimeout(function () {
                                window.location.reload()
                            }, 1000);
                        }

                        console.log(data);
                        

                    },
                    error: function (data) {
                        console.log(data.message);
                        // window.location.reload()
                    }
                });
            });
        });
</script>
@endpush
