@extends('layouts.admin_main')
@section('title', 'Admin - Criar Testemunhos')

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
<h1 style="font-family: Eczar">Criar Testemunho</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/testemunhos" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="testemunho">Testemunho:</label>
                <textarea name="testemunho" id="testemunho" class="form-control" placeholder="Testemunho"></textarea>
            </div>
            <div class="form-group">
                <label for="testemunho_en">Testemunho (EN):</label>
                <textarea name="testemunho_en" id="testemunho_en" class="form-control" placeholder="Testemunho (EN)"></textarea>
            </div>
            <div class="form-group">
                <label for="profissao">Profissão:</label>
                <input type="text" class="form-control" id="profissao" name="profissao" placeholder="Profissão">
            </div>
            <div class="form-group">
                <label for="profissao_en">Profissão (EN):</label>
                <input type="text" class="form-control" id="profissao_en" name="profissao_en" placeholder="Profissão (EN)">
            </div>
            <div class="form-group">
                <label for="ativo">Ativo:</label>
                <select name="ativo" id="ativo" class="from-group">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar Testemunhos">
</div>
@endsection

<script type="text/javascript">
  function validateForm() {
    var nome = document.forms["Form"]["nome"].value;
    var testemunho = document.forms["Form"]["testemunho"].value;
    var testemunho_en = document.forms["Form"]["testemunho_en"].value;
    var profissao = document.forms["Form"]["profissao"].value;
    var profissao_en = document.forms["Form"]["profissao_en"].value;
    if (nome == null || nome == "", 
        testemunho == null || testemunho == "", 
        testemunho_en == null || testemunho_en == "",
        profissao == null || profissao == "",
        profissao_en == null || profissao_en == "") {
      alert("Por favor, preencha todos os campos");
      return false;
    }
  }
</script>