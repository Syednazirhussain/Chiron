<div class="message__box__wrapper hidden">
    <div class="card-header">
        <h3 class="card-title">
            {{-- <button type="button" class="btn btn-tool btn-arr toggleChatBox"><i
                    class="fas fa-arrow-left"></i></button> --}}
            {{$userInfo->name ?? '' }}
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        {{--        <div class="card-appointment">--}}
        {{--            <button class="btn btn-primary" onclick="chatbox()">Book Appointment</button>--}}
        {{--        </div>--}}
        <div class="direct-chat-messages" id="chatMsg">
            @foreach($messages as $message)
                @if($message->send_from == auth()->user()->id)
                    <div class="direct-chat-msg">
                        {{--                        <h1>{{dump($userInfo->profile_image)}}</h1>--}}
                        @if(auth()->user()->profile_image)
                            <img class="direct-chat-img"
                                 src="{{ asset($storage.auth()->user()->profile_image) }}"
                                 alt="">
                        @else
                            <img class="direct-chat-img" src="{{ asset('assets/trainee/images/default-user.png') }}"
                                 alt="">
                        @endif
                        <div class="direct-chat-text">
                            <span class="cont">{{$message->message}}</span>
                            <span class="time">{{$message->created_at->diffForHumans() ?? ''}}</span>
                        </div>
                    </div>

                @else
                    <div class="direct-chat-msg right">
                        <div class="direct-chat-text">
                            <span class="cont">{{$message->message}}</span>
                            <span class="time">{{$message->created_at->diffForHumans() ?? ''}}</span>
                        </div>

                        @if(isset($userInfo->profile_image))
                            <img class="direct-chat-img"
                                 src="{{ asset($storage.$userInfo->profile_image) }}" alt="">
                        @else
                            <img class="direct-chat-img" src="{{ asset('assets/trainee/images/default-user.png') }}"
                                 alt="">
                        @endif

                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="card-footer">
        <form id="form_id" class="formInput">
            <div class="input-group emojiarea">
                {{-- <p class="emojis-wysiwyg"></p> --}}
                <textarea name="msg" id="msg" class="msgField"></textarea>
                <input type="hidden" name="send_to" id="send_to" value="{{$userInfo->id ?? ''}}" />
                <div class="input-group-append">
                    <button id="ajaxSubmit" class="btn btn-send"
                        data-id='{{ asset('assets/trainee/images/default-user.png') }}'>
                        <i class="icon material-icons">send</i>
                    </button>
                </div>
            </div>
        </form>
        <!-- <div class="value hidden"><pre id="emojis-wysiwyg-value"></pre></div> -->
    </div>
</div>



<script type="text/javascript">
jQuery(document).ready(function () {
    var $picker = $('.emojiarea textarea').emojioneArea( {
        pickerPosition: 'top',
        placeholder   : "Type your message here...",
        tonesStyle    : 'bullet',
    } );

    var pickerData = $picker[0].emojioneArea;
    $('.emojione-toggle').on( 'click', function() {
        pickerData.showPicker();
    } );
});
</script>

<script>
    jQuery(document).ready(function () {
        jQuery('.direct-chat-messages').scrollTop(jQuery('.direct-chat-messages')[0].scrollHeight);
        jQuery('#ajaxSubmit').click(function (e) {
            // alert('aa');

            var user_id = $(this).attr("data-id"); // will return the string "123"
            console.log('user_id' + user_id);


            message = jQuery('#msg').val();

            if (message == null || message == "") {
                e.preventDefault();
                console.log('not ok');
                jQuery('#msg').css({'border': '1px solid #ff0404'});

            } else {

                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/message') }}",
                    {{--                url: "{{route('message.store')}}",--}}
                    method: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        message: jQuery('#msg').val(),
                        send_to: jQuery('#send_to').val(),
                    },
                    success: function (result) {
                        var profile_image = '{{ asset("assets/trainee/images/default-user.png") }}';
                        if(result.msg_send_from_trainee.profile_image){
                            if(result.msg_send_from_trainee.role_id == 2){
                                profile_image = '{{ asset("assets/trainer/images/profile") }}/'+result.msg_send_from_trainee.profile_image;
                            }else{
                                profile_image = '{{ asset("assets/trainee/images/profile") }}/'+result.msg_send_from_trainee.profile_image;
                            }
                        }

                        jQuery('.alert').show();
                        jQuery('.alert').html(result.success);
                        {{--//src="{{ asset($storage.$userInfo->profile_image) }}" --}}
                        jQuery('#chatMsg').append(jQuery('<div class="direct-chat-msg"><img class="direct-chat-img" src="' + profile_image + '" alt=""><div class="direct-chat-text"><span class="cont">' + message + '</span><span class="time"> just now </span></div></div>'));
                        jQuery('.direct-chat-messages').scrollTop(jQuery('.direct-chat-messages')[0].scrollHeight);
                        document.getElementById("form_id").reset();
                        console.log(message)

                    }
                });
            }
        });
    });

            jQuery(".emojionearea-editor").keydown(function(e){
                alert('enter pressed');
            //     // Enter was pressed + shift key
            //     if (e.keyCode == 13 && e.shiftKey)
            //     {
            //         // prevent default behavior
            //         e.preventDefault();
            //     }

                // "Enter" key on the keyboard is 13 keyCode
                // if (e.keyCode === 13) {
                //     // Trigger the button element with a click
                //     document.getElementById("ajaxSubmit").click();
                //     alert('enter pressed');
                // }
             });
</script>


