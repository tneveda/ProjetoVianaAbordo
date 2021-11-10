@extends('layouts.main')
@section('title', 'Comunidade')
@section('comunidade_active', 'active')



@section('content')
<div class="all-title-box" style="display: flex; background-image: url(/img/comunidade.jpg);">
	<div class="color-overlay"></div>
	<div class="container text-center">
		<h1 style="color: white; font-family: Eczar;">{{__('message.Comunidade')}}</h1>
		<div>

		</div>
	</div>
</div>

<div id="hosting" class="section wb" style="background: rgb(248, 248, 248)">
	<br>
	<br>
	<div class="container">
		<div class="section-title text-center">
			<p class="lead">{{__('message.ComunidadeSubTitulo')}}</p>
		</div><!-- end title -->

		<div class="text-center">
			@if($pesquisa)
			<form action="/comunidade" method="GET" class="d-none d-md-inline-block form-inline" style="width: 50%;">
				<div class="input-group">
					<input type="text" id="pesquisa" name="pesquisa" class="form-control" placeholder="Procurar..." value="{{$pesquisa}}">
					<div class="input-group-append">
						<button class="btn btn-light btn-radius btn-brd grd1" type="submit"><i class="fa fa-search"></i></button>
					</div>

				</div>
			</form>
			<button class="btn btn-light btn-radius btn-brd grd1" style="margin-top:-5px; margin-left:10px"><a href="/comunidade" class="text-white">Voltar</a></button>

			@else
			<form action="/comunidade" method="GET" class="d-none d-md-inline-block form-inline" style="width: 50%;">
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


		<div class="row dev-list text-center">
			@foreach($pessoa as $pessoa)
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">

				<div class="wow fadeIn" style="background-color: rgba(0, 0, 0, 0.10); border-radius: 15px;" data-wow-duration="1s" data-wow-delay="0.3s">
					<br>
					<img src="/img/pessoa/{{$pessoa->fotografia}}" style="width:200px; height:200px; object-fit:cover; border-radius:50%;" alt="" class="img-fluid">
					<div class="message-box">
						<br>
						<div class="widget-title">
							<h3 style="color: #E62B36; font-family: Eczar;"><strong>{{$pessoa->nome}}</strong></h3>
							<h6>{{ Str::limit($pessoa-> $pessoaProfissao, 45) }}</h6>
						</div>
						<!-- end title -->
						<p class="text-center" style="padding:15px">{{ Str::limit($pessoa-> $pessoaDescricao,75) }}</p>
					</div>
					<hr>
					<a href="/pessoa/{{$pessoa->id}}" class="btn btn-light btn-radius btn-brd grd1"><span>{{__('message.VerMais')}}</span></a>
					<br>
					<br>
				</div>
				<!--widget -->
				<br>
			</div><!-- end col -->
			@endforeach

		</div><!-- end row -->

	</div><!-- end container -->

</div><!-- end section -->

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