<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> @yield('title','Trainee') </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="icon" type="image/png" href="{{ asset('assets/web/images/favicon.png') }}">
    <!--FontAWesome-->

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap"
          rel="stylesheet">
    <!-- appcss -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="{{ asset('assets/trainee/css/trainee.css') }}">
    <script src="{{ asset('assets/trainee/js/header.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/common/css/common.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/common/css/emojionearea.css') }}">
    <script src="{{ asset('assets/common/js/emojionearea.js') }}"></script>

    @yield('css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    @include('trainee.common.navigations')
    @include('trainee.common.sidebar')

    <!-- Main content -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    @yield('content')
    <!-- /.content -->
    </div>
    @include('trainee.common.footer')
</div>
<!-- ./wrapper -->

<script src="{{ asset('assets/trainee/js/footer.js') }}"></script>
<script src="{{asset('card-master/dist/card.js')}}"></script>

<script src="{{asset('js/validator.js')}}"></script>

@stack('scripts')

<script>
    

$( document ).ready(function() {
    console.log( "ready!" );
    // $('.datepicker').datepicker();
});
   
</script>
</body>

</html>
