<div class="message__panel panel__style">
    <div class="message__panel__inr">
        <div class="message-header">
            <h3>
                @if(isset($userInfo->profile_image))
                    <img src="{{ asset('assets/default-user.png') }}" alt="">
                @else
                    <img src="{{ asset('assets/default-user.png') }}" alt="">
                @endif
                {{ $userInfo->name ?? '' }}
            </h3>
        </div>
        <div class="message-body row m-0 align-items-end">
            <div class="row m-0 w-100" id="chatMsg">
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
                                        {{ $message->message }}
                                    </div>
                                    <span class="time">{{$message->created_at->diffForHumans() ?? ''}}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="message-footer">
            <form id="form_id">
                <div class="input-group emojiarea">
                    <input type="hidden" name="send_to" id="send_to" value="{{$userInfo->id ?? ''}}">
                    <textarea type="text" class="form-control" name="msg" id="msg" placeholder="Type your message here..."></textarea>
                    <div class="input-group-append">
                        <button id="ajaxSubmit" type="button" class="btn btn-send">
                            <i class="icon material-icons">send</i>
                        </button>
                    </div>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>



<link rel="stylesheet" href="https://rawgit.com/mervick/emojionearea/master/dist/emojionearea.css">

@push('scripts')
    <script src="https://rawgit.com/mervick/emojionearea/master/dist/emojionearea.js"></script>

    <script type="text/javascript">
        var $picker = $('.emojiarea textarea').emojioneArea( {
            pickerPosition: 'top',
            placeholder   : "Type your message here...",
            tonesStyle    : 'bullet',
        } );

        var pickerData = $picker[0].emojioneArea;
        $('.emojione-toggle').on( 'click', function() {
            pickerData.showPicker();
        } );

    </script>
@endpush



<script>
    jQuery(document).ready(function () {

        document.addEventListener('keyup', function(e) {
            if (e.key === 'Enter' && e.target.className === 'emojionearea-editor') {
                $("#ajaxSubmit").focus();
                setTimeout( function() {
                    $("#ajaxSubmit").click();
                    $(".emojionearea-editor").html("")
                }, 100);
            }
        });
        
        jQuery('.message-body').scrollTop(jQuery('.message-body')[0].scrollHeight);
        jQuery('#ajaxSubmit').click(function (e) {

            message = jQuery('#msg').val();

            if (message == null || message == "") {
                e.preventDefault();
                $(".emojionearea-editor").val("Please Enter Value");
            } else {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                jQuery.ajax({
                    url: "{{ url('/message') }}",
                    method: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        message: jQuery('#msg').val(),
                        send_to: jQuery('#send_to').val(),
                    },
                    success: function (result) {
                        jQuery('.alert').show();
                        jQuery('.alert').html(result.success);
                        jQuery( '#chatMsg' ).append(jQuery( '<div class="message-text message-text-left col-md-12"><div class="message__text__inr"><div class="cont">'+message+'</div><span class="time">1 second ago</span></div></div>' ) );
                        jQuery('.message-body').scrollTop(jQuery('.message-body')[0].scrollHeight);
                        document.getElementById("form_id").reset();
                    }
                });
            }
        });
    });
</script>
