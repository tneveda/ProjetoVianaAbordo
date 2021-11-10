@extends('layouts.main')
@section('title', 'Notícias')
@section('noticias_active', 'active')

@section('content')

<div class="all-title-box" style="display: flex; background-image: url(/img/noticias.jpg);">
    <div class="color-overlay"></div>
    <div class="container text-center">
        <h1 style="color: white; font-family: Eczar;">{{__('message.Noticias')}}</h1>
        <div>

        </div>
    </div>
</div>

<div id="hosting" class="section wb">
    <div class="container"> 
    <div class="text-center">
        @if($pesquisa)
        <form action="/noticias" method="GET" class="d-none d-md-inline-block form-inline" style="width: 50%;">
            <div class="input-group">
                <input type="text" id="pesquisa" name="pesquisa" class="form-control" placeholder="Procurar..." value="{{$pesquisa}}">
                <div class="input-group-append">
                    <button class="btn btn-light btn-radius btn-brd grd1" type="submit"><i class="fa fa-search"></i></button>
                </div>

            </div>
        </form>
        <button class="btn btn-light btn-radius btn-brd grd1" style="margin-top:-5px; margin-left:10px"><a href="/noticias" class="text-white">Voltar</a></button>

        @else
        <form action="/noticias" method="GET" class="d-none d-md-inline-block form-inline" style="width: 50%;">
            <div class="input-group">
                <input type="text" id="pesquisa" name="pesquisa" class="form-control" placeholder="Procurar..." value="{{$pesquisa}}">
                <div class="input-group-append">
                    <button class="btn btn-light btn-radius btn-brd grd1" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        @endif
    </div>
    <br>

    @foreach($noticias as $noticia)

    <div id="overviews" class="section lb" style="background-color: white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <h4>{{$noticia->created_at}}</h4>
                        <h2 style="font-family: Eczar;">{{$noticia-> $noticiasTitulo}}</h2>
                        <p>{{ Str::limit($noticia-> $noticiasCorpo, 200) }}</p>

                        <a href="/noticias/{{$noticia->id}}" class="btn btn-light btn-radius btn-brd grd1"><span>{{__("message.VerMais")}}</span></a>
                    </div><!-- end messagebox -->
                </div><!-- end col -->

                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="/img/noticias/{{$noticia->media}}" alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
            </div>
            <br><br>
            <hr style="width:90%;height:1px;background-color:gray">
        </div>
    </div>

    @endforeach
    </div>
</div>

@foreach($contactos as $contactos)
@section('email', $contactos->email)
@section('morada', $contactos->morada)
@section('telemovel', $contactos->telemovel)
@endforeach
@endsection

@section('redes_sociais')
@foreach($redes_sociais as $redes_sociais)
<li><a href="{{$redes_sociais->ligacao}}"><i class="{{$redes_sociais->icone}}"></i></a></li>
@endforeach
@endsection