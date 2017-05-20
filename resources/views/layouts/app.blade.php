<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


        <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/vendor/adminlte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/vendor/adminlte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset("/vendor/adminlte/dist/css/skins/_all-skins.min.css")}}" rel="stylesheet" type="text/css" />
    @yield('custom_css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->

</head>
<body class="hold-transition skin-green layout-top-nav">

    <div class="wrapper" >
    @include('layouts.nav')
        <div class="content-wrapper">
             @yield('content')
        </div>


        @include('admin.partials.footer')
    </div>


    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset ("/vendor/adminlte/plugins/jQuery/jQuery-2.2.3.min.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/vendor/adminlte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/vendor/adminlte/dist/js/app.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/vendor/adminlte/dist/js/demo.js") }}" type="text/javascript"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience -->
          
    <script src="{{ asset ("/vendor/adminlte/plugins/slimScroll/jquery.slimscroll.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/vendor/adminlte/plugins/fastclick/fastclick.min.js") }}" type="text/javascript"></script>

    <script src="{{ asset ("custom/js/sidebar_navigate.js") }}"></script>



    @yield('custom_js')
   
</body>
</html>
