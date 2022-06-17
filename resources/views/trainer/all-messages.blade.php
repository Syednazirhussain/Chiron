@extends('trainer.layouts.app')
@section('title', ' Messages')

@section('content')


    <!-- <span>Messages tab</span> -->

    <div class="tab__messages row">
        <div class="message__list col-md-3">
            <div class="message__list__inr">
                <h4>Chats</h4>
                <ul>
                    @if($users->count() <= 0)
                        No chat avaiable
                    @else
                        @foreach($users as $user)
                            <form class="commentForm">
                                <li class="active">
                                    <a href="#">
                                        <div class="media">
                                            @if(isset($user->profile_image))
                                                <img
                                                    src="{{asset($storage.$user->profile_image)}}"
                                                    alt="" width="20">
                                            @else
                                                <img
                                                    src="{{asset('assets/admin/images/default-user.png')}}"
                                                    alt="" width="20">
                                            @endif
                                            <div class="media-body">
                                                <input type="hidden" value="{{$user->id}}"
                                                       class="sendfrom"
                                                       name="id" id="sendfrom">
                                                <button type="submit" class="mt-0 send-ajax"
                                                        id="send-ajax"
                                                        style="padding: 0;border: none;background: none;"
                                                        value="add">
                                                    {{$user->name ?? ''}}
                                                </button>
                                                <span>{{$user->updated_at->diffForHumans() ?? ''}}</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </form>
                        @endforeach
                    @endif
                    {{--  if componenet is enable commnet these     </ul>  </div>  </div> --}}
                </ul>
            </div>
        </div>

        <div class="append-chat col-md-9" id="append-chat">

        </div>

    </div>

@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>

    $(document).ready(function () {
        $(document).on("submit", '.commentForm', function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var data = $(this).serialize();
            var me = this;

            // alert(data);
            $.ajax({
                type: 'POST',
                url: "{{route('traineemsg')}}",
                data: data,
                datatype: 'JSON',
                success: function (data) {
                    $(".append-chat").empty();
                    console.log(data);
                    $('.append-chat').append(data);
                },
                error: function (data) {
                    console.log(data);
                }
            });

            return false;
        })
    });

</script>
