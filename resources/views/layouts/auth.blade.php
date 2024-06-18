<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BUMDes Bogoharjo - LOGIN </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="icon" href="img/logo.png">

    <style type="text/css">
        .background{
            background-image: url("img/gambar/bg-login.jpg");
            height: 100%;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .img-responsive{
            height: 120px;
            position: relative;
            overflow: hidden;
            top: 50%;
            left: 40%;
            padding-bottom: 5%;
        }
        .heading{
    
            text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC, 2px 2px 2px rgba(206,89,55,0);
    
                }
</style>
</head>
<body class="background hold-transition login-page">
    @yield('content')

    <!-- js -->
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
