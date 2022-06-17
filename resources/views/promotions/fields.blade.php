<!-- Title Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

{{--<div class="form-group col-sm-6 col-lg-6">--}}
{{--    {!! Form::label('file', 'File:') !!} <br>--}}
{{--    {!! Form::file('file', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12 mb-0">
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

{{--<!-- Status Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--  {!! Form::label('status', 'Status:') !!}--}}
{{--  {!! Form::text('status', null, ['class' => 'form-control']) !!}--}}
{{--  {!! Form::select('status',['m'=>'Male','f'=>'Female'],null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}
