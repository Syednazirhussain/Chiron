<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    {{-- <title>{{ config('app.name') }}</title> --}}
    <title>@yield('title', 'Admin Dashboard')</title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="icon" type="image/png" href="{{ asset('assets/admin/images/favicon.png') }}">
    <!--FontAWesome-->
    <!-- <link rel="stylesheet" href="{{asset('assets/web/plugins/fontawesome-free/css/all.min.css')}}"> -->
    <!--WebFont-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- appcss -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">

    <script src="{{ asset('assets/admin/js/header.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed ">
<div class="wrapper">
    @include('admin.common.navigations')
    @include('admin.common.sidebar')

        <!-- Main content -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @include('flash-message')
        @yield('content')
        <!-- /.content -->
</div>
<script>
    $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
         }
     });
</script>
@include('admin.common.footer')
    </div>
    <!-- ./wrapper -->
    <script src="{{ asset('assets/admin/js/footer.js') }}"></script>
    <script src="{{asset('js/validator.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <script src="{{asset('assets/common/js/common.js')}}"></script>
<script>

</script>
    @stack('scripts')
</body>

</html>

