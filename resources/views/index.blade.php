<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- favicons  -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('images/favicon/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('images/favicon/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('images/favicon/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/favicon/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/favicon/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/favicon/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/favicon/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/favicon/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('images/favicon/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('images/favicon/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('images/favicon/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon/favicon-16x16.png')}}"> 

    <!-- meta tags  -->
    <meta name="theme-color" content="">
    <meta name="robots" content="index,follow">
    <meta name="keywords" content="">
    <meta name="author" content="Everton Vargas Guetierres">
    
    <meta name="description" content="">
    <meta itemprop="name" content="">
    <meta itemprop="description" content="">
    <meta itemprop="image" content="">

    <meta property="og:locale" content="pt_BR">
    <meta property="og:title" content=""/>
    <meta property="og:type" content="product"/>
    <meta property="og:description" content="" />
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="fb:admins" content=""/>
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="470">
    <meta property="og:image:height" content="246">

    <meta name="twitter:url" content="">
    <meta name=”twitter:title” content="">
    <meta name="twitter:description" content=""  >
    <meta name="twitter:image" content="">
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content=""/>

    <title>Achei Imóveis - inicio</title>


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">
        <wpp-component wpp="whats.com"></wpp-component>
        <menu-component 
            index="{{route('index')}}"
            imobiliaria="{{route('imobiliaria')}}" 
            imobiliaria="{{route('imobiliaria')}}" 
            imoveis="{{route('imoveis')}}" 
            anuncie="{{route('anuncie')}}" 
            contato="{{route('contato')}}">
        </menu-component>
        <header-component></header-component>
        <search-component minimo="0" maximo="5000000" tiposimo="{{json_encode($ImoveisTipo)}}" dadosimo="{{json_encode($imoveis)}}"></search-component>
        <destaques-component destaquesimo="{{json_encode($imoveisdestaque)}}" mainroute="{{Voyager::image('/')}}" link="{{route('index')}}"></destaques-component>
        <whats-component></whats-component>
        <acheiimo-component></acheiimo-component>
        <anuncio-component></anuncio-component>
        <footer-component index="{{route('index')}}"></footer-component>
     </div>

<script src="{{asset('js/app.js')}}"></script>
</body>
</html>