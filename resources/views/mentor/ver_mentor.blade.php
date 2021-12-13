@extends('layouts.main')
@section('title', $mentor -> name)
@section('comunidade_active', 'active')

@section('content')

<div class="all-title-box" style="display: flex; background-image: url(/img/noticias.jpg);">
    <div class="color-overlay"></div>
	<div class="container text-center">
		<h1 style="color: white; font-family: Eczar;">{{$mentor-> name}}</h1>
        <h3 style="color: white">{{$mentor-> ocupacao_profissional}}</h3>
	</div>
</div>



<div id="overviews" class="section lb" style="background-color: white">
    <br>
    <br>    
    <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<div class="post-media wow fadeIn text-center">
						<img src="/img/mentor/{{$mentor->fotografia}}" style="width:300px; height:300px; object-fit:cover; border-radius:50%;"alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">                                 
					<div class="message-box text-left">
                        <h2 style="font-family: Eczar;">{{$mentor->name}}</h2>
                        <hr>
                        <h3>{{__('message.Profissao')}}: {{$mentor-> ocupacao_profissional}}</h3>
                        <hr>
                        <h3>{{__('message.Email')}}: <a href="mailto:#" style="padding: 0px; margin:0px">{{$mentor->email}}</a></h3>
                        <hr>
                         
                    </div><!-- end messagebox -->
                        
                        <div class="widget clearfix">
							<div class="footer-right">
								<ul class="footer-links-soi">
									@if(!empty($mentor->linkedin))
                                    <li><a target="_blank" href="{{$pessoa->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                                    @endif
									
								</ul>
							</div>
						</div> 

				</div><!-- end col -->
                <div class="message-box">
                    
                    <p style="padding: 15px">
                    <h2 style="font-family: Eczar;">{{__('message.Biografia')}}</h2>
                    {{$mentor->ocupacao_profissional}}</p>
                        
                </div><!-- end messagebox -->
                
			</div>
            <br><br>
            <div class="message-box text-center">
                <a href="/comunidade" class="btn btn-light btn-radius btn-brd grd1"><span><strong>{{__('message.VoltarAtras')}}</strong></span></a>
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