@extends('layouts.admin_main')
@section('title', 'Admin - Criar Números e Factos')

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
<h1 style="font-family: Eczar">Criar Números e Factos</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/numeros_factos" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
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
                <label for="numero">Número: *</label>
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Número">
            </div>
            <div class="form-group">
                <label for="icone">Icone: *</label>
                <input type="file" class="form-control-file" id="icone" name="icone" placeholder="Icone">
            </div>
            <p><strong>Aviso:</strong> Importar icone com resolução 512x512p e cor Branca.</p>
            <div class="form-group">
                <label for="ativo">Ativo:</label>
                <select name="ativo" id="ativo" class="from-group">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar Números e Factos">
</div>
@endsection

<script type="text/javascript">
  function validateForm() {
    var nome = document.forms["Form"]["nome"].value;
    var nome_en = document.forms["Form"]["nome_en"].value;
    var numero = document.forms["Form"]["numero"].value;
    var icone = document.forms["Form"]["icone"].value;
    if (nome == null || nome == "", 
        nome_en == null || nome_en == "", 
        numero == null || numero == "",
        icone == null || icone == "") {
      alert("Por favor, preencha todos os campos obrigatórios (*)");
      return false;
    }
  }
</script>