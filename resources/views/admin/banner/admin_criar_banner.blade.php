@extends('layouts.admin_main')
@section('title', 'Admin - Criar Banner')

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
<h1 style="font-family: Eczar">Criar Banner</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/banner" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
            <div class="form-group">
                <label for="nome">Nome: *</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="nome_en">Nome (EN): *</label>
                <input type="text" class="form-control" id="nome_en" name="nome_en" placeholder="Nome (EN)">
            </div>
            <div class="form-group">
                <label for="corpo">Corpo: *</label>
                <textarea name="corpo" id="corpo" class="form-control" placeholder="Corpo"></textarea>
            </div>
            <div class="form-group">
                <label for="corpo_en">Corpo (EN): *</label>
                <textarea name="corpo_en" id="corpo_en" class="form-control" placeholder="Corpo (EN)"></textarea>
            </div>
            <div class="form-group">
                <label for="media">Media: *</label>
                <input type="file" class="form-control-file" id="media" name="media" placeholder="Media">
            </div>
            <p><strong>Aviso:</strong> Importar imagem com resolução 1920x1080p.</p>
            <div class="form-group">
                <label for="ativo">Ativo:</label>
                <select name="ativo" id="ativo" class="from-group">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar Banner">
</div>
@endsection

<script type="text/javascript">
  function validateForm() {
    var a = document.forms["Form"]["nome"].value;
    var b = document.forms["Form"]["corpo"].value;
    var c = document.forms["Form"]["media"].value;
    if (a == null || a == "", b == null || b == "", c == null || c == "") {
      alert("Por favor, preencha todos os campos obrigatórios (*)");
      return false;
    }
  }
</script>