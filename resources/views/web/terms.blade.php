@extends('web.layouts.app')
@section('content')

<section class="terms-condition">
    <div class="container">
        <div class="row">
            <div class="terms__cont col-md-12 ">
                <div class="hed d-flex justify-content-center mb-5">
                    <h2>Terms & <span class="highlight">Conditions</span> </h2>
                </div>
                @if($terms)
                {!! $terms !!}
                @else
                    Content Is Comming Soon
                @endif
            </div>
        </div>
    </div>
</section>

@endsection
