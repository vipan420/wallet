
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 <link rel="stylesheet" href="{{ asset('/') }}css/separate/pages/login.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/lib/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/main.css">
    <script src="{{ asset('/') }}js/lib/jquery/jquery-3.2.1.min.js"></script>
<script src="{{ asset('/') }}js/lib/popper/popper.min.js"></script>
<script src="{{ asset('/') }}js/lib/tether/tether.min.js"></script>
<script src="{{ asset('/') }}js/lib/bootstrap/bootstrap.min.js"></script>
<script src="{{ asset('/') }}js/plugins.js"></script>
    <script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
    <title>{{ config('app.name', 'Admin Panel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body >
	        @yield('content')
  
  
    <!-- Scripts -->
    <script src="{{ asset('/app2.js') }}"></script>
<script>
        $(function() {
            $('.page-center').matchHeight({
                target: $('html')
            });

            $(window).resize(function(){
                setTimeout(function(){
                    $('.page-center').matchHeight({ remove: true });
                    $('.page-center').matchHeight({
                        target: $('html')
                    });
                },100);
            });
        });
    </script>

</body>
</html>

