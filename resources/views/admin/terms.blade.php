@extends('admin.layouts.app')
@section('title', 'Admin Terms ')


@section('content')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    @if(isset($terms))
        <div class="terms__condition">

            <h3>{{$terms->page_title ?? ''}}</h3>
            <form method="post" action="{{ route('termsUpdate',$terms->page_title ?? '')}}">
                @csrf
                <div class="form-group">
                    <textarea class="ckeditor form-control" name="terms_body">{{$terms->page_body ?? ''}}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-12 action__btn text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    @else
        <h5>No record Found </h5>
    @endif
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection
