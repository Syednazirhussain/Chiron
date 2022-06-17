<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="icon" type="image/png" href="{{ asset('assets/web/images/favicon.png') }}">
    <!--FontAWesome-->
    <link rel="stylesheet" href="{{asset('assets/web/plugins/fontawesome-free/css/all.min.css')}}">
    <!--WebFont-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- appcss -->
    <link rel="stylesheet" href="{{ asset('assets/web/css/web.css') }}">
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <script src="{{ asset('assets/web/js/header.js') }}"></script>

    @yield('css')
</head>

<body>
    @include('web.common.navigations')
    <div class="wrapper">

        <!-- Main content -->

        @yield('content')
        <!-- /.content -->

    </div>
    <!-- ./wrapper -->
    @include('web.common.footer')

    <script src="{{ asset('assets/web/js/footer.js') }}"></script>
    <script src="{{asset('card-master/dist/card.js')}}"></script>
    <script src="{{asset('js/validator.js')}}"></script>
    <script>
  /*       $.validator.addMethod("strong_password", function (value, element) {
    let password = value;
    if (!(/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@#$%&])(.{8,20}$)/.test(password))) {
        return false;
    }
    return true;
}, function (value, element) {
    let password = $(element).val();
    if (!(/^(.{8,20}$)/.test(password))) {
        return 'Password must be between 8 to 20 characters long.';
    }
    else if (!(/^(?=.*[A-Z])/.test(password))) {
        return 'Password must contain at least one uppercase.';
    }
    else if (!(/^(?=.*[a-z])/.test(password))) {
        return 'Password must contain at least one lowercase.';
    }
    else if (!(/^(?=.*[0-9])/.test(password))) {
        return 'Password must contain at least one digit.';
    }
    else if (!(/^(?=.*[@#$%&])/.test(password))) {
        return "Password must contain special characters from @#$%&.";
    }
    return false;
}); */
$.validator.addMethod(
        "validDOB",
        function(value, element) {
            var from = value.split("-"); // DD MM YYYY
            // var from = value.split("/"); // DD/MM/YYYY
console.log(from);
            var day = from[2];
            var month = from[1];
            var year = from[0];
            var age = 18;

            var mydate = new Date();
            mydate.setFullYear(year, month-1, day);

            var currdate = new Date();
            var setDate = new Date();

            setDate.setFullYear(mydate.getFullYear() + age, month-1, day);

            if ((currdate - setDate) > 0){
                return true;
            }else{
                return false;
            }
        },
        "Sorry, you must be 18 years of age to apply"
    );
    </script>
    @stack('scripts')

</body>

</html>
