@if(isset($messages))
    @foreach($messages as $message)
        @if($message->send_from == auth()->user()->id)
            <div class="message-text message-text-left col-md-12">
                <div class="message__text__inr">
                    <div class="cont">
                        {{$message->message}}
                    </div>
                    <span class="time">{{$message->created_at->diffForHumans() ?? ''}}</span>
                </div>
            </div>
        @else
            <div class="message-text message-text-right col-md-12">
                <div class="message__text__inr">
                    <div class="cont">
                        {{$message->message}}
                    </div>
                    <span class="time">{{$message->created_at->diffForHumans() ?? ''}}</span>
                </div>
            </div>
        @endif
    @endforeach
@endif