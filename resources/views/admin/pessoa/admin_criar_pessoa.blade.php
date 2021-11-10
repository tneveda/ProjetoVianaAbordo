@extends('layouts.admin_main')
@section('title', 'Admin - Criar Pessoa')

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
<h1 style="font-family: Eczar">Criar Pessoa</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/pessoa" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
            <div class="form-group">
                <label for="nome">Nome: *</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição: *</label>
                <textarea name="descricao" id="descricao" class="form-control" placeholder="Descricao"></textarea>
            </div>
            <div class="form-group">
                <label for="descricao_en">Descrição (EN): *</label>
                <textarea name="descricao_en" id="descricao_en" class="form-control" placeholder="Descrição (EN)"></textarea>
            </div>
            <div class="form-group">
                <label for="email">Email: *</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="telemovel">Telemóvel: *</label>
                <input type="text" class="form-control" id="telemovel" name="telemovel" placeholder="Telemóvel">
            </div>
            <div class="form-group">
                <label for="cidade">Cidade/País: *</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade/País">
            </div>
            <div class="form-group">
                <label for="profissao">Profissão: *</label>
                <input type="text" class="form-control" id="profissao" name="profissao" placeholder="Profissão">
            </div>
            <div class="form-group">
                <label for="profissao_en">Profissão (EN): *</label>
                <input type="text" class="form-control" id="profissao_en" name="profissao_en" placeholder="Profissão (EN)">
            </div>
            <div class="form-group">
                <label for="empresa">Empresa: *</label>
                <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Empresa">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook:</label>
                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook">
            </div>
            <div class="form-group">
                <label for="linkedin">LinkedIn:</label>
                <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="LinkedIn">
            </div>
            <div class="form-group">
                <label for="twitter">Twitter:</label>
                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="twitter">
            </div>
            <div class="form-group">
                <label for="fotografia">Fotografia: *</label>
                <input type="file" class="form-control-file" id="fotografia" name="fotografia" placeholder="Fotografia">
            </div>
            <div class="form-group">
                <label for="ativo">Ativo: </label>
                <select name="ativo" id="ativo" class="from-group">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar Pessoa">
</div>
<br>
@endsection

<script type="text/javascript">
  function validateForm() {
    var nome = document.forms["Form"]["nome"].value;
    var descricao = document.forms["Form"]["descricao"].value;
    var descricao_en = document.forms["Form"]["descricao_en"].value;
    var email = document.forms["Form"]["email"].value;
    var telemovel = document.forms["Form"]["telemovel"].value;
    var cidade = document.forms["Form"]["cidade"].value;
    var profissao = document.forms["Form"]["profissao"].value;
    var profissao_en = document.forms["Form"]["profissao_en"].value;
    var empresa = document.forms["Form"]["empresa"].value;
    var fotografia = document.forms["Form"]["fotografia"].value;
    if (nome == null || nome == "", 
        descricao == null || descricao == "",
        descricao_en == null || descricao_en == "",
        email == null || email == "",
        telemovel == null || telemovel == "",
        cidade == null || cidade == "", 
        profissao == null || profissao == "",
        profissao_en == null || profissao_en == "",
        empresa == null || empresa == "",
        fotografia == null || fotografia == "") {
      alert("Por favor, preencha todos os campos obrigatórios (*)");
      return false;
    }
  }
</script>