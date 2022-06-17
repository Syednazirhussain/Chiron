@extends('web.layouts.app')
@section('content')

    <section class="privacy-policy">
        <div class="container">
            <div class="row">
                <div class="privacy__cont col-md-12 ">
                    <div class="hed d-flex justify-content-center mb-5">
                        <h2>Privacy <span class="highlight">Policy</span></h2>
                    </div>

                    <div>
                        @if(isset($privacy))
                            {!! $privacy->page_body !!}
                        @else
                            Content Is Comming Soon
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </section>

@endsection
