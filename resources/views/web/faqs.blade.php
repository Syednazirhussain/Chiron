@extends('web.layouts.app')
@section('content')

    <section class="faqs">
        <div class="container">
            <div class="row m-0">
                <div class="hed">
                    <h2>Frequently Asked <span class="highlight">Questions</span></h2>
                </div>
            </div>

            {{--        faq_generals','faq_trainers','faq_users' --}}
            <div class="faqs__wrapper row m-0 mt-4">
                <h4>GENERAL FAQs</h4>
                @if(isset($faq_generals))
                    @foreach($faq_generals as $faq_general)
                        <div class="accordion" id="gfaqsparent">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#gfaqs{{$faq_general->id}}" aria-expanded="false"
                                            aria-controls="gfaqs1">
                                        {{$faq_general->title ?? ''}}
                                    </button>
                                </h2>
                                <div id="gfaqs{{$faq_general->id}}" class="accordion-collapse collapse "
                                     aria-labelledby="headingOne"
                                     data-bs-parent="#gfaqsparent">
                                    <div class="accordion-body">
                                        <p>{{$faq_general->description ?? ''}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @endif
            </div>


            <div class="faqs__wrapper row m-0 mt-4">
                <h4>TRAINER FAQs</h4>
                @if(isset($faq_trainers))
                    @foreach ($faq_trainers as $faq_trainer)
                        <div class="accordion" id="tfaqsparent">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#tfaqs{{$faq_trainer->id}}" aria-expanded="false"
                                            aria-controls="tfaqs1">
                                        {{$faq_trainer->title ?? '' }}
                                    </button>
                                </h2>
                                <div id="tfaqs{{$faq_trainer->id}}" class="accordion-collapse collapse"
                                     aria-labelledby="headingOne"
                                     data-bs-parent="#tfaqsparent">
                                    <div class="accordion-body">
                                        <p>
                                            {{$faq_trainer->description ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @endif
            </div>
            <div class="faqs__wrapper row m-0 mt-4">
                <h4>USER FAQs</h4>
                @if(isset($faq_users))
                    @foreach ($faq_users  as $faq_user )
                        <div class="accordion" id="ufaqsparent">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#ufaqs{{$faq_user->id}}" aria-expanded="false" aria-controls="ufaqs1">
                                        {{$faq_user->title ?? ''}}
                                    </button>
                                </h2>
                                <div id="ufaqs{{$faq_user->id}}" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                     data-bs-parent="#ufaqsparent">
                                    <div class="accordion-body">
                                        <p>{{$faq_user->description ?? ''}} </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @endif
            </div>
        </div>

    </section>

@endsection
