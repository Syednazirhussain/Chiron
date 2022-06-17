@extends('trainer.layouts.app')
@section('title', 'Pyament Information')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="paymentInfo__panel panel__style">
    <div class="hed">
        <!-- <h4><span class="colored mr-1">Change</span>Payment Info</h4> -->
    </div>
    <div class="payment-img">
        <img src="{{ asset('assets/trainee/images/stripe.png') }}" alt="">
    </div>

    <div class="form">
    <div id="errors"></div>
        @include('flash-message')
        <form action="{{ route('saveStripeKey') }}" method="post" class="form">
        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
            <div class="row m-0">
                <div class="form-group col-md-4">
                    <label for="">Stripe Key</label>
                    @if(isset($data->stripe_key))
                    <input type="text" name="stripe_key" value="{{$data->stripe_key}}" class="form-control" placeholder="Stripe Key">
                    @else
                    <input type="text" name="stripe_key" value="" class="form-control" placeholder="Stripe Key">
                    @endif
                    @if ($errors->has('stripe_key'))
                        <span class="text-danger">{{ $errors->first('stripe_key') }}</span>
                    @endif
                </div>
            </div>
            <div class="row m-0">
                <div class="form-group col-md-4 text-right">
                    <button class="btn btn-primary" id="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')


@endpush