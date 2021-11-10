@extends('layouts.main')
@section('title', $agenda -> nome)
@section('agenda_active', 'active')

@section('content')

<div class="all-title-box" style="display: flex; background-image: url(/img/noticias.jpg);">
    <div class="color-overlay"></div>
	<div class="container text-center">
		<h1 style="color: white; font-family: Eczar;">{{$agenda->nome}}</h1>
        <h3 style="color: white">{{$agenda->data}}</h3>
	</div>
</div>



<div id="overviews" class="section lb" style="background-color: white">
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
                        <h3>{{__('message.Orador')}}: {{$agenda->orador}}</h3>
                        <hr>
                        <h3>{{__('message.Data')}}: {{$agenda->data}}</h3>
                        <hr>
                        <h3>{{__('message.Local')}}: {{$agenda->local}} ({{$agenda->coordenadas}})</h3>
                        <hr>
                        <h3>{{__('message.Cidade')}}: {{$agenda->cidade}}</h3>
                        <hr>
                        @if(strtotime($agenda->data) > strtotime('now'))
                            <a href="/reservar_agenda/{{$agenda->id}}" class="btn btn-light btn-radius btn-brd grd1"><span><strong>{{__('message.Reservar')}}</strong></span></a>
                        @endif
                    </div><!-- end messagebox -->
                    <!-- AddToAny BEGIN -->
                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                            <div class="widget clearfix">
                                <div class="footer-right">
                                    <ul class="footer-links-soi">
                                        <li><a class="a2a_button_facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a class="a2a_button_linkedin"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a class="a2a_button_twitter"><i class="fa fa-twitter"></i></a></li>
                                        
                                    </ul>
                                </div>
                            </div> 
                        </div>
                            <script>
                            var a2a_config = a2a_config || {};
                            a2a_config.locale = "pt-PT";
                            </script>
                            <script async src="https://static.addtoany.com/menu/page.js"></script>
                            <!-- AddToAny END -->
				</div><!-- end col -->
                <div class="message-box">
                    
                    <p style="padding: 15px">
                    <h2 style="font-family: Eczar;">{{__('message.Descricao')}}</h2>
                    {{$agenda->$agendaDescricao}}</p>
                        
                </div><!-- end messagebox -->
			</div>
            
            <div class="container"><!-- start slidshow -->
                <div class="post-media wow fadeIn">
                    @foreach($galeria as $galeria)
                    <div class="mySlides text-center">
                        <img src="/img/galeria_agenda/{{$galeria->media}}" style="width:70%">
                        <!--<div class="caption-container">-->
                    </div>
                        
                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>

                    @endforeach
                </div>
            </div><!-- end slidshow -->


                <br><br>
            <div class="message-box text-center">
                <a href="/agenda" class="btn btn-light btn-radius btn-brd grd1"><span><strong>{{__('message.VoltarAtras')}}</strong></span></a>
            </div>  
        </div>    
    </div>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("demo");
            var captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            captionText.innerHTML = dots[slideIndex-1].alt;
        }
    </script>

    
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