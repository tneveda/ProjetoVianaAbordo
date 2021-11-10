@extends('layouts.admin_main')
@section('title', 'Admin')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Eczar:wght@800&display=swap');

    .text h3 {
        font-family: Eczar;
        font-size: 68px;
        font-weight: 300;
        margin: 0;
        line-height: inherit;
        color: #ffffff;
        text-transform: capitalize;
        display: block;
        padding: 30px;
        position: relative;
        text-align: left;
    }
</style>
<div class="row">
                @if(session("msg"))
                    <p class="msg" style="background-color: #d4edda;
                                            color: #155724;
                                            border: 1px solid #c3e6cb;
                                            width: 100%;
                                            margin-bottom: 0;
                                            text-align: center;
                                            padding: 10px;
                                            margin:10px;">
                                            {{session('msg')}}
                    </p>
                @endif
</div>

<h1 style="font-family: Eczar">Dashboard</h1>
<br>
<h3 style="color:#E62B36; font-family: Eczar;">Home</h3>
<button class="btn btn-secondary"><a href="/admin/banner" class="text-white">Banner</a></button>
<button class="btn btn-secondary"><a href="/admin/sobre_nos" class="text-white">Sobre Nós</a></button>
<button class="btn btn-secondary"><a href="/admin/numeros_factos" class="text-white">Números e Factos</a></button>
<button class="btn btn-secondary"><a href="/admin/testemunhos" class="text-white">Testemunhos</a></button>
<br>
<br>
<h3 style="color:#E62B36; font-family: Eczar;">Footer</h3>
<button class="btn btn-secondary"><a href="/admin/contactos" class="text-white">Contactos</a></button>
<button class="btn btn-secondary"><a href="/admin/redes_sociais" class="text-white">Redes Sociais</a></button>
<br>
<br>
<h3 style="color:#E62B36; font-family: Eczar;">Agenda</h3>
<button class="btn btn-secondary"><a href="/admin/agenda" class="text-white">Agenda</a></button>
<button class="btn btn-secondary"><a href="/admin/galeria_agenda" class="text-white">Galeria Agenda</a></button>
<br>
<br>
<h3 style="color:#E62B36; font-family: Eczar;">Comunidade</h3>
<button class="btn btn-secondary"><a href="/admin/comunidade" class="text-white">Comunidade</a></button>
<br>
<br>
<h3 style="color:#E62B36; font-family: Eczar;">Notícias</h3>
<button class="btn btn-secondary"><a href="/admin/noticias" class="text-white">Notícias</a></button>
<button class="btn btn-secondary"><a href="/admin/galeria_noticias" class="text-white">Galeria Notícias</a></button>


@endsection