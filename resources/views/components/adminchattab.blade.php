</ul>
</div>
</div>

{{-- don't delete above tags --}}


<div class="message__cont col-md-9">
    <div class="message-header">
        <h3><img src="{{ asset('assets/admin/images/messages/1.png') }}" alt="">
            Jhone</h3>
    </div>
    <div class="message-body row m-0 align-items-end">
        <div class="row m-0 w-100">
            <div class="message-day-title">
                <h5>Today</h5>
            </div>
            @foreach($messages as $msg)
                @if($msg->send_to == $sendTo)
                    <div class="message-text message-text-left col-md-12 p-0">
                        <div class="message__text__inr">
                            <div class="cont">
                                {{$msg->message}}
                            </div>
                            <div class="time">
                                7h Ago
                            </div>
                        </div>
                    </div>
                @else
                    <div class="message-text message-text-right col-md-12 p-0">
                        <div class="message__text__inr">
                            <div class="cont">
                                {{$msg->message}}
                            </div>
                            <div class="time">
                                3s Ago
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach


        </div>
    </div>
</div>
