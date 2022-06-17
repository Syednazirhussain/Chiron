<div>
    <!-- Be present above all else. - Naval Ravikant -->

    <link rel="stylesheet" href="{{ asset('assets/trainer/emoji/jquery.emojiarea.css') }}">

    <div class="card direct-chat fixed-chatbox" style="display:none;">
        <div class="card-header">

            <h3 class="card-title">
                <button type="button" class="btn btn-tool btn-arr" data-card-widget="collapse"><i
                        class="fas fa-arrow-left"></i></button>
                {{$userInfo->name ?? '' }}[ {{$userInfo->email ?? ''}} ]
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    {{--{{dump($messages)}}--}}
    <!-- /.card-header -->
        <div class="card-body">
            <div class="direct-chat-messages">
                @foreach($messages as $message)
                    @if($message->send_from == auth()->user()->id)
                        <div class="direct-chat-msg">

                            @if(isset(auth()->user()->profile_image))
                                <img class="direct-chat-img"
                                     src="{{ asset($storage.auth()->user()->profile_image) }}"
                                     alt="">
                            @else
                                <img class="direct-chat-img" src="{{ asset('assets/trainer/images/profile.png') }}"
                                     alt="">
                            @endif
                            <div class="direct-chat-text">
                                <span class="cont">{{$message->message}}</span>
                                <span class="time">23 Jan 2:00 pm</span>
                            </div>
                        </div>

                    @else
                        <div class="direct-chat-msg right sadsgsd">
                            <div class="direct-chat-text">
                                <span class="cont">{{$message->message}}</span>
                                <span class="time">23 Jan 2:05 pm</span>
                            </div>
                            <img class="direct-chat-img" src="{{ asset('assets/trainer/images/trainee/trainee1.png') }}"
                                 alt="">
                        </div>
                    @endif
                @endforeach

            </div>
        </div>


        <!-- /.card-body -->
        <div class="card-footer">
            <form id="form_id">
                <div class="input-group">
                    {{--                                        <p class="emojis-wysiwyg"></p>--}}
                    <input type="text" name="msg" id="msg">
                    <input type="hidden" name="send_to" id="send_to" value="{{$userInfo->id ?? ''}}">
                    <button id="ajaxSubmit" class="btn btn-send"><i class="fas fa-location-arrow"></i></button>
                    </span>
                </div>
            </form>
            <!-- <div class="value hidden"><pre id="emojis-wysiwyg-value"></pre></div> -->
        </div>
        <!-- /.card-footer-->
    </div>
    @push('scripts')
        <script src="{{ asset('assets/trainer/emoji/jquery.emojiarea.js') }}"></script>
        <script src="{{ asset('assets/trainer/emoji/packs/basic/emojis.js') }}"></script>

        <script type="text/javascript">
            var $wysiwyg = jQuery('.emojis-wysiwyg').emojiarea({wysiwyg: true});
            var $wysiwyg_value = jQuery('#emojis-wysiwyg-value');

            $wysiwyg.on('change', function () {
                $wysiwyg_value.text(jQuery(this).val());
                // $wysiwyg_value.name(jQuery(this).msg());
            });
            $wysiwyg.trigger('change');
        </script>
    @endpush

</div>


<script>
    jQuery(document).ready(function () {
        jQuery('#ajaxSubmit').click(function (e) {
            // alert('aa');
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
                    jQuery('.alert').show();
                    console.log(result.msg_send_from_trainee,'adasd1');
                    jQuery('.alert').html(result.success);
                    document.getElementById("form_id").reset();
                }
            });
        });
    });
</script>


