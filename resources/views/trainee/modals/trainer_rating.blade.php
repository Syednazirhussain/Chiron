<div class="modal modal-custom-centered modal-trainer-rating fade" id="trainerRatingModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('reviewPosted')}}">
                @csrf
                <div class="modal-body">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <input type="hidden" name="session_id" value="" id="session_id"/>
                    <input type="hidden" name="trainer_id" value="" id="trainer_id"/>
                    <input type="hidden" name="ratingValInput" value="" id="ratingvalue"/>


                    <h3><span class="colored">Rate your</span> trainer</h3>
{{--                    <div class="__img">--}}
{{--                        <img src="{{ asset('assets/trainer/images/trainee/big_img1.png') }}" alt="">--}}
{{--                    </div>--}}
                    <div class="__cont">
                        <h4 id="trainer_name">Carol Brendon</h4>
                    </div>
                    <section class='rating-widget'>
                        <!-- Rating Stars Box -->
                        <div class='rating-stars text-center'>
                            <ul id='stars'>
                                <li class='star' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Excellent' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='WOW!!!' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                            </ul>
                        </div>

                        <div class='success-box'>
                            <div class='text-message'></div>
                        </div>
                    </section>

                    <div class="__action">
                        <button class="btn btn-primary" type="submit">Done</button>
                        {{--                    <button class="btn btn-primary-o mt-3" data-dismiss="modal">Rate Later</button>--}}
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            /* 1. Visualizing things on Hover - See next part for action on click */
            $('#stars li').on('mouseover', function () {
                var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

                // Now highlight all the stars that's not after the current hovered star
                $(this).parent().children('li.star').each(function (e) {
                    if (e < onStar) {
                        $(this).addClass('hover');
                    } else {
                        $(this).removeClass('hover');
                    }
                });

            }).on('mouseout', function () {
                $(this).parent().children('li.star').each(function (e) {
                    $(this).removeClass('hover');
                });
            });


            /* 2. Action to perform on click */
            $('#stars li').on('click', function () {
                var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                var stars = $(this).parent().children('li.star');

                for (i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass('selected');
                }

                for (i = 0; i < onStar; i++) {
                    $(stars[i]).addClass('selected');
                }

                // JUST RESPONSE (Not needed)
                var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                var msg = "";
                if (ratingValue > 1) {
                    msg = "Thanks! You rated this " + ratingValue + " stars.";
                } else {
                    msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
                }

                $('#ratingvalue').val(ratingValue);
                responseMessage(msg);

            });


        });


        function responseMessage(msg) {
            $('.success-box').fadeIn(200);
            $('.success-box div.text-message').html("<span>" + msg + "</span>");
        }

    </script>
@endpush
