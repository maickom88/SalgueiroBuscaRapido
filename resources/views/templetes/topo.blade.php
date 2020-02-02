<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
	 <link rel="stylesheet" href={{asset('css/slick.css')}}>
    <link rel="stylesheet" href={{asset('css/slick-theme.css')}}>
	 <link rel="stylesheet" href={{asset('css/jBox.all.css')}}>
	 <title >@yield('titulo')</title>
    @yield('links')

    <!--font-family: 'Open Sans', sans-serif;
font-family: 'Open Sans Condensed', sans-serif;-->
</head>

<body id="body-header">
<!--Start header-->
@yield('menu-top')
