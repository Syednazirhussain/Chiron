@extends('trainer.layouts.app')
@section('title', ' Messages')

@section('content')
    {{-- <x-traineechattab :sendTo="$trainee_id"/> --}}

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
                    @include('trainer.common.messages', [ 'messages' => $messages ])
                </div>
            </div>
            <div class="message-footer">
                <form id="form_id">
                    <div class="input-group emojiarea">
                        <input type="hidden" name="send_to" id="send_to" value="{{$userInfo->id ?? ''}}">
                        <textarea type="text" class="form-control messagebox" name="msg" id="msg" placeholder="Type your message here..."></textarea>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-send">
                                <i class="icon material-icons">send</i>
                            </button>
                        </div>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@push('scripts')

    <script src="{{ asset('assets/trainer/emoji/jquery.emojiarea.js') }}"></script>
    <script src="{{ asset('assets/trainer/emoji/packs/basic/emojis.js') }}"></script>

    <script type="text/javascript">
        var $wysiwyg = jQuery('.emojis-wysiwyg').emojiarea({
            wysiwyg: true
        });
        var $wysiwyg_value = jQuery('#emojis-wysiwyg-value');

        $wysiwyg.on('change', function () {
            $wysiwyg_value.text(jQuery(this).val());
        });
        $wysiwyg.trigger('change');

    </script>
@endpush

@push('scripts')

<script type="text/javascript">

    jQuery(document).ready(function () {

        document.addEventListener('keyup', function(e) {
            if (e.key === 'Enter' && e.target.className === 'emojionearea-editor') {
                setTimeout( function() {
                    $(".emojionearea-editor").empty()
                }, 100);
            }
        });
        
        jQuery('.message-body').scrollTop(jQuery('.message-body')[0].scrollHeight);

        $('textarea.messagebox').keypress(function (e) {
            if (e.which == 13) {
                $('form#form_id').submit();
            }
        });


        $('#form_id').on("submit", function (e) {
            message = jQuery('#msg').val();

            if (message == null || message == "") {
                e.preventDefault();
                jQuery('.message-footer').css({'border': '1px solid #ff0404',});
            } else {
                e.preventDefault();
                jQuery('.message-footer').css({'border': '1px',});

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

<script type="text/javascript">

    setInterval(() => {
        getMessages();
    }, 5000);
   
    function getMessages() {

        let trainer_id = "@if(isset($trainer_id)) {{ $trainer_id }} @endif"
        let trainee_id = "@if(isset($trainee_id)) {{ $trainee_id }} @endif"

        let url = "{{ route('get_messages', ['', '']) }}/"+trainer_id+"/"+trainee_id+"/trainer"

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

@endpush