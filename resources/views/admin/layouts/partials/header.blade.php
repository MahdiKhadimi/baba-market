<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title> {{ config('app.name') }} | @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Ecommerce, online shoping, electronic bussiness" name="description" />
    <meta content="Mahdi khadimi" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset(' assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    @stack('header')

</head>
