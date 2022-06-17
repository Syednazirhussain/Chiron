@extends('trainer.layouts.app')
@section('title', ' Trainer Upcoming Sessions')

@section('content')

@include('trainer.common.upcoming',compact('upcomingSessions'))

@include('trainer.modals.session_request')
@include('trainer.modals.accept_request')
@include('trainer.modals.decline_request')
@include('trainer.modals.cancel_request')
@include('trainer.modals.session_accepted')
@include('trainer.modals.session_rejected')
@include('trainer.common.upcomingSessionJS')
@endsection
