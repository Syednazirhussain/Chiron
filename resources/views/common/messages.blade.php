@if(isset($messages))
    @foreach($messages as $message)
        @if($message->send_from == auth()->user()->id)
            <div class="direct-chat-msg">
                @if(auth()->user()->profile_image && auth()->user()->profile_image != null)
                    <img class="direct-chat-img" id="profile_image" src="{{ asset($storage.auth()->user()->profile_image) }}">
                @else
                    <img class="direct-chat-img" id="profile_image" src="{{ asset('assets/trainee/images/default-user.png') }}">
                @endif
                <div class="direct-chat-text">
                    <span class="cont">{{$message->message ?? ''}}</span>
                    @php $time = date("H:i:s", strtotime($message->created_at)); @endphp
                    <span class="time text-muted"> <sub>{{$message->created_at->diffForHumans()}}</sub></span>
                </div>
            </div>
        @else
            <div class="direct-chat-msg right">
                <div class="direct-chat-text">
                    <span class="cont">{{$message->message ?? ''}}</span>
                    <span class="time text-muted"> <sub>{{$message->created_at->diffForHumans()}} </sub></span>
                </div>
                @if(isset($userInfo->profile_image))
                    <img class="direct-chat-img" src="{{ asset($storage.$userInfo->profile_image) }}">
                @else
                    <img class="direct-chat-img" src="{{ asset('assets/trainee/images/default-user.png') }}">
                @endif
            </div>
        @endif
    @endforeach
@endif
