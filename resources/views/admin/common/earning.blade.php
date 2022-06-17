<div class="sessions__user__panel panel__style mb-4">
    <div class="hed">
        <h4>Earnings</h4>
    </div>
    <div class="float-right">
        {{-- <span class="text-normal colored text-muted text-bold">Commission Earned </span> --}}
        <span
        class="text-bold text-success">
        {{-- {{ number_format($response['earnings'], 2) ?? 0 }} --}}
    
        </span>
        <a href="{{ isset($redirect) ? $redirect : route('admin_earnings') }}" class="float-right"><i class="fa fa-arrow-right"></i></a>
    </div>
    <div class="table table-responsive mb-0">
        <table id="sessions_table" class="table table-all-sessions table__style mb0">

            <thead>
                <tr>
                    <th>Trainers</th>
                    <th>Trainee</th>
                    <th>Location</th>
                    <th>Sessions</th>
                    <th>Date</th>
                    <th>Transaction</th>
                    <th>Sales tax</th>
                    <th>Stripe fee</th>
                    {{-- <th>Commision</th> --}}
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($allSessions) && $allSessions->count() > 0)
                @foreach ($allSessions as $session)
                <tr>
                    <td>
                        <div class="custom-flex">
                            <div class="user-img">
                                @if ($session->trainer->profile_image)
                                <img src="{{ asset($storage . $session->trainer->profile_image) }}"
                                alt="">
                                @else
                                <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                                @endif
                            </div>
                            <div class="user-name">
                                @if ($session->trainer->deleted == 1)
                                <a href="#" data-toggle="tooltip" title="Account Is Blocked">
                                    <b style="color: red"> {{ $session->trainer->name }} </b>
                                </a>
                                @else
                                {{ $session->trainer->name }}
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="custom-flex">
                            <div class="user-img">
                                @if ($session->trainee->profile_image)
                                <img src="{{ asset($storage . $session->trainee->profile_image) }}"
                                alt="">
                                @else
                                <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                                @endif
                            </div>
                            <div class="user-name">
                                {{ $session->trainee->name }}

                            </div>
                        </div>
                    </td>
                    <td>
                        @if(isset($session->trainingPreference ) && $session->trainingPreference == 'clientlocation' )
                        Trainee Location 
                    
                    @elseif(isset($session->trainingPreference ) && $session->trainingPreference == 'myLocation')
                       Trainer Location 
                    @else
                    {{$session->location ?? ''}}
                    @endif
                    </td>
                    <td>{{ $session->training_session }}</td>
                    <td>{{ date('j F, Y', strtotime($session->date)) }}</td>
                    <td>${{ $session->payable_amount }}</td>
                    {{-- {{ $session->userPayments }} --}}
                    <td class="">${{ number_format($session->userPayments ? $session->userPayments->tax_amount+($session->userPayments->adminFeeTax ?? 0)  : 0, 2) }}</td>
                    
                    <td> ${{ $session->userPayments ? $session->userPayments->stripe_charges : 0 }}</td>
                    {{-- <td class="">
                        ${{ number_format($session->userPayments ? $session->userPayments->adminFee : 0  + $session->userPayments ? $session->userPayments->adminFeeTax: 0, 2) }}
                    </td> --}}
                    @if($session->status == 'pending')
                    <td><span class="status__pending">pending on Approval</span></td>
                @elseif($session->status == 'cancelled')
                    <td>
                        <span class="status__decline">Cancelled</span><br>
                        <span>by 
                            @if(isset($session->appointmentCancelledBy))
                                {{$session->appointmentCancelledBy->name ?? ''}}
                            @endif
                        </span>
                    </td>
                    @elseif($session->status == 'confirmed')
                    <td><span class="status__confirm">Confirmed</span></td>
                    @elseif($session->status == 'rescheduled')
                    <td><span class="status__pending">Rescheduled</span></td>
                    @elseif($session->status == 'decline')
                        <td><span class="status__decline">declined</span></td>
                    @elseif($session->status == 'completed')
                        <td><span class="status__confirm">Completed</span></td>
                    @elseif(isset($session->trainer))
                        @if($session->trainer->deleted == 1)
                            <td><span><b style="color: red">Blocked </b></span></td>
                        @endif
                    @else
                        <td class="">-</td>
                    @endif

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="11" style="vertical-align : middle;text-align:center;"> No Record Found </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<script>
$(document).ready( function () {
if(window.location.pathname !='/admin/dashboard')
    // $('#sessions_table').DataTable();
    $('#sessions_table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": true,
                language: {
                    search: "Search",
                    searchPlaceholder: "Search by Trainers & Trainees Name"
                },
                "fnDrawCallback": function (oSettings) {
                    if (oSettings._iDisplayLength > oSettings.fnRecordsDisplay()) {
                        $(oSettings.nTableWrapper).find('.dataTables_paginate').hide();
                    } else {
                        $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
                    }
                }
            });

} );
</script>
