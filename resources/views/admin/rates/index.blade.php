@extends('admin.layouts.app')
@section('title', 'Admin Manage Rates ')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <div id="errors" style="width: 80%"></div>
    <div class="manage__rates__panel panel__style mb-4">
        <div class="hed hed__search">
            <h4>Manage Trainer Hourly Rates</h4>
            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal"
               data-target="#manageTrainerLocationModal">Add More Location</a>
        </div>
        <div class="table table-responsive mb-0 mt-0">
            <table id="manage_trainer" class="table table-manage-rates table__style">
                <thead>
                <tr>
                    <th>Location</th>
                    <th>1 on 1 Training</th>
                    <th>Inc Sales Tax</th>
                    <th>2 on 1 Training</th>
                    <th>Inc Sales Tax</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($rates))
                    @foreach($rates as $rate)
                        {{--                {{dd($rate->countries->name)}}--}}
                        @if($rate->user_type == 'for_trainer')
                            <tr>
                                <td>@if(isset($rate->countries))
                                        {{$rate->countries->name ?? '' }}
                                    @endif </td>
                                <td>${{$rate->one_on_1_training_charge}}</td>

                                <td>${{$rate->one_on_1_training_charge ?? ''}} +
                                    ${{$rate->one_on_1_training_charge_sales_tax ?? ''}}
                                    = {{$rate->one_on_1_training_charge + $rate->one_on_1_training_charge_sales_tax}}</td>
                                <td>${{$rate->two_on_1_training_charge ?? ''}}</td>
                                <td>${{$rate->two_on_1_training_charge ?? ''}} +
                                    ${{$rate->two_on_1_training_charge_sales_tax ?? ''}}
                                    = {{$rate->two_on_1_training_charge + $rate->two_on_1_training_charge_sales_tax}} </td>
                                <td class="text-center">
                                    <!-- <a class="btn btn-edit mr-2" data-toggle="modal" data-target="#editTrainerLocationModal"
                                    href="javascript:void(0);"><i class="far fa-edit"></i></a> -->
                                    <a class="btn btn-delete trainerDelete" data-toggle="modal"
                                       data-id_trainer="{{$rate->id}}" data-name_trainer="{{$rate->location}}"
                                       data-target="#deleteTrainerLocationModal"
                                       href="javascript:void(0);"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
    <div id="admin-response" style="width: 80%"></div>

    <div class="manage__rates__panel panel__style">
        <div class="hed hed__search">
            <h4>Manage Admin Fee</h4>
            {{-- <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal"
               data-target="#manageAdminLocationModal">Add More Location</a>
         --}}
            </div>
        <div class="table table-responsive mb-0 mt-0">
            <table id="manage_admin" class="table table-manage-rates table__style">
                <thead>
                <tr>
                    <th>Location</th>
                    <th>1 on 1 Training</th>
                    <th>Inc Sales Tax</th>
                    <th>2 on 1 Training</th>
                    <th>Inc Sales Tax</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                {{--                {{dd($rates)}}--}}
                @if(isset($rates))
                    @foreach($rates as $rate)
                        @if($rate->user_type == 'for_admin')
                            <tr>
                                <td>@if(isset($rate->countries))
                                        {{ $rate->countries->name ?? ''}}
                                    @endif </td>
                                <td>${{$rate->one_on_1_training_charge ?? ''}}</td>
                                <td>${{$rate->one_on_1_training_charge ?? ''}} +
                                    ${{$rate->one_on_1_training_charge_sales_tax ?? ''}}
                                    = {{$rate->one_on_1_training_charge + $rate->one_on_1_training_charge_sales_tax}}</td>
                                <td>${{$rate->two_on_1_training_charge ?? ''}}</td>
                                <td>${{$rate->two_on_1_training_charge ?? ''}} +
                                    ${{$rate->two_on_1_training_charge_sales_tax ?? ''}}
                                    = {{$rate->two_on_1_training_charge + $rate->two_on_1_training_charge_sales_tax}} </td>
                                <td class="text-center">
                                    <!-- <a class="btn btn-edit mr-2" data-toggle="modal" data-target="#editAdminLocationModal"
                                    href="javascript:void(0);"><i class="far fa-edit"></i></a> -->
                                    <a class="btn btn-delete adminDelete" data-toggle="modal"
                                       data-id="{{$rate->id ?? ''}}"
                                       data-name="{{ $rate->location ?? '' }}"
                                       data-target="#deleteAdminLocationModal"
                                       href="javascript:void(0);"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>

    @include('admin.rates.trainer.add')
    @include('admin.rates.trainer.edit')
    @include('admin.rates.trainer.delete')
    @include('admin.rates.admin.add')
    @include('admin.rates.admin.edit')
    @include('admin.rates.admin.delete')

@endsection
@push('scripts')
    <script>
        $(function () {
            $('#manage_trainer').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search by location"
                },
                "fnDrawCallback": function (oSettings) {
                    if (oSettings._iDisplayLength > oSettings.fnRecordsDisplay()) {
                        $(oSettings.nTableWrapper).find('.dataTables_paginate').hide();
                    } else {
                        $(oSettings.nTableWrapper).find('.dataTables_paginate').show();
                    }
                }
            });
            $('#manage_admin').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search by location"
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
    <script>
        $('.adminDelete').click(function () {
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            $('#admin_row_id').val(id);
            // $("#Adminreject0").text('Are you sure want to delete ' + name + ' ?');
            $("#Adminreject0").text('Are you sure want to delete.?');
        });
        $('.trainerDelete').click(function () {
            var id = $(this).attr('data-id_trainer');
            var name = $(this).attr('data-name_trainer');
            $('#trainerrow_id').val(id);
            // $("#trainerreject0").text('Are you sure want to delete ' + name + ' ?');
            $("#trainerreject0").text('Are you sure want to delete.?');
        });

        function deleteRate(type) {
            let id = 0;
            if (type == 'trainer') {
                id = $('#trainerrow_id').val();
            } else if (type == 'admin') {
                id = $('#admin_row_id').val();
            }
            let formData = new FormData();
            formData.append('id', id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{ route('deleteRates') }}',
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (response) {
                    console.log(response)
                    if (response.code == 200) {
                        window.location.reload();
                    } else if (response.code == 400) {
                        alert(response.message)
                        window.location.reload();
                    }
                }
            })
        }
    </script>
@endpush
