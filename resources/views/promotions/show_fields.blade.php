<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $promotion->title ?? ''}}</p>
</div>

<!-- Content Field -->
<div class="col-sm-12">
    {!! Form::label('content', 'Content:') !!}
    <p>{{ $promotion->content ?? ''}}</p>
</div>

<!-- Status Field -->
{{--<div class="col-sm-12">--}}
{{--    {!! Form::label('status', 'Status:') !!}--}}
{{--    <p>{{ $promotion->status ?? ''}}</p>--}}
{{--</div>--}}

