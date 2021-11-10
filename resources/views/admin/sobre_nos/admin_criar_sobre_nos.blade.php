@extends('layouts.admin_main')
@section('title', 'Admin - Criar Sobre Nós')

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
<h1 style="font-family: Eczar">Criar Sobre Nós</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/sobre_nos" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
            </div>
            <div class="form-group">
                <label for="titulo_en">Título (EN):</label>
                <input type="text" class="form-control" id="titulo_en" name="titulo_en" placeholder="Título (EN)">
            </div>
            <div class="form-group">
                <label for="corpo">Corpo:</label>
                <textarea name="corpo" id="corpo" class="form-control" placeholder="Corpo"></textarea>
            </div>
            <div class="form-group">
                <label for="corpo_en">Corpo (EN):</label>
                <textarea name="corpo_en" id="corpo_en" class="form-control" placeholder="Corpo (EN)"></textarea>
            </div>
            <div class="form-group">
                <label for="media">Media:</label>
                <input type="file" class="form-control-file" id="media" name="media" placeholder="Media">
            </div>
            <div class="form-group">
                <label for="ativo">Ativo:</label>
                <select name="ativo" id="ativo" class="from-group">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar Sobre Nós">
</div>
@endsection

<script type="text/javascript">
  function validateForm() {
    var titulo = document.forms["Form"]["titulo"].value;
    var titulo_en = document.forms["Form"]["titulo_en"].value;
    var corpo = document.forms["Form"]["corpo"].value;
    var corpo_en = document.forms["Form"]["corpo_en"].value;
    var media = document.forms["Form"]["media"].value;
    if (titulo == null || titulo == "", 
        titulo_en == null || titulo_en == "",
        corpo == null || corpo == "",
        corpo_en == null || corpo_en == "",
        media == null || media == "") {
      alert("Por favor, preencha todos os campos");
      return false;
    }
  }
</script>