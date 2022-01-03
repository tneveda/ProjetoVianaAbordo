@extends('layouts.admin_main')
@section('title', 'Admin - Editar Mentorias . $mentorias->mentorias')

@section('content')
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
<h1 style="font-family: Eczar">Editar Mentoria: {{$mentorias->mentorias}}</h1>
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach 
    <div class="col-md-6 offset-md-3">
        <form action="/admin/atualizar_mentorias/{{$mentorias->id}}" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
        <div class="form-group">
                <label for="nome">Titulo: *</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo " value = "{{$mentorias->titulo}}">
            </div>
            <div class="form-group">
                <label for="username">Titulo (Eng): *</label>
                <input type="text" class="form-control" id="titulo_en" name="titulo_en" placeholder="Titulo (eng)" value = "{{$mentorias->titulo_en}}">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição: *</label>
                <textarea name="descricao" id="descricao" class="form-control" placeholder="Descricao">{{$mentorias->descricao}}</textarea>
            </div>
            <div class="form-group">
                <label for="descricao_en">Descrição (EN): *</label>
                <textarea name="descricao_en" id="descricao_en" class="form-control" placeholder="Descrição (EN)" >{{$mentorias->descricao_en}}</textarea>
            </div>
  
             
            <input type="submit" class="btn btn-primary" value="Editar Mentoria">
          
            
</div>
<br>
@endsection

