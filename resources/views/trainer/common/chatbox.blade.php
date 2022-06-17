<link rel="stylesheet" href="{{ asset('assets/trainer/emoji/jquery.emojiarea.css') }}">

<div class="card direct-chat fixed-chatbox" style="display:none;">
    <div class="card-header">

        <h3 class="card-title"><button type="button" class="btn btn-tool btn-arr" data-card-widget="collapse"><i class="fas fa-arrow-left"></i></i></button>
        Carlos Brendon</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="direct-chat-messages">
            <div class="direct-chat-msg">
                <img class="direct-chat-img" src="{{ asset('assets/trainer/images/profile.png') }}" alt="">
                <div class="direct-chat-text">
                    <span class="cont">Hi Carol, How may I help you?</span>
                    <span class="time">23 Jan 2:00 pm</span>
                </div>

            </div>

            <div class="direct-chat-msg right  afadas">
                <div class="direct-chat-text">
                    <span class="cont">Please approve my request.</span>
                    <span class="time">23 Jan 2:05 pm</span>
                </div>
                <img class="direct-chat-img" src="{{ asset('assets/trainer/images/trainee/trainee1.png') }}" alt="">
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <form action="#" method="">
            <div class="input-group">
                <p class="emojis-wysiwyg"></p>
                <button type="submit" class="btn btn-send"><i class="fas fa-location-arrow"></i></button>
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

		$wysiwyg.on('change', function() {
			$wysiwyg_value.text(jQuery(this).val());
		});
		$wysiwyg.trigger('change');
</script>
@endpush
