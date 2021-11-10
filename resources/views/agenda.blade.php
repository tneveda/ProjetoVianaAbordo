@extends('layouts.main')
@section('title', 'Agenda')
@section('agenda_active', 'active')

@section('content')

<div class="all-title-box" style="display: flex; background-image: url(/img/agenda.jpg);">
    <div class="color-overlay"></div>
	<div class="container text-center">
		<h1 style="color: white; font-family: Eczar;">{{__('message.Agenda')}}</h1>
	</div>
</div>

<!-- Evento em destaque -->
<div id="overviews" class="section lb" style="background-color: white">
		<br><br><br> 
		<div class="container">
		@foreach($agenda_destaque as $agenda_destaque)
            <div class="row align-items-center wow fadeIn" style="background-color: rgba(0, 0, 0, 0.10); border-radius: 15px;" data-wow-duration="1s" data-wow-delay="0.3s">
                
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<div class="post-media wow fadeIn text-center">
						<img src="/img/agenda/{{$agenda_destaque->cartaz}}" alt="" class="img-fluid img-rounded" style="padding: 50px; width: 500px">
                    </div><!-- end media -->
                </div><!-- end col -->				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">                                 
					<div class="message-box">
						<h2 style="color: #E62B36; font-family: Eczar;"><strong>{{$agenda_destaque->nome}}</strong></h2>
						<h5>{{__('message.Orador')}}: {{$agenda_destaque->orador}}</h5>
						<h5>{{__('message.Data')}}: {{$agenda_destaque->data}}</h5>
						<h5>{{__('message.Local')}}: D{{$agenda_destaque->local}}</h5>
                        <p> {{ Str::limit($agenda_destaque-> $agendaDescricao, 100) }}
						</p>

						<a href="/agenda/{{$agenda_destaque->id}}" class="btn btn-light btn-radius btn-brd grd1"><span>{{__('message.VerMais')}}</span></a>

                    </div><!-- end messagebox -->
				</div><!-- end col -->
			</div>
			<br>
			@endforeach
        </div>    
    </div>

	<div id="hosting" class="section wb">
		<div class="container">
            <div class="row dev-list text-center">
               @foreach($agenda as $agenda)
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="wow fadeIn" style="background-color: rgba(0, 0, 0, 0.10); border-radius: 15px;" data-wow-duration="1s" data-wow-delay="0.3s">
						<br>
                        <img src="/img/agenda/{{$agenda->cartaz}}" style="width: 200px;" alt="" class="img-fluid">
						<div class="message-box">
							<br>
							<div class="widget-title">
								<h3 style="color: #E62B36; font-family: Eczar;"><strong>{{$agenda->nome}}</strong></h3>
								<h5>{{__('message.Orador')}}: {{$agenda->orador}}</h5>
								<h5>{{__('message.Data')}}: {{$agenda->data}}</h5>
								<h5>{{__('message.Local')}}: {{$agenda->local}}</h5>
							</div>
							<!-- end title -->
							<p class="text-center" style="padding:15px">{{ Str::limit($agenda-> $agendaDescricao, 100) }}
							</p>
						</div>
						<hr>

                        <a href="/agenda/{{$agenda->id}}" class="hover-btn-vermais"><span>{{__('message.VerMais')}}</span></a>
						<br>
						<br>
                    </div><!--widget -->
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