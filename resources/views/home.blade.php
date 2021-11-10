@extends('layouts.main')
@section('title', 'Início')
@section('inicio_active', 'active')


@section('content')

<div style="width: 100%; height:90%;">

	<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
			@for($i=0; $i < count($banner); $i++) <li data-target="#carouselExampleControls" data-slide-to="$i">
				</li>
				@endfor

		</ol>

		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<div id="home" class="showcase">
					<video src="/img/file.mp4" muted loop autoplay></video>
					<div class="overlay"></div>
					<div id="" class="first-section">
						<div class="dtab">
							<div class="container">
								<div class="row">
									<div class="col-md-12 col-sm-12 text-center">
										<div class="big-tagline text">
											<h2 data-animation="animated zoomInRight"><strong>Viana</strong> Abordo</h2>
											<p class="lead" data-animation="animated fadeInLeft">{{__('message.VideoBannerText')}}</p>
										</div>
									</div>
								</div><!-- end row -->
							</div><!-- end container -->
						</div>
					</div>
				</div><!-- end section -->
			</div>
			@foreach($banner as $banner)
			<div class="carousel-item">
				<div id="home" class="first-section" style="background-image:url('/img/banner/{{$banner->media}}'); display: cover; width: 100%; ">
					<div class="overlay"></div>
					<div class="dtab">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12 text-left">
									<div class="big-tagline">
										<h2 data-animation="animated zoomInRight" style="font-family: Eczar;"><strong>{{$banner->$bannerNome}}</strong></h2>
										<p style="font-family: Noyh_Regular;" class="lead" data-animation="animated fadeInLeft">{{$banner->$bannerCorpo}}</p>
									</div>
								</div>
							</div><!-- end row -->
						</div><!-- end container -->
					</div>
				</div><!-- end section -->
			</div>
			@endforeach
			<!-- Left Control -->
			<a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="fa fa-angle-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>

			<!-- Right Control -->
			<a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="fa fa-angle-right" aria-hidden="true"><i class="fi-rr-angle-right"></i></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

</div>
<br>
<br>
<br>

<div id="overviews" class="section lb" style="background-color: white">
	@php
		$i= 0;
	@endphp
	@foreach($sobre_nos as $sobre_nos)
	@if($i == 0 )
	<div class="container">
		<div class="row align-items-center">
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<div class="message-box">
					<h2 style="font-family: Eczar;">{{$sobre_nos-> $titulo}}</h2>
					<p>{{$sobre_nos-> $corpo}}</p>

				</div><!-- end messagebox -->
			</div><!-- end col -->

			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
				<div class="post-media wow fadeIn">
					<img src="/img/sobre_nos/{{$sobre_nos-> media}}" alt="" class="img-fluid img-rounded">
				</div><!-- end media -->
			</div><!-- end col -->
		</div>
		<br><br>
	</div>
	@php
		$i= 1;
	@endphp
	
	@else
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<div class="post-media wow fadeIn">
						<img src="/img/sobre_nos/{{$sobre_nos-> media}}" alt="" class="img-fluid img-rounded">
					</div><!-- end media -->
				</div><!-- end col -->

				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<div class="message-box">
						<h2 style="font-family: Eczar;">{{$sobre_nos-> $titulo}}</h2>
						<p>{{$sobre_nos-> $corpo}}</p>

					</div><!-- end messagebox -->
				</div><!-- end col -->
			</div>
			<br>
			<br>
		</div>
		@php
		$i= 0;
	@endphp
	
	@endif
	@endforeach



</div>
<br>


<div class="section cl ">
	<div class="container">
		<div class="section-title text-center message-box">
			<br>
			<h2 style="font-family: Eczar;" class="text-white">{{__('message.NumerosFactos')}}</h2>
		</div><!-- end title -->
		<div class="row text-left stat-wrap">
			@foreach($numeros_factos as $numeros_factos)
			<div class="col-md-3 col-sm-6 col-xs-12 text-center">
				<img src="/img/numeros_factos/{{$numeros_factos->icone}}" style="width: 100px;" class="post-media wow fadeIn">
				<p class="text-white">{{$numeros_factos->numero}}</p>
				<!-- Numeros nao aparecem a contar pois a variavel na BD é varchar e não um inteiro -->
				<h3><strong class="text-white">{{$numeros_factos->$nome}}</strong></h3>
				<br>
			</div><!-- end col -->

			@endforeach

		</div><!-- end row -->
		<br>
	</div><!-- end container -->
</div><!-- end section -->


<br><br>
<section id="testimonials" style="background-color: white;">
	<div class="parallax section db parallax-off">
		<div class="container">
			<div class="section-title text-center">
				<h3 style="font-family: Eczar; color: #E62B36;">{{__('message.DizComunidade')}}</h3>
			</div><!-- end title -->

			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="testi-carousel owl-carousel owl-theme post-media wow fadeIn">
						@foreach($testemunhos as $testemunhos)
						<div class="testimonial clearfix">
							<div class="desc">
								<h3 style="color: #E62B36;"><i class="fa fa-quote-left"></i>{{$testemunhos->nome}}</h3>
								<h5 style="color: rgba(100, 100, 100);">{{$testemunhos->$profissao}}</h5>
								<p class="lead" style="color: black;"><strong>{{$testemunhos->$testemunho}}</strong></p>

							</div>
							<!-- end testi-meta -->
						</div>
						<!-- end testimonial -->
						@endforeach
					</div><!-- end carousel -->
				</div><!-- end col -->
			</div><!-- end row -->
		</div><!-- end container -->
	</div><!-- end section -->
	<br><br>

</section>


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

