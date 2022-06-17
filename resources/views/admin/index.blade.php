@extends('admin.layouts.app')
@section('title', 'Admin Dashboard')

@section('content')
    <section class="dashboard-top mb-4">
        <div class="row">
            <div class="box col-md-3">
                <div class="box__inr">
                    <h4>Total Trainees</h4>
                    <div class="graphics">
                        <span class="count">{{ $response['trainees'] ?? 0 }}</span>
                        <img src="{{ asset('assets/admin/images/home/users.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="box col-md-3">
                <div class="box__inr">
                    <h4>Total Trainers</h4>
                    <div class="graphics">
                        <span class="count">{{ $response['trainers'] ?? 0 }}</span>
                        <img src="{{ asset('assets/admin/images/home/users.png') }}" alt="">
                    </div>
                </div>
            </div>

            <div class="box col-md-3">
                <div class="box__inr">
                    <h4>Total Earnings</h4>
                    <div class="graphics">
                        <span class="count">${{ number_format($response['earnings'],2) ?? 0 }}</span>
                        <img src="{{ asset('assets/admin/images/home/income.png') }}" alt="">
                    </div>
                </div>
            </div>

            <div class="box col-md-3">
                <div class="box__inr">
                    <h4>Total Sessions</h4>
                    <div class="graphics">
                        <span class="count">{{ $response['lastYearSessions']->count() ?? 0 }}</span>
                        <img src="{{ asset('assets/admin/images/home/fitness.png') }}" alt="">
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="summary__panel panel__style mb-4">
        <div class="hed hed__filter">
            <h4>Earnings Summary - <span class="colored">Weekly</span></h4>
            {{-- <div class="form-group m-0">
               <input class="form-control" type='text' id='weeklyDatePicker' placeholder="Select Week"/>
               <img src="{{asset('assets/admin/images/icons/arr-down.png')}}" alt="">
           </div> --}}

        </div>
        <div class="table table-responsive mb0">
            <table class="table table-summary table__style mb0">
                <thead>
                    <tr>
                        <th>Week</th>
                        <th>Total Sessions <br /> Conducted</th>
                        <th>Total Fees <br /> Collected</th>
                        <th>Total Sales Tax <br /> Collected</th>
                        <th>Total Billing <br /> Costs</th>
                        <th>Total Net Weekly <br /> Earnings</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>{{ date('j F', strtotime($response['weekStart'])) }} - {{ date('j F', strtotime($response['weekEnd'])) }}</strong></td>
                        <td>{{ $response['lastWeekSessions']->total_session ?? 0 }}</td>
                        <td>
                            <?php $fees = $response['lastWeekSessions']->fee + $response['lastWeekSessions']->admin_fee; ?>
                            ${{ $fees ?? 0 }}</td>
                        <td> <?php $tax = $response['lastWeekSessions']->fee_tax + $response['lastWeekSessions']->adminfee_Tax; ?>
                            ${{ $tax ?? 0 }} </td>
                        <td>${{ $response['lastWeekSessions']->billing_cost ?? 0 }}</td>
                        <td>
                            <?php $netEarning = $fees + $tax - $response['lastWeekSessions']->billing_cost; ?>
                            <strong> ${{ $netEarning ?? 0 }}</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="summary__panel panel__style">
        <div class="hed hed__filter">
            <h4>Earnings Summary - <span class="colored">Monthly</span></h4>
            {{-- <div class="form-group m-0">
                <select class="form-select form-control" name="country" id="summaryMonth">
                <option value="" selected disabled hidden>Select Month</option>
                <option value="jan">January</option>
                <option value="feb">February</option>
                <option value="mar">March</option>
                <option value="apr">April</option>
                <option value="may">May</option>
                <option value="june">June</option>
                <option value="july">July</option>
                <option value="aug">August</option>
                <option value="sep">September</option>
                <option value="oct">October</option>
                <option value="nov">November</option>
                <option value="dec">December</option>
                </select>
                <img src="{{asset('assets/admin/images/icons/arr-down.png')}}" alt="">
            </div> --}}
        </div>
        <div class="table table-responsive mb0">
            <table class="table table-summary table__style mb0">
                <thead>
                    <tr>
                        <th>Monthly <span style="color:#0092D9">{{ $response['current_month'] }}</span></th>
                        <th>Total Sessions <br /> Conducted</th>
                        <th>Total Fees <br /> Collected</th>
                        <th>Total Sales Tax <br /> Collected</th>
                        <th>Total Billing <br /> Costs</th>
                        <th>Total Net Monthly <br /> Earnings</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>{{ $response['start_day_of_month'] }} - {{ $response['end_day_of_month'] }}</strong></td>
                        <td>{{ $response['lastMonthSessions']->total_session ?? 0 }}</td>
                        <td>
                            <?php $fees = $response['lastMonthSessions']->fee + $response['lastMonthSessions']->admin_fee; ?>
                            ${{ $fees ?? 0 }}</td>
                        <td> <?php $tax = $response['lastMonthSessions']->fee_tax + $response['lastMonthSessions']->adminfee_Tax; ?>
                            ${{ $tax ?? 0 }} </td>
                        <td>${{ $response['lastMonthSessions']->billing_cost ?? 0 }}</td>
                        <td>
                            <?php $netEarning = $fees + $tax - $response['lastMonthSessions']->billing_cost; ?>
                            <strong> ${{ $netEarning ?? 0 }}</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="summary__panel panel__style">
        <div class="hed hed__filter">
            <h4>Earnings Summary - <span class="colored">Annual</span></h4>
            {{-- <div class="form-group m-0">
                <select class="form-select form-control" name="country" id="summaryYear">
                <option value="" selected disabled hidden>Select Year</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                </select>
                <img src="{{asset('assets/admin/images/icons/arr-down.png')}}" alt="">
            </div> --}}

        </div>
        <div class="table table-responsive mb0">
            <table class="table table-summary table__style mb0">
                <thead>
                    <tr>
                        <th>Annual</th>
                        <th>Total Sessions <br /> Conducted</th>
                        <th>Total Fees <br /> Collected</th>
                        <th>Total Sales Tax <br /> Collected</th>
                        <th>Total Billing <br /> Costs</th>
                        <th>Total Net Annual <br /> Earnings</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>{{ date('Y') }}</strong></td>
                        <td>{{ $response['lastYearSessions']->total_session ?? 0 }}</td>
                        <td>
                            <?php $fees = $response['lastYearSessions']->fee + $response['lastYearSessions']->admin_fee; ?>
                            ${{ $fees ?? 0 }}</td>
                        <td> <?php $tax = $response['lastYearSessions']->fee_tax + $response['lastYearSessions']->adminfee_Tax; ?>
                            ${{ $tax ?? 0 }} </td>
                        <td>${{ $response['lastYearSessions']->billing_cost ?? 0 }}</td>
                        <td>
                            <?php $netEarning = $fees + $tax - $response['lastYearSessions']->billing_cost; ?>
                            <strong> ${{ $netEarning ?? 0 }}</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            //Initialize the datePicker
            $("#weeklyDatePicker").datetimepicker({
                format: 'MM-DD-YYYY',
                icons: {
                    time: 'fas fa-clock-o',
                    date: 'fas fa-calendar',
                    up: 'fas fa-chevron-up',
                    down: 'fas fa-chevron-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right',
                    today: 'fas fa-check',
                    clear: 'fas fa-trash',
                    close: 'fas fa-times'
                },
                debug: true,
            });
            //Get the value of Start and End of Week
            $('#weeklyDatePicker').on('dp.change', function(e) {
                var value = $("#weeklyDatePicker").val();
                var firstDate = moment(value, "MM-DD-YYYY").day(0).format("MM-DD-YYYY");
                var lastDate = moment(value, "MM-DD-YYYY").day(6).format("MM-DD-YYYY");
                $("#weeklyDatePicker").val(firstDate + " - " + lastDate);
            });
            $('#summaryMonth').on('change', function() {
                $(this).addClass("hasValue");
            });
            $('#summaryYear').on('change', function() {
                $(this).addClass("hasValue");
            });

        });
    </script>
@endpush
