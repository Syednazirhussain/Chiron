{{--@if (session('error'))--}}
{{--    <div class="alert alert-danger">--}}
{{--        {{ session('error') }}--}}
{{--    </div>--}}
{{--@endif--}}
@section('title', 'Admin Bulk Email ')


@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="table table-responsive mb0">
    <table class="table table__style mb0" id="promotions-table">
        <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            {{-- <th>Status</th>--}}
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>

            <?php use Illuminate\Support\Str; ?>

            @forelse ($promotions as $promotion)
                <tr>
                    <td>{{ $promotion->title ?? '' }}</td>
                    <td>
                        {{--{{ str_limit($promotion->content , 50) }}--}}
                        {{ Str::limit($promotion->content, 150) }}
                    </td>
                    {{-- <td>{{ $promotion->status }}</td>--}}
                    <td width="120">
                        <div class="promotion_btns">
                            {!! Form::open(['route' => ['promotions.destroy', $promotion->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{{ route('promotions.show', [$promotion->id]) }}"
                                class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('promotions.edit', [$promotion->id]) }}"
                                class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {{-- <x-all-users :id="$promotion->id"> </x-all-users>--}}
                            {!! Form::close() !!}
                            <button type="button" class="btn btn-primary SendEmail" data-toggle="modal"
                                    data-target="#exampleModalCenter"
                                    data-url={{route('userforemail',$promotion->id)}}
                                    data-toggle="tooltip" data-placement="top" title="email">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                {{-- <x-all-users />--}}
                {{-- <x-hello-world title="Readerstacks" :counter-value="$counter"></x-hello-world>--}}
                {{-- <x-alert type="error" :message="$message"/>--}}
            @empty
                <tr>
                    <td class="text-center" colspan="3">No promotion(s)</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Bulk email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="bodyContent" class="col-md-12 mb-2 p-3"></div>
            </div>
        </div>
    </div>
</div>


<script>
    jQuery(document).ready(function ($) {

        $(".SendEmail").click(function (e) {

            var ajaxurl = $(this).attr("data-url");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: ajaxurl,
                dataType: 'json',
                success: function (data) {
                    $("#bodyContent").append(data);
                    console.log(data);
                },
                error: function (data) {
                    console.log('error');
                    console.log(data);
                }
            });
        });
    });

</script>


<style>
    .promotion_btns {
        display: flex;
    }

    .promotion_btns button, .promotion_btns a {
        font-size: 14px;
        padding: 2px 12px;
        height: 26px;
        margin-right: 5px;
        border-radius: 3px !important;
        border: none;
    }

    .promotion_btns .btn-group a:first-child {
        background: #5c6e76;
        color: #fff;
        line-height: 22px;
    }

    .promotion_btns .btn-group a {
        background: #0092d9;
        color: #fff;
        font-size: 13px;
    }

    .promotion_btns .SendEmail {
        background: #038fd3;
    }

</style>
