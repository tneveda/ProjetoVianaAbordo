@extends('layouts.main')
@section('title', $agenda -> nome)
@section('agenda_active', 'active')

@section('content')

<div class="all-title-box" style="display: flex; background-image: url(/img/noticias.jpg);">
    <div class="color-overlay"></div>
	<div class="container text-center">
		<h1 style="color: white; font-family: Eczar;">{{__("message.ReservarLugar")}}: <br>{{$agenda->nome}}</h1>
	</div>
</div>



<div id="overviews" class="section lb" style="background-color: white">
    <br>
    <br>    
    <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<div class="post-media wow fadeIn text-center">
						<img src="/img/agenda/{{$agenda->cartaz}}" style="width:300px; object-fit:cover;"alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">                                 
					<div class="message-box text-left">
                        <h2 style="font-family: Eczar;">{{$agenda->nome}}</h2>
                        <hr>
                        <h3>{{__("message.Data")}}: {{$agenda->data}}</h3>
                        <hr>
                        <h3>{{__("message.Local")}}: {{$agenda->local}} ({{$agenda->coordenadas}})</h3>
                        <hr>
                        <h3>{{__("message.Cidade")}}: {{$agenda->cidade}}</h3>
                        <hr>
                        <h3>{{__("message.Lotacao")}}: {{$agenda->lotacao}}</h3>
                        <hr>
                         
				</div><!-- end col -->
                <form action="/reservar_agenda/{{$agenda->id}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="nome">{{__("message.Nome")}}:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="{{__('message.Nome')}}">
            </div>
            <div class="form-group">
                <label for="email">{{__('message.Email')}}:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="{{__('message.Email')}}">
            </div>
            <div class="form-group">
                <label for="profissao">{{__('message.Profissao')}}:</label>
                <input type="text" class="form-control" id="profissao" name="profissao" placeholder="{{__('message.Profissao')}}">
            </div>
            <button type="submit" id="submit" class="btn btn-light btn-radius btn-brd grd1" style="color:white; ">{{__('message.Reservar')}}</button>
        </form>
			</div>
            <br><br>
            </div>
            <div class="message-box text-center">
                <a href="/agenda/{{$agenda->id}}" class="btn btn-light btn-radius btn-brd grd1"><span><strong>{{__('message.VoltarAtras')}}</strong></span></a>
            </div>  
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