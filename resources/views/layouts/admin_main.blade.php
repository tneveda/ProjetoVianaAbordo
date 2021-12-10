<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <link href="/css/styles_admin.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="/admin" style="font-family: Eczar;">Viana Abordo</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <form action="/logout" method="POST">
                                @csrf
                                <a href="/logout" 
                                    class="dropdown-item" 
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                    Logout
                                </a>
                        </form>
                        
                    </div>
                </li>
            </ul>
        </nav>
        
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading" style="color:#E62B36; font-family: Eczar;">Home</div>
                            <a class="nav-link" href="/admin/banner">
                                Banner
                            </a>
                            <a class="nav-link" href="/admin/sobre_nos">
                                Sobre Nós
                            </a>
                            <a class="nav-link" href="/admin/numeros_factos">
                                Números e Factos
                            </a>
                            <a class="nav-link" href="/admin/testemunhos">
                                Testemunhos
                            </a>
                            <div class="sb-sidenav-menu-heading" style="color:#E62B36; font-family: Eczar;">Footer</div>
                            <a class="nav-link" href="/admin/contactos">
                                Contactos
                            </a>
                            <a class="nav-link" href="/admin/redes_sociais">
                                Redes Sociais
                            </a>
                            <div class="sb-sidenav-menu-heading" style="color:#E62B36; font-family: Eczar;">Agenda</div>
                            <a class="nav-link" href="/admin/agenda">
                                Agenda
                            </a>
                            <a class="nav-link" href="/admin/reserva">
                                Reserva
                            </a>
                            <a class="nav-link" href="/admin/galeria_agenda">
                                Galeria
                            </a>
                            <div class="sb-sidenav-menu-heading" style="color:#E62B36; font-family: Eczar;">Comunidade</div>
                            <a class="nav-link" href="/admin/pessoa">
                                Pessoa
                            </a>
                            <div class="sb-sidenav-menu-heading" style="color:#E62B36; font-family: Eczar;">Mentoria</div>
                            <a class="nav-link" href="/admin/mentores">
                                Mentores
                            </a>
                            <a class="nav-link" href="/admin/mentorandos">
                                Mentorandos
                            </a>
                            <a class="nav-link" href="/admin/areaInteresse">
                                Área de Interesse
                            </a>
                            <a class="nav-link" href="/admin/mentorias">
                                Mentorias
                            </a>
                            <div class="sb-sidenav-menu-heading" style="color:#E62B36; font-family: Eczar;">Notícias</div>
                            <a class="nav-link" href="/admin/noticias">
                                Notícias
                            </a>
                            <a class="nav-link" href="/admin/galeria_noticias">
                                Galeria
                            </a>
                            <div class="sb-sidenav-menu-heading" style="color:#E62B36; font-family: Eczar;">Contactos</div>
                            <a class="nav-link" href="/admin/pedido_contacto">
                                Pedido de Contacto
                            </a>
                            <br>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    @yield('content')   
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        
    </body>
</html>
