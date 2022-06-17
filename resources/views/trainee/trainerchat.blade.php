<div class="message__panel panel__style">

    <div class="message__panel__inr">
        <div class="message-header   avatar-holder d-flex">

                <h3 class="card-title">
                    @if($userInfo->profile_image)
                    <img src=" {{ asset($storage.$userInfo->profile_image)}}" />
                    @else
                    <img src="{{ asset('assets/trainee/images/default-user.png') }}" alt="image" />

                    @endif

                    {{$userInfo->name ?? '' }}
                </h3>

                <button type="button" class="btn btn-tool crossbtn" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
        </div>

        <div class="message-body">

            {{--{{dump(auth()->user()->profile_image)}}--}}
            <div class="direct-chat-messages" id="chatMsg">
                @include('common.messages', [ 'messages' => $messages ])
            </div>
        </div>
        <div class="message-footer">
            <form id="form_id" class="formInput">
                <div class="input-group emojiarea">
                    {{--<p class="emojis-wysiwyg"></p>--}}
                    <input type="hidden" name="send_to" id="send_to" value="{{$userInfo->id ?? ''}}">
                    <textarea type="text" name="msg" id="msg" class="control-form msgField"></textarea>

                    <span class="input-group-append">
                        <button id="ajaxSubmit" class="btn btn-send" data-id="{{ asset('assets/trainee/images/default-user.png') }}">
                            <i class="icon material-icons">send</i>
                        </span>
                    </span>
                </div>
            </form>
            <!-- <div class="value hidden"><pre id="emojis-wysiwyg-value"></pre></div> -->
        </div>

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

            jQuery(".emojionearea-editor").html("")
      

            var user_id = $(this).attr("data-id"); // will return the string "123"
            console.log('user_id' + user_id);
             // user profile image
            message = jQuery('#msg').val();
            if (message == null || message == "") {
                
                console.log('not ok');
                jQuery('.emojionearea-editor').css({'border': '1px solid #ff0404'});
                e.preventDefault();
               

            } else {

                // jQuery("#msg").keyup(function(){
                //     jQuery("#msg").css("background-color", "pink");
                // });
                jQuery('.emojionearea-editor').css({'border': '1px solid'});
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
                            profile_image = '{{ asset("assets/trainee/images/profile") }}/'+result.msg_send_from_trainee.profile_image;
                        }
                        jQuery('.alert').show();
                        jQuery('.alert').html(result.success);

                        jQuery('#chatMsg').append(jQuery('<div class="direct-chat-msg">' +
                            // '<img class="direct-chat-img" src="' + user_id + '" alt="">' +
                            '<img class="direct-chat-img" src="' + profile_image + '" alt="">' +
                            '<div class="direct-chat-text"><span class="cont">' + message +
                            '</span><span class="time text-muted"><sub> - just now </sub></span></div></div>'));
                        // jquery('.direct-chat-messages').
                        jQuery('.direct-chat-messages').scrollTop(jQuery('.direct-chat-messages')[0].scrollHeight);
                        document.getElementById("form_id").reset();
                    }
                });
            }
        });
    });

//     jQuery(".emojionearea-editor").keydown(function(e){

//     // Enter was pressed + shift key
//     if (e.keyCode == 13 && e.shiftKey)
//     {
//         // prevent default behavior
//         e.preventDefault();
//     }

//     // "Enter" key on the keyboard is 13 keyCode
//     if (event.keyCode === 13) {
//         // Trigger the button element with a click
//         document.getElementById("ajaxSubmit").click();
//     }
// });
</script>

<script type="text/javascript">

    setInterval(() => {
        getMessages();
    }, 5000);

    function getMessages() {

        let trainer_id = "@if(isset($trainer_id)) {{ $trainer_id }} @endif"
        let trainee_id = "@if(isset($trainee_id)) {{ $trainee_id }} @endif"

        let url = "{{ route('get_messages', ['', '']) }}/"+trainer_id+"/"+trainee_id

        $.ajax({
            "url": url.replace(/\s/g, ''),
            "type": "GET",
            "Content-Type": "application/json",
            "Accept": "application/json",
        }).done(function (response) {
            $('#chatMsg').empty().html(response.view)
        }).catch(function (error) {

            console.log(error)
        })
   }
</script>
