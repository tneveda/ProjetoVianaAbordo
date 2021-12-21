@extends('layouts.main')
@section('title', 'Registo')
@section('registo_active', 'active')



@section('content')
<div class="all-title-box" style="display: flex; background-image: url(/img/comunidade.jpg);">
	<div class="color-overlay"></div>
	<div class="container text-center">
		<h1 style="color: white; font-family: Eczar;">{{__('message.Registo')}}</h1>
		<div>

		</div>
	</div>
</div>

<div id="hosting" class="section wb" style="background: rgb(248, 248, 248)">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Eczar:wght@800&display=swap');

    .text h1 {
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
<h1 style="font-family: Eczar">Registar</h1>
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach 

    <div class="col-md-6 offset-md-3">
        <form action="/mentoria" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
            <div class="form-group">
                <label for="nome"></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="username"></label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="email"></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="ocupacao_profissional"></label>
                <input type="text" class="form-control" id="ocupacao_profissional" name="ocupacao_profissional" placeholder="Ocupacao Profissional">
            </div>
            <div class="form-group">
                <label for="fotografia">Fotografia</label>
                <input type="file" class="form-control-file" id="fotografia" name="fotografia" placeholder="Fotografia">
            </div>
            <div>
            <textarea class="form-control" name="motivo" id="motivo" rows="10" placeholder="Motivo"></textarea>
           </div>
            <p style="font-family: Eczar">Área de Interesse</p>
           
            <div class="form-group">
            @foreach($interesses as $interesse)
        <input type="radio" name="area_interesse[]" class="area_interesse" value="{{$interesse->id}}"> {{$interesse->area_interesse}} <br/>
        @endforeach
           </div>
  
             
            <input type="submit" class="btn btn-primary" value="Registar">
         
</div>
</div>
<br>
@endsection



