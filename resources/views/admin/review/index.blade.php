@extends('admin.layouts.app')
@section('title', 'Admin Review ')

@section('content')

<div class="reviews__record__panel panel__style mb-4">
    <div class="hed hed__search">
        <h4>Reviews</h4>
    </div>
    <div class="table table-responsive mb-0 mt-0">
        <table id="reviews_table" class="table table-review-record table__style mb0">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Reviewer</th>
                    <th>Trainer</th>
                    <th>Review</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($reviews) > 0)
                @foreach($reviews as $row)
                <tr>
                    <td>{{date('j F, Y', strtotime($row->created_at));}}</td>
                    <td>
                        <div class="custom-flex">
                            <div class="user-img">
                                @if(empty($row->traineeNames[0]->profile_image))
                                    <img src="{{ asset('assets/admin/images/default-user.png') }}">
                                @else
                                    <img src="{{ asset($storage.$row->traineeNames[0]->profile_image) }}">
                                @endif
                            </div>
                            <div class="user-name">
                            {{ $row->traineeNames[0]->name }}
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="custom-flex">
                            <div class="user-img">
                                @if(empty($row->profile_image))
                                    <img src="{{ asset('assets/admin/images/default-user.png') }}">
                                @else
                                    <img src="{{ asset($storage.$row->profile_image) }}">
                                @endif
                            </div>
                            <div class="user-name">
                            {{ $row->name }}
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="starrating-area star-{{$row->rating}}">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                        <p>{{$row->comments}}</p>
                    </td>
                    <td>{{date('h:i A', strtotime($row->created_at))}}</td>
                    <td><span class="status__pending">{{$row->status}}</span></td>
                    <td>
                        @if($row->status == 'pending')
                        <a href="{{ route('approveReview', ['id'=>$row->id]) }}" class="btn btn-success m-1">Approve</a>
                        <a href="{{ route('removeReview', ['id'=>$row->id]) }}" class="btn btn-cancel m-1">Remove</a>
                        @else
                        <a href="javascript(void)" class="btn btn-success m-1 disabled">Approve</a>
                        <a href="javascript(void)" class="btn btn-cancel m-1 disabled">Remove</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>

        </table>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#reviews_table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": true,
            language: {
                search: "Search",
                searchPlaceholder: "Search by Reviewer & Trainer Name"
            },
            "fnDrawCallback": function (oSettings) {
                if (oSettings._iDisplayLength > oSettings.fnRecordsDisplay()) {
                    $(oSettings.nTableWrapper).find('.dataTables_paginate').hide();
                } else {
                    $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
                }
            }
        });
    });

</script>
@endpush
