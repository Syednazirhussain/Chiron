@extends('admin.layouts.app')
@section('title', 'Admin Manage Users ')

@section('content')
    <div class="manage__user__panel panel__style mb-4">
        <div class="hed mb-2">
            <h4>Select Roles</h4>
        </div>
        <ul class="nav nav-tabs" id="manage-user-one-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="manage-user-tab1-tab" data-toggle="pill" href="#manage-user-tab1" role="tab"
                    aria-controls="manage-user-tab1" aria-selected="true">Trainers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="manage-user-tab1-tab" data-toggle="pill" href="#manage-user-tab2" role="tab"
                    aria-controls="manage-user-tab2" aria-selected="false">Trainees</a>
            </li>
        </ul>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
                <div class="tab-pane fade show active" id="manage-user-tab1" role="tabpanel" aria-labelledby="manage-user-tab1-tab">
                    <div class="table table-responsive mb0">
                        <div class="hed">
                            <h4>Trainers</h4>
                        </div>
                        <table id="users_trainer" class="table table-manage-user table__style mb0">
                            <thead>
                                <tr>
                                    <th>Trainer</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    @if ($user->role_id == 2)
                                        <tr>
                                            <td>
                                                <div class="custom-flex">
                                                    <div class="user-img">
                                                        @if ($user->profile_image)
                                                            <img src="{{ asset($storage . $user->profile_image) }}"
                                                                alt="">
                                                        @else
                                                            <img src="{{ asset('assets/trainee/images/default-user.png') }}"
                                                                alt="">
                                                        @endif
                                                    </div>
                                                    <div class="user-name">
                                                        <a
                                                            href="{{ route('viewUser', ['id' => $user->id]) }}">{{ $user->name }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- <td>{{ $user->email }} &nbsp;&nbsp; {{ $user->role->name }}</td> --}}
                                            <td>{{ $user->email }} &nbsp;&nbsp; </td>
                                            <td>
                                                @if (isset($user->getAddress))
                                                    {{ $user->getAddress->address ?? '' }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->status == 'pending')
                                                    <span class="status__pending">pending</span>
                                                @elseif($user->status == 'cancelled')
                                                    <span class="status__decline">Deactived</span>
                                                @elseif($user->status == 'approved')
                                                    <!-- <span class="status__confirm">Approved</span> -->
                                                    <span class="status__confirm">Active</span>
                                                @elseif($user->status == 'deactivate')
                                                    <span class="status__confirm">Deactivate</span>
                                                @else
                                                    <span class="status__pending">pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-edit mr-2" href="{{ route('viewUser', ['id' => $user->id]) }}">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a  class="btn btn-delete mr-2 userDelete" data-id="{{ $user->id }}" data-toggle="modal" data-target="#userDeleteModal" href="javascript:void(0)">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                                @if (
                                                    $user->status == 'pending' ||
                                                    $user->status == 'cancelled' ||
                                                    $user->status == 'deactivate'
                                                )
                                                    <a href="javascript(void)" title="Approve" aria-hidden="true" data-toggle="modal" id="approved" class="mr-2 approved"
                                                        data-target="#approveTrainerProfileModal"
                                                        data-trainer_id="{{ $user->id }}"
                                                        data-name="{{ $user->name }}"
                                                        data-type="{{ $user->role->name }}"
                                                        data-status="{{ $user->status}}"
                                                        data-approved="1">
                                                        <i class="fa fa-check"></i></a>
                                                    @if($user->status == 'approved')
                                                        <a href="javascript(void)" class="mr-2 declined" id="declined" title="De-active"
                                                            data-toggle="modal"
                                                            data-target="#declineTrainerProfileModal"
                                                            data-trainer_id="{{ $user->id }}"
                                                            data-type="{{ $user->role->name }}"
                                                            data-name="{{ $user->name }}">
                                                            <i class="fa fa-ban" aria-hidden="true"></i>
                                                        </a>
                                                    @endif
                                                @elseif ($user->status == 'approved')
                                                    <a href="javascript(void)" class="mr-2 declined" title="De-active"
                                                        data-toggle="modal"
                                                        data-target="#declineTrainerProfileModal" id="declined"
                                                        data-trainer_id="{{ $user->id }}"
                                                        data-type="{{ $user->role->name }}"
                                                        data-name="{{ $user->name }}">
                                                        <i class="fa fa-ban" aria-hidden="true"></i>
                                                    </a>
                                                @elseif ($user->status == 'cancelled')
                                                @elseif ($user->status == 'deactivate')
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="manage-user-tab2" role="tabpanel" aria-labelledby="manage-user-tab2-tab">
                    <div class="table table-responsive mb0">
                        <div class="hed">
                            <h4>Trainees</h4>
                        </div>
                        <table id="users_trainee" class="table table-manage-user table__style mb0">
                            <thead>
                                <tr>
                                    <th>Trainees</th>
                                    <th>Email</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    @if ($user->role_id == 3)
                                        <tr>
                                            <td>
                                                <div class="custom-flex">
                                                    <div class="user-img">
                                                        @if ($user->profile_image)
                                                            <img src="{{ asset($storage . $user->profile_image) }}"
                                                                alt="">
                                                        @else
                                                            <img src="{{ asset('assets/trainee/images/default-user.png') }}"
                                                                alt="">
                                                        @endif
                                                    </div>
                                                    <div class="user-name">
                                                        <a
                                                            href="{{ route('traineeProfile', ['id' => $user->id]) }}">{{ $user->name }}</a>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- <td>{{ $user->email }} &nbsp;&nbsp; {{ $user->role->name }}</td> --}}
                                            <td>{{ $user->email }} &nbsp;&nbsp; </td>
                                            <td>
                                                @if (isset($user->getAddress))
                                                    {{ $user->getAddress->address }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->status == 'pending')
                                                    <span class="status__pending">pending</span>
                                                @elseif($user->status == 'cancelled')
                                                    <span class="status__decline">Disapprove</span>
                                                @elseif($user->status == 'approved')
                                                    <span class="status__confirm">Approved</span>
                                                @else
                                                    <span class="status__pending">pending</span>
                                                @endif
                                            </td>
                                            <td class="text-center">

                                                <a  class="btn btn-delete mr-2 " onclick="deleteUser({{ $user->id }})" href="javascript:void(0)">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>

                                                @if ($user->status == 'approved')
                                                    {{--
                                                    <a href="javascript(void)" data-toggle="modal"
                                                        data-target="#deactivateTrainerProfileModal" id="declined"
                                                        data-trainer_id="{{ $user->id }}"
                                                        data-type="{{ $user->role->name }}"
                                                        data-name="{{ $user->name }}" class="mr-2 declined">
                                                        <i class="fa fa-ban" aria-hidden="true"></i>
                                                    </a>
                                                    --}}
                                                @endif
                                                @if ($user->status == 'cancelled' || $user->status == 'pending' || $user->status == 'deactivate')
                                                    <a href="javascript(void)" data-toggle="modal"
                                                        data-target="#approveTrainerProfileModal" id="approved"
                                                        data-trainer_id="{{ $user->id }}"
                                                        data-name="{{ $user->name }}"
                                                        data-type="{{ $user->role->name }}"
                                                        data-status="{{ $user->status }}"
                                                        class="mr-2 approved">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </a>
                                                @endif
                                                <!--
                                                    <button data-toggle="modal" data-target="#removeAccountModal"
                                                        class="btn btn-delete">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                -->
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.modals.delete_user')
    @include('admin.modals.remove_account')
    @include('admin.modals.delete_account')

    @include('admin.users.decline')
    @include('admin.users.approve')
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#users_trainer').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": true,
                language: {
                    search: "Search",
                    searchPlaceholder: "Search by trainers Name/Email"
                },
                "fnDrawCallback": function(oSettings) {
                    if (oSettings._iDisplayLength > oSettings.fnRecordsDisplay()) {
                        $(oSettings.nTableWrapper).find('.dataTables_paginate').hide();
                    } else {
                        $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
                    }
                }
            });
            $('#users_trainee').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": true,
                language: {
                    search: "Search",
                    searchPlaceholder: "Search by trainees Name/Email"
                },
                "fnDrawCallback": function(oSettings) {
                    if (oSettings._iDisplayLength > oSettings.fnRecordsDisplay()) {
                        $(oSettings.nTableWrapper).find('.dataTables_paginate').hide();
                    } else {
                        $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
                    }
                }
            });
        });

        $('.approved').click(function() {
            var id = $(this).attr('data-trainer_id');
            var name = $(this).attr('data-name');
            var type = $(this).data('type');
            var status = $(this).data('status');
            console.log("status", status)
            // console.log("type", type)
            jQuery(".trainer_id").val(id);
            if (status == "pending") {
                $(".approveModalbtn").text('Approve');
                jQuery(".approve-modal-title").html('<span class="colored">Approve</span>&nbsp;'+type);
                jQuery("#approved_name").html('Are you sure want to approve <strong>' + name + '</strong>&nbsp;'+type.toLowerCase()+'?');
            } else {
                $(".approveModalbtn").text('Active');
                jQuery(".approve-modal-title").html('<span class="colored">Active</span>&nbsp;'+type);
                jQuery("#approved_name").html('Are you sure want to active <strong>' + name + '</strong>&nbsp;'+type.toLowerCase()+'?');
            }
        });

        $('.declined').click(function() {
            var id = $(this).attr('data-trainer_id');
            var name = $(this).attr('data-name');
            var type = $(this).data('type');
            console.log("type", type)
            jQuery(".trainer_id").val(id);
            jQuery(".decline-modal-title").html('<span class="colored">De-Active</span>&nbsp;'+type);
            jQuery("#declined_name").html('Are you sure want to de-active <strong>' + name + '</strong>&nbsp;'+type.toLowerCase()+'?');
        });

        $('#sessions_table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": true,
            language: {
                search: "Search",
                searchPlaceholder: "Search by Trainees Name"
            },
            "fnDrawCallback": function(oSettings) {
                if (oSettings._iDisplayLength > oSettings.fnRecordsDisplay()) {
                    $(oSettings.nTableWrapper).find('.dataTables_paginate').hide();
                } else {
                    $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
                }
            }
        });
        $(".message__list li a").on('click', function() {
            $(".message__list li").removeClass("active");
            $(this).parent().addClass("active");
        });
        function deleteUser(userId) {
            alertify.confirm('Confirmation', 'Are you sure you want to delete document', function() {

                let url = "{{ route('deleteUser', ['']) }}/"+userId
                window.location.href = url

            },function() {

            })
        }

    </script>
@endpush
