@extends('admin.layouts.app')
@section('title', 'Admin Transfer History ')

@section('content')

<div class="earning__user__panel panel__style mb-4">
    <div class="hed hed__filter">
        <div class="filter__tab">
            <h5>Filter By</h5>
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link @if($criteria == 'weekly' || $criteria == '' ) active  @endif" id="earning-first-tab1-tab"  
                    href="{{route('transfer_history',['criteria'=>'weekly'])}}"
                    role="tab" aria-controls="earning-first-tab1" aria-selected="true" data-value="weekly">Weekly</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($criteria == 'monthly') active  @endif" id="earning-first-tab2-tab" href="{{route('transfer_history',['criteria'=>'monthly'])}}"
                    role="tab" aria-controls="earning-first-tab2" aria-selected="false" data-value="monthly">Monthly</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($criteria == 'annually') active  @endif" id="earning-first-tab3-tab" href="{{route('transfer_history',['criteria'=>'annually'])}}"
                    role="tab" aria-controls="earning-first-tab3" aria-selected="false" data-value="annually">Annually</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- <div class="earning__filter panel__style">
        <h5>Filter By</h5>
        <select name="payment_filer">
            <option value="weekly" @if( 'weekly' == $criteria ) selected @endif >Weekly</option>
            <option value="monthly" @if( 'monthly' == $criteria ) selected @endif >Monthly</option>
            <option value="annually" @if( 'annually' == $criteria ) selected @endif >Annually</option>
            <option value="all" @if( 'all' == $criteria ) selected @endif >All</option>
        </select>
        
    </div> -->

    <div class="tab-content mt-5" id="custom-tabs-one-tabContent">
        <div class="table table-responsive mb-0">
            <table id="sessions_table" class="table table-all-sessions table__style mb0">
                <span id="message"></span>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tranfer By</th>
                    <th>Transfer To</th>
                    <th>Transferred Amount</th>
                    <th>Transfer ID</th>
                    <!-- <th>Sessions</th> -->
                    <th>Transfer Date</th>
                </tr>
                </thead>
                
                    @if( !empty($history) && $history->count() > 0  )
                        @foreach($history as $key => $value  )
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->transferredBy->name }}</td>
                            <td>{{ $value->transferredTo->name }}</td>
                            <td>${{ $value->amount }}</td>
                            <td>{{ $value->transfer_id }}</td>
                            <!-- <td>@if( !empty($value->session->date) ) 
                                {{ Carbon\Carbon::createFromFormat('Y-m-d', $value->session->date )->format('M d, Y') ?? '' }} 
                                @endif
                                @if( !empty($value->session->date) ) 
                                {{' - '.Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->session->completed_at )->format('M d, Y') ?? '' }}
                                @endif
                            </td> -->
                            <td>{{ convertUnix($value->transfer_date) }}</td>
                        </tr>
                        @endforeach
                        <tr><td>{{ $history->links() }}</tr>
                    @else
                        <tr><td colspan=8 align="center">No data available</td></tr>
                    @endif


                
                </tbody>
          
            </table>
        </div>
    </div>
</div>

@endsection
@push('scripts')

<script>
    // $(document).ready(function () {
    //     $('a').click(function (){
    //         let criteria = $(this).attr('data-value'); 
    //         window.location="{{ URL::to('/') }}/admin/transfers/"+criteria;
    //     })
    // })

</script>

@endpush
