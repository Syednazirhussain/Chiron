<div>

    <style>
        body {
            background: #00B4DB;
            background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);
            background: linear-gradient(to right, #0083B0, #00B4DB);
            color: #514B64;
            min-height: 100vh
        }
        .customScroll {
            height: 220px;
            overflow-y: scroll;
            border: 1px solid #343434;
            padding: 15px;
        }
        .customScroll label {
            word-break: break-all;
        }

        .modal-content{
            min-width: 810px!important;
        }
        .modal-dialog-centered{
            justify-content: center;
        }

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

    <form action="{{route('sendemail')}}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="row ">

                <input value="{{$promotion_id ?? ''}}" name="promotion_id" class="d-none" type="text">
                <div class="col-md-6">
                  <div class="customScroll">
                    <label>Trainer</label>
                    <br>
                    @if(isset($userLists['trainer']))
                        {{--                        <select id="choices-multiple-remove-button" name="trainer[]"--}}
                        {{--                                multiple>--}}


                        @foreach($userLists['trainer'] as $trainer)
                        <input type="checkbox" id="scales" name="trainer[]" value="{{$trainer->id}}"
                        >
                 <label for="trainer[]">{{$trainer->email ?? '' }}</label><br>
                            @endforeach


                        {{-- <select name="trainer[]" >
                            @foreach($userLists['trainer'] as $trainer)
                                <option value="{{$trainer->id}}">{{$trainer->email}}</option>
                            @endforeach
                        </select> --}}
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                   <div class="customScroll">
                    <label>Trainee</label>
                    <br>
                    @if(isset($userLists['trainee']))

                    @foreach($userLists['trainee'] as $trainee)
                    <input type="checkbox" id="scales" name="trainee[]" value="{{$trainee->id}}"
                    >
             <label for="trainee[]">{{$trainee->email ?? '' }}</label><br>
             @endforeach

                    {{-- <input type="checkbox" value="{{$trainee->id}}"> {{$trainee->email}} --}}
{{--                        <select id="choices-multiple-remove-button" name="trainee[]" multiple>--}}
                        {{-- <select name="trainee[]" >
                            @foreach($userLists['trainee'] as $trainee)
                                <option value="{{$trainee->id}}">{{$trainee->email}}</option>
                            @endforeach
                        </select> --}}
                    @endif
                   </div>
                </div>
            </div>
        </div>
<br><br>
        <button type="submit" class="btn btn-primary"> SendEmail</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </form>

    <script>
        $(document).ready(function () {
            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
                maxItemCount: 10,
                searchResultLimit: 10,
                renderChoiceLimit: 10
            });
        });
    </script>
</div>
