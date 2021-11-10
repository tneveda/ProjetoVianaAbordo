@extends('layouts.main')
@section('title', 'Contactos')
@section('contactos_active', 'active')



@section('content')
<div class="all-title-box" style="display: flex; background-image: url(/img/contact.jpg);">
    <div class="color-overlay"></div>
	<div class="container text-center">
		<h1 style="color: white; font-family: Eczar;">{{__('message.Contactos')}}</h1>
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
<div id="support" class="section wb">
	<br>
	<br>
        <div class="container-fulid">           
            <div class="row">
                <div class="col-xl-4 col-md-8 col-sm-8">
                    <h2 style="padding-left: 30px; font-family: Eczar;">{{__('message.ContactosForm')}}</h2>
                    <div class="contact_form">
                        <div id="message"></div>

                        <form action="/pedido_contacto" method="POST" enctype="multipart/form-data">
                        @csrf
                            <fieldset class="row row-fluid">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="text" name="nome" id="nome" class="form-control" placeholder="{{__('message.Nome')}}">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="{{__('message.Email')}}">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control" name="mensagem" id="mensagem" rows="10" placeholder="{{__('message.ContactosMensagem')}}"></textarea>
                                </div>
                                <div class="text-center pd">
                                    <button type="submit" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">{{__('message.Enviar')}}</button>
                                </div>
                            </fieldset>
                        </form>

                    </div>
                </div><!-- end col -->
                <div class="col-xl-4 col-md-8 col-sm-8">			 
                    <div class="widget clearfix text-center">
                        <div class="widget-title">
                            <h2 style="font-family: Eczar;">{{__('message.Contactos')}}</h2>
                        </div>
                        <br>
                        @foreach($contactos as $contactos)
                        <ul class="footer-links" style="padding-top: 5px;">
                            <li><a style="color: #333333;" href="mailto:#">{{$contactos->email}}</a></li>
                            <!--<li><a href="#">www.yoursite.com</a></li>-->
                            <li>{{$contactos->morada}}</li>
                            <li>{{$contactos->telemovel}}</li>
                        </ul><!-- end links -->
                        
                    </div><!-- end clearfix -->                    
				</div>
				<div class="col-xl-4 col-md-8 col-sm-8" style="padding-right: 40px;">
			 
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2979.289430192856!2d-8.834230884322562!3d41.69268718497538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd25b6293f93af69%3A0xb7da45ad44161706!2sDINAMO10%20-%20Creative%20Business%20Habitat!5e0!3m2!1sen!2spt!4v1623679567776!5m2!1sen!2spt" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>                       
                    
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
		<br>
	<br><br>
	<br>
    </div><!-- end section -->
</div>

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
