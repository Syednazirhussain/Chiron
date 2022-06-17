@extends('web.layouts.app')
@section('content')

@include('web.modal.personalForm')

<section class="auth-status">
    <div class="container">
        <div class="row">
            <div class="hed">
                <h3>Authorization <span class="highlight">Status</span> <span class="prog">In Progress</span></h3>
                <p>You will be notified once you are approved to use the platform by Chirons.</p>
                <a href="{{ route('accountLogin') }}" class="btn btn-primary">CHECK EMAIL</a>
            </div>
        </div>
    </div>
</section>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary hidden" data-bs-toggle="modal" data-bs-target="#personalFormModal">
  Launch demo modal
</button> -->

@endsection

@push('scripts')
<script type="text/javascript">
$(window).on('load', function(){
    $(".btn[data-bs-toggle='modal']").trigger('click');
});
</script>
@endpush