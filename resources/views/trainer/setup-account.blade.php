@extends('trainer.layouts.app')
@section('title', ' Account Setup')

@section('content')



        @if( empty($external_account) && empty(  $account_details) )

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hello, {{ auth()->user()->name }}</strong> No account set up yet.
            <a href="{{ route('setup_new_account') }}" class="text-dark float-right">Setup New Account</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        @elseif( ( $external_account['status'] == 'error') || (  $account_details['status'] == 'error') )

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hello, {{ auth()->user()->name }}</strong> There is an error with account setup. Setup again.
        <a href="{{ route('setup_new_account') }}" class="text-dark float-right btn btn-link">Setup New Account</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @else
            <h1> Account Information </h1>
            @if( !empty($external_account) )
                @if( !empty($external_account->id) )
                    External Accout ID: {{$external_account->id}}
                @endif
                <br>
                @if( !empty($external_account->bank_name) )
                    Bank Name: {{$external_account->bank_name}}
                @endif
                <br>
            @endif

            @if( !empty($account_details) )
                @if( !empty($account_details->business_profile->url) )
                    URL: {{$account_details->business_profile->url}}
                @endif
                <br>
                @if( !empty($account_details->external_accounts->data[0]->account_holder_name) )
                    Account Holder Name : {{$account_details->external_accounts->data[0]->account_holder_name}}
                @endif
            @endif
        @endif




    </div>
    </div>



    </div>
@endsection

@push('scripts')
<script>
    var urlParams = new URLSearchParams(window.location.search);
    if( urlParams.has('success') === true ) {
        console.log('done');
        window.location.replace( '{{ route('setup_account') }}');
    }
</script>
@endpush
