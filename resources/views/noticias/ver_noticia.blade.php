@extends('layouts.main')
@section('title', $noticia -> titulo)
@section('noticias_active', 'active')

@section('content')

<div class="all-title-box" style="display: flex; background-image: url(/img/noticias/{{$noticia->media}});">
	<div class="color-overlay"></div>
    <div class="container text-center">
		<h1 style="color: white; font-family: Eczar;">{{$noticia-> $noticiasTitulo}}<span class="m_1">{{$noticia->created_at}}</span></h1>
	</div>
    
</div>

<div id="overviews" class="section lb" style="background-color: white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="message-box">
                        <p>{{$noticia-> $noticiasCorpo}}</p>
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="post-media wow fadeIn">
                        <img src="/img/noticias/{{$noticia->media}}" alt="" class="img-fluid img-rounded">
                    </div><!-- end media -->
                </div><!-- end col -->
			</div>
            <div class="container"><!-- start slidshow -->
                <div class="post-media wow fadeIn">
                    @foreach($galeria as $galeria)
                    <div class="mySlides text-center">
                        <img src="/img/galeria_noticias/{{$galeria->media}}"  style="width:720px; height:480px; object-fit:cover;" class="img-fluid img-rounded">
                        <!--<div class="caption-container">-->
                    </div>
                        
                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>

                    
                    <!--
                    <div class="row">
                        <div class="column">
                        <img class="demo cursor" src="/img/galeria_noticias/{{$galeria->media}}" style="width:100%" onclick="currentSlide(1)">
                        </div>
                    </div>
                    -->
                    @endforeach
                </div>
            </div><!-- end slidshow -->
            
            
            <br><br>
            <div class="message-box text-center">
                <a href="/noticias" class="btn btn-light btn-radius btn-brd grd1"><span><strong>{{__("message.VoltarAtras")}}</strong></span></a>
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