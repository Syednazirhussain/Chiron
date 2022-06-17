@extends('admin.layouts.app')
@section('title', 'Admin Earnings ')

@section('content')
<?php $redirect = route('pay-to-trainer') ?>
@include('admin.common.earning',compact('allSessions','redirect'))

@endsection

@push('scripts')
@endpush
