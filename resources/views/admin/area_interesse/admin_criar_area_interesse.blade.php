@extends('layouts.admin_main')
@section('title', 'Admin - Adicionar Área de Interesse')

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
<h1 style="font-family: Eczar">Adicionar Área de Interesse</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/area_interesse" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="testemunho">Nome (EN):</label>
                <input type="text" class="form-control" id="nome" name="nome_ing" placeholder="Nome_ing">
            </div>
            
            <input type="submit" class="btn btn-primary" value="Adicionar Área de Interesse">
</div>
@endsection

<script type="text/javascript">
  function validateForm() {
    var nome = document.forms["Form"]["nome"].value;
    var nome_ing = document.forms["Form"]["nome_ing"].value;
    
    if (nome == null || nome == "", 
        nome_ing == null || nome_ing == "") {
      alert("Por favor, preencha todos os campos");
      return false;
    }
  }
</script>