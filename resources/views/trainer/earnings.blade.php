@extends('trainer.layouts.app')
@section('title', ' Trainer Earnings')

@section('content')

    <div class="earning__filter panel__style">
        <h5>Filter By</h5>
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="custom-earning-tab1" data-toggle="pill" href="#earning-tab1" role="tab"
                   aria-controls="custom-tabs-one-home" aria-selected="true">Weekly</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-earning-tab2" data-toggle="pill" href="#earning-tab2" role="tab"
                   aria-controls="custom-tabs-one-profile" aria-selected="false">Monthly</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-earning-tab3" data-toggle="pill" href="#earning-tab3" role="tab"
                   aria-controls="custom-tabs-one-messages" aria-selected="false">Annually</a>
            </li>
        </ul>
    </div>

    <div class="tab-content" id="custom-tabs-one-tabContent">
        <div class="tab-pane fade active show" id="earning-tab1" role="tabpanel" aria-labelledby="custom-earning-tab1">
            <div class="earning__panel panel__style">
                <div class="hed">
                    <h4>Week Earnings</h4>
                </div>
                <div class="table table-responsive mb0">
                    <table class="table table-earning table__style mb0">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Sessions Conducted</th>
                            <th>Hourly Earnings</th>
                            <th>Applicable Sales Tax</th>
                            <th>Total Earnings</th>
                            <th>Pro-Rata Billing Fees</th>
                            <th>Receipt</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $rowCount = 0; $totalEarning = 0; $totalselextax = 0; $totalEraningWithSelesTax = 0; $totalBillingFee = 0; ?>
                        @if(count($totalEarnings['lastWeekSessions']) > 0)
                            @foreach($totalEarnings['lastWeekSessions'] as $week)
                                <tr>
                                    <td>{{date('j F, Y', strtotime($week->session_date))}}</td>
                                    <td>{{$week->training_session ?? ''}}</td>
                                    <td>${{$week->amount ?? ''}}</td>
                                    <td>${{$week->sales_tax ?? ''}}</td>
                                    <?php $totalwithTax = $week->amount + $week->sales_tax; ?>
                                    <td>${{ number_format( $totalwithTax,2) ?? ''}}</td>
                                    <td>${{ number_format($week->pro_rate_billing,2) ?? ''}}</td>

                                    <td>
                                        @if(isset($totalwithTax) && isset($week->pro_rate_billing))
                                            ${{ $totalwithTax - $week->pro_rate_billing }}
                                        @else $0 @endif
                                    </td>

                                    <?php
                                    $rowCount++;
                                    $totalEarning = $totalEarning + $week->amount;
                                    $totalselextax = $totalselextax + $week->sales_tax;
                                    $totalEraningWithSelesTax = $totalEraningWithSelesTax + $totalwithTax;
                                    $totalBillingFee = $totalBillingFee + $week->pro_rate_billing;
                                    ?>

                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot class="fill">
                        <tr>
                            <td>Days : {{$rowCount ?? ''}}</td>
                            <td>Total : {{$rowCount ?? ''}}</td>
                            <td>${{ number_format($totalEarning,2) ?? ''}}</td>
                            <td>${{ number_format($totalselextax,2) ?? ''}}</td>
                            <td>${{ number_format($totalEraningWithSelesTax,2) ?? ''}}</td>

                            <td>${{number_format($totalBillingFee,2)  ?? ''}}</td>
                            {{-- <td>${{number_format($totalEarning,2)}}</td> --}}
                            <td>${{number_format($totalEraningWithSelesTax - $totalBillingFee,2)}}</td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="earning-tab2" role="tabpanel" aria-labelledby="custom-earning-tab2">
            <div class="earning__panel panel__style">
                <!-- <div class="hed">
                    <h4>Monthly Earnings</h4>
                    <select class="form-control form__select">
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option selected="selected">October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>
                </div> -->
                <div class="hed">
                    <h4>Monthly Earnings</h4>
                </div>
                <div class="table table-responsive mb0">
                    <table class="table table-earning table__style mb0">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Sessions Conducted</th>
                            <th>Hourly Earnings</th>
                            <th>Applicable Sales Tax</th>
                            <th>Total Earnings</th>
                            <th>Pro-Rata Billing Fees</th>
                            <th>Receipt</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $rowCount = 0; $totalEarning = 0; $totalselextax = 0; $totalEraningWithSelesTax = 0; $totalBillingFee = 0; ?>
                        @if(count($totalEarnings['lastMonthSessions']) > 0)
                        
                            @foreach($totalEarnings['lastMonthSessions'] as $month)
                            
                                <tr>
                                    <td>{{date('j F, Y', strtotime($month->session_date));}}</td>
                                    <td>{{$month->training_session ?? ''}}</td>
                                    <td>${{$month->amount ?? ''}}</td>
                                    <td>${{$month->sales_tax ?? ''}}</td>
                                    <?php $totalwithTax = $month->amount + $month->sales_tax; ?>
                                    <td>${{$totalwithTax ?? ''}}</td>
                                    <td>${{$month->pro_rate_billing ?? ''}}</td>
                                    <?php $rowCount++;
                                    $totalEarning = $totalEarning + $month->amount;
                                    $totalselextax = $totalselextax + $month->sales_tax;
                                    $totalEraningWithSelesTax = $totalEraningWithSelesTax + $totalwithTax;
                                    $totalBillingFee = $totalBillingFee + $month->pro_rate_billing;
                                    ?>
                                    {{--                                    <td>--}}
                                    {{--                                        <a class="btn btn-primary" href="{{$month->receipt_url ?? ''}}" target="_blank"><i--}}
                                    {{--                                                class="fas fa-eye"></i></a>--}}
                                    {{--                                    </td>--}}

                                    <td>${{ $totalwithTax - $month->pro_rate_billing ?? ''}}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot class="fill">
                        <tr>
                            <td>Days : {{$rowCount ?? ''}}</td>
                            <td>Total : {{$rowCount ?? ''}}</td>
                            <td>${{$totalEarning ?? ''}}</td>
                            <td>${{$totalselextax ?? ''}}</td>
                            <td>${{$totalEraningWithSelesTax ?? ''}}</td>
                            <td>${{$totalBillingFee ?? ''}}</td>
                            <td>$ {{$totalEraningWithSelesTax - $totalBillingFee}}</td>

                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="earning-tab3" role="tabpanel" aria-labelledby="custom-earning-tab3">
            <div class="earning__panel panel__style">
                <!-- <div class="hed">
                    <h4>Annually Earnings</h4>
                    <select class="form-control form__select ann__year">
                        <option selected="selected">2021</option>
                        <option>2020</option>
                        <option>2019</option>
                        <option>2018</option>
                    </select>
                    <select class="form-control form__select">
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option selected="selected">October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>
                </div> -->
                <div class="hed">
                    <h4>Annually Earnings</h4>
                </div>
                <div class="table table-responsive mb0">
                    <table class="table table-earning table__style mb0">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Sessions Conducted</th>
                            <th>Hourly Earnings</th>
                            <th>Applicable Sales Tax</th>
                            <th>Total Earnings</th>
                            <th>Pro-Rata Billing Fees</th>
                            <th>Receipt</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $rowCount = 0; $totalEarning = 0; $totalselextax = 0; $totalEraningWithSelesTax = 0; $totalBillingFee = 0; ?>
                        @if(count($totalEarnings['lastYearSessions']) > 0)
                            @foreach($totalEarnings['lastYearSessions'] as $year)
                                <tr>
                                    <td>{{date('j F, Y', strtotime($month->session_date));}}</td>
                                    <td>{{$month->training_session ?? ''}}</td>
                                    <td>${{$month->amount ?? ''}}</td>
                                    <td>${{$month->sales_tax ?? ''}}</td>
                                    <?php $totalwithTax = $month->amount + $month->sales_tax; ?>
                                    <td>${{$totalwithTax ?? ''}}</td>
                                    <td>${{$month->pro_rate_billing ?? ''}}</td>
                                    <?php $rowCount++;
                                    $totalEarning = $totalEarning + $month->amount;
                                    $totalselextax = $totalselextax + $month->sales_tax;
                                    $totalEraningWithSelesTax = $totalEraningWithSelesTax + $totalwithTax;
                                    $totalBillingFee = $totalBillingFee + $month->pro_rate_billing;
                                    ?>
                                    {{--                                    <td>--}}
                                    {{--                                        <a class="btn btn-primary" href="{{$year->receipt_url ?? ''}}"--}}
                                    {{--                                           target="_blank"><i--}}
                                    {{--                                                class="fas fa-eye"></i></a>--}}
                                    {{--                                    </td>--}}
                                    <td>
                                        ${{ $totalwithTax - $month->pro_rate_billing ?? ''}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <tfoot class="fill">
                        <tr>
                            <td>Days : {{$rowCount ?? ''}}</td>
                            <td>Total : {{$rowCount ?? ''}}</td>
                            <td>${{$totalEarning ?? ''}}</td>
                            <td>${{$totalselextax ?? ''}}</td>
                            <td>${{$totalEraningWithSelesTax ?? ''}}</td>
                            <td>${{$totalBillingFee ?? ''}}</td>
                            <td>$ {{$totalEraningWithSelesTax - $totalBillingFee}}</td>

                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /.card -->
    </div>

@endsection
