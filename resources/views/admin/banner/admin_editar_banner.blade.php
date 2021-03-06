@extends('layouts.admin_main')
@section('title', 'Admin - Editar Banner . $banner->nome')

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
<h1 style="font-family: Eczar">Editar Banner: {{$banner->nome}}</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/atualizar_banner/{{$banner->id}}" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="nome">Nome: *</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{$banner->nome}}">
            </div>
            <div class="form-group">
                <label for="nome_en">Nome (EN): *</label>
                <input type="text" class="form-control" id="nome_en" name="nome_en" placeholder="Nome (EN)" value="{{$banner->nome_en}}">
            </div>
            <div class="form-group">
                <label for="corpo">Corpo: *</label>
                <textarea name="corpo" id="corpo" class="form-control"> {{$banner->corpo}}</textarea>
            </div>
            <div class="form-group">
                <label for="corpo_en">Corpo (EN): *</label>
                <textarea name="corpo_en" id="corpo_en" class="form-control"> {{$banner->corpo_en}}</textarea>
            </div>
            <div class="form-group">
                <label for="media">Media:</label>
                <input type="file" class="form-control-file" id="media" name="media" placeholder="Media">
                <img src="/img/banner/{{$banner->media}}" alt="{{$banner->nome}}" style="width: 100px; margin-top:10px;">
            </div>
            <div class="form-group">
                <label for="ativo">Ativo:</label>
                <select name="ativo" id="ativo" class="from-group">
                    <option value="1">Sim</option>
                    <option value="0" {{$banner->ativo == 0 ? "selected='selected" : ""}}>N??o</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Editar Banner">
</div>
@endsection

<script type="text/javascript">
  function validateForm() {
    var a = document.forms["Form"]["nome"].value;
    var b = document.forms["Form"]["corpo"].value;
    if (a == null || a == "", b == null || b == "") {
      alert("Por favor, preencha todos os campos obrigat??rios (*)");
      return false;
    }
  }
</script>