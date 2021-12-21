<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">

        <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/img/apple-touch-icon.png">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="/css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/custom.css">

    <link rel=”stylesheet” href=”https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css”>

	    <!-- Modernizer for Portfolio -->
		<script src="/js/modernizer.js"></script>


    </head>
    <body>
        <!-- Start header -->
        <header class="top-navbar">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/home">
                        <img src="/img/logo-viana-abordo_red.png" alt="" style="width: 100px; "/>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbars-host">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item @yield('inicio_active')"><a class="nav-link" href="/home">{{__("message.Inicio")}}</a></li>
                            <li class="nav-item @yield('agenda_active')"><a class="nav-link" href="/agenda">{{__("message.Agenda")}}</a></li>
                            <li class="nav-item @yield('comunidade_active')"><a class="nav-link" href="/comunidade">{{__("message.Comunidade")}}</a></li>
                            <li class="nav-item @yield('mentoria_active')"><a class="nav-link" href="/mentoria">{{__("message.Mentoria")}}</a></li>
                            <li class="nav-item @yield('noticias_active')"><a class="nav-link" href="/noticias">{{__("message.Noticias")}}</a></li>
                            <li class="nav-item @yield('contactos_active')"><a class="nav-link" href="/contactos">{{__("message.Contactos")}}</a></li>
                            <li class="nav-item @yield('login_active')"><a class="nav-link" href="/login">{{__("message.Login")}}</a></li>
                            <li class="nav-item " style="padding:0px; margin: 0px;">
                                <ul style="padding:0px; margin: 0px 0px;">
                                @if(count(config('app.languages')) > 1)
                                    <li class="nav-item dropdown d-md-down-none">
                                        <a class="nav-link" style="color:#E62B36;"data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                            {{ strtoupper(app()->getLocale()) }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            @foreach(config('app.languages') as $langLocale => $langName)
                                                <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                                            @endforeach
                                        </div>
                                    </li>
                                @endif
                                </ul>
                                
                            </li> 
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        @yield('content')
    
        <footer class="footer" style=" background-image: url(/img/world-map.png);">
        <div class="container">
            <div class="row">               
				<div class="col-lg-4 col-md-4 col-xs-12" style="text-align:center;">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3 style="font-family: Eczar;">Menu</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="/home">{{__("message.Inicio")}}</a></li>
                            <li><a href="/agenda">{{__("message.Agenda")}}</a></li>
                            <li><a href="/comunidade">{{__("message.Comunidade")}}</a></li>
							<li><a href="/noticias">{{__("message.Noticias")}}</a></li>
							<li><a href="/contactos">{{__("message.Contactos")}}</a></li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-xs-12" style="text-align:center;">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3 style="font-family: Eczar;" >{{__("message.Contactos")}}</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:#">@yield('email')</a></li>
                            <!--<li><a href="#">www.yoursite.com</a></li>-->
                            <li>@yield('morada')
                            </li>
                            <li>@yield('telemovel')</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-xs-12" style="text-align:center;">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3 style="font-family: Eczar;" >{{__("message.RedesSociais")}}</h3>
                        </div>
                        <div class="footer-right">
                            <ul class="footer-links-soi">
                                @yield('redes_sociais')
                            </ul><!-- end links -->
                        </div>
                    </div><!-- end clearfix -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center" style="text-align: center">                   
                    <p class="footer-company-name">{{__('message.DireitosReservados')}} &copy; 2021 | <a href="#">{{__('message.Condicoes')}}</a> | Design By : João Rodrigues - Tiago Marinho - Tiago Nêveda</p>
                </div>

            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->

        	    <!-- ALL JS FILES -->
		<script src="/js/all.js"></script>
		<!-- ALL PLUGINS -->
		<script src="/js/custom.js"></script>
		<script src="/js/timeline.min.js"></script>
		<script>
			timeline(document.querySelectorAll('.timeline'), {
				forceVerticalMode: 700,
				mode: 'horizontal',
				verticalStartPosition: 'left',
				visibleItems: 4
			});
		</script>
    </body>
</html>
