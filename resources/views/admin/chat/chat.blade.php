@if(isset($messages))
<meta name="csrf-token" content="{{ csrf_token() }}"/>

<div class="message__cont col-md-12">
    <div class="message-header">
        @if(isset($usersentTo->profile_image))
            <img src="{{ asset($storage.$usersentTo->profile_image) }}" alt="">
        @else
            <img src="{{ asset('assets/admin/images/default-user.png') }}" alt="">
        @endif
        <h3>  {{$usersentTo->name ?? ''}}</h3>
    </div>
    <div class="message-body row m-0 align-items-end">
        <div class="row m-0 w-100">
            <div class="message-day-title">
            </div>
            @if(isset($messages))
                @foreach($messages as $msg)
                    @if(isset($msg))
                        @if($msg->send_to == $sendTo)
                            <div class="message-text message-text-left col-md-12 p-0">
                                <div class="message__text__inr">
                                    <div class="cont">
                                        {{$msg->message ?? ''}}
                                    </div>
                                    <div class="time">
                                        <span class="time">{{$msg->created_at->diffForHumans() ?? ''}}</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="message-text message-text-right col-md-12 p-0">
                                <div class="message__text__inr">
                                    <div class="cont">
                                        {{$msg->message ?? ''}}
                                    </div>
                                    <div class="time">
                                        <span class="time">{{$msg->created_at->diffForHumans() ?? ''}}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>

    @endif
