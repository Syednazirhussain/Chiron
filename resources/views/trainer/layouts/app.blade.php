<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
 
    <title> @yield('title','Trainer Dashboard') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="icon" type="image/png" href="{{ asset('assets/web/images/favicon.png') }}">
    <!--FontAWesome-->
<!-- <link rel="stylesheet" href="{{asset('assets/web/plugins/fontawesome-free/css/all.min.css')}}"> -->
    <!--WebFont-->

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap"
          rel="stylesheet">
    <!-- appcss -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    <link rel="stylesheet" href="{{ asset('assets/trainer/css/trainer.css') }}">
    
    <script src="{{ asset('assets/trainer/js/header.js') }}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    
    <link rel="stylesheet" href="{{ asset('assets/common/css/common.css') }}">
    <script src="{{ asset('assets/common/js/common.js') }}"></script>
    
    <link rel="stylesheet" href="{{ asset('assets/common/css/emojionearea.css') }}">
    <script src="{{ asset('assets/common/js/emojionearea.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
    @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed my-trainees-page">
<div class="wrapper">
@include('trainer.common.navigations')
@include('trainer.common.sidebar')

<!-- Main content -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @yield('content')
    <!-- /.content -->
    </div>
    @include('trainer.common.footer')
</div>
<!-- ./wrapper -->
<script>
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
</script>
<script src="{{ asset('assets/trainer/js/footer.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="{{asset('js/validator.js')}}"></script>
<script src="{{asset('assets/common/js/common.js')}}"></script>

@stack('scripts')
</body>

</html>
