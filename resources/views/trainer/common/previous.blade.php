<div class="prev__session__panel panel__style mb-0">
    <div class="hed d-flex">
        <h4>Previous Sessions</h4>
        @if(isset($totalEarnings))
        <h3 class="ml-auto">Total Earnings <span class="colored">${{$totalEarnings ?? 0}}</span>
            <a href="{{ route('previous_session') }}"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></h3>
        @endif
    </div>
    <div class="table table-responsive mb0">
        <table class="table table-session table__style mb0" id='previous_sessions_table' >
            <thead>
                <tr>
                    <th>Trainee</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th class="">Session</th>
                    <th>Hourly Rate</th>
                    <th>Sale Tax</th>
                    
                </tr>
            </thead>
            <tbody>
                @forelse($previousSessions as $key=> $previousSession)
                @php
                if($key==5 && last(request()->segments())=='dashboard') break;
                @endphp
                <tr>
                    <td>
                        <div class="image__text">
                            @if($previousSession->trainee->profile_image)
                            <img src="{{ asset($storage.$previousSession->trainee->profile_image) }}"
                                alt="">
                            @else
                            <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="">
                            @endif
                            <span>{{$previousSession->trainee->name ?? ''}}</span>
                        </div>
                    </td>
                    <td>
                        @if(isset($previousSession->trainingPreference ) && $previousSession->trainingPreference == 'clientlocation' )
                            Client Location 
                        
                        @elseif(isset($previousSession->trainingPreference ) && $previousSession->trainingPreference == 'myLocation')
                           My Location 
                        @else
                        {{$previousSession->location ?? ''}}
                        @endif
                    </td>
                    <td>{{date('j F, Y', strtotime($previousSession->date));}}</td>
                    <td>{{$previousSession->start_time ?? ''}}</td>
                    <td>{{$previousSession->training_session ?? ''}}</td>
                    @if(isset($previousSession->userPayments))
                    
                    <td>
                        @if($previousSession->userPayments->amount)
                            ${{trainer_earning($previousSession->userPayments)}}
                        @endif
                    </td>
                    <td>
                        @if($previousSession->userPayments->tax_amount)
                            ${{$previousSession->userPayments->tax_amount}}
                        @endif
                    </td>
                    @endif
                </tr>
                @empty
                    <tr>
                        <td colspan="7" style="vertical-align : middle;text-align:center;"> No Record Found </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<style>
table.dataTable.no-footer {
    border-bottom: none;
}

</style>
<script>
    // alert(window.location.pathname );
    $(document).ready( function () {
    if(window.location.pathname !='/trainer/dashboard'){
        // $('.table').DataTable();
        $('#previous_sessions_table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": true,
                language: {
                    search: "Search",
                    searchPlaceholder: "Search by Trainees"
                },
                "fnDrawCallback": function (oSettings) {
                    if (oSettings._iDisplayLength > oSettings.fnRecordsDisplay()) {
                        $(oSettings.nTableWrapper).find('.dataTables_paginate').hide();
                    } else {
                        $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
                    }
                }
            });}
    } );
    </script>
