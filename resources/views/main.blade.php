<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>My Library</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'>
    <meta name="viewport" content="width=device-width">

    <!-- Bootstrap core CSS     -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"rel="stylesheet">
    <!--  Paper Dashboard core CSS    -->
    <link href="https://cdn.jsdelivr.net/npm/paper-dashboard@1.1.0/assets/css/paper-dashboard.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/library.css') }}" rel="stylesheet" type="text/css">
    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,300" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css" rel="stylesheet" type="text/css">

</head>
<body class="main-body">
<div class="wrapper">
    @yield('sidebar')
    <div class="main-panel">
        @yield('contents')
        @yield('footer')
    </div>
</div>
<!--   Core JS Files   -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>