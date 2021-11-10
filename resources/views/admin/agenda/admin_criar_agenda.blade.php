@extends('layouts.admin_main')
@section('title', 'Admin - Criar Agenda')

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

<h1 style="font-family: Eczar">Criar Agenda</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/agenda" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
            <div class="form-group">
                <label for="nome">Nome: *</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="orador">Orador: *</label>
                <select name="orador" id="orador" class="from-group">
                    @foreach($pessoa as $pessoa)
                    <option value="{{$pessoa->nome}}">{{$pessoa->nome}}</option>
                    @endforeach
                </select>
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
                <label for="local">Local: *</label>
                <input type="text" class="form-control" id="local" name="local" placeholder="Local">
            </div>
            <div class="form-group">
                <label for="coordenadas">Coordenadas: *</label>
                <input type="text" class="form-control" id="coordenadas" name="coordenadas" placeholder="Coordenadas">
            </div>
            <div class="form-group">
                <label for="data">Data: *</label>
                <input type="datetime-local" class="form-control" id="data" name="data" placeholder="Data">
            </div>
            <div class="form-group">
                <label for="cidade">Cidade: *</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
            </div>
            <div class="form-group">
                <label for="lotacao">Lotação: *</label>
                <input type="text" class="form-control" id="lotacao" name="lotacao" placeholder="Lotação">
            </div>
            <div class="form-group">
                <label for="cartaz">Cartaz: *</label>
                <input type="file" class="form-control-file" id="cartaz" name="cartaz" placeholder="Cartaz">
            </div>
            <div class="form-group">
                <label for="destaque">Destaque:</label>
                <select name="destaque" id="destaque" class="from-group">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ativo">Ativo:</label>
                <select name="ativo" id="ativo" class="from-group">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar Agenda">
</div>
<br>
@endsection

<script type="text/javascript">
  function validateForm() {
    var nome = document.forms["Form"]["nome"].value;
    var orador = document.forms["Form"]["orador"].value;
    var descricao = document.forms["Form"]["descricao"].value;
    var descricao_en = document.forms["Form"]["descricao_en"].value;
    var local = document.forms["Form"]["local"].value;
    var coordenadas = document.forms["Form"]["coordenadas"].value;
    var data = document.forms["Form"]["data"].value;
    var cidade = document.forms["Form"]["cidade"].value;
    var lotacao = document.forms["Form"]["lotacao"].value;
    var cartaz = document.forms["Form"]["cartaz"].value;
    if (nome == null || nome == "", 
        orador == null || orador == "", 
        descricao == null || descricao == "",
        descricao_en == null || descricao_en == "", 
        local == null || local == "", 
        coordenadas == null || coordenadas == "",
        data == null || data == "",
        cidade == null || cidade == "", 
        lotacao == null || lotacao == "", 
        cartaz == null || cartaz == "") {
      alert("Por favor, preencha todos os campos obrigatórios (*)");
      return false;
    }
  }
</script>