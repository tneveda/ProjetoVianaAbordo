@extends('layouts.admin_main')
@section('title', 'Admin - Editar Pessoa . $pessoa->nome')

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
<h1 style="font-family: Eczar">Editar Pessoa: {{$pessoa->nome}}</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/atualizar_pessoa/{{$pessoa->id}}" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
        <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{$pessoa->nome}}">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" class="form-control" placeholder="Descricao">{{$pessoa->descricao}}</textarea>
            </div>
            <div class="form-group">
                <label for="descricao_en">Descrição (EN):</label>
                <textarea name="descricao_en" id="descricao_en" class="form-control" placeholder="Descrição (EN)">{{$pessoa->descricao_en}}</textarea>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$pessoa->email}}">
            </div>
            <div class="form-group">
                <label for="telemovel">Telemóvel:</label>
                <input type="text" class="form-control" id="telemovel" name="telemovel" placeholder="Telemóvel" value="{{$pessoa->telemovel}}">
            </div>
            <div class="form-group">
                <label for="cidade">Cidade/País:</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade/País" value="{{$pessoa->cidade}}">
            </div>
            <div class="form-group">
                <label for="profissao">Profissão:</label>
                <input type="text" class="form-control" id="profissao" name="profissao" placeholder="Profissão" value="{{$pessoa->profissao}}">
            </div>
            <div class="form-group">
                <label for="profissao_en">Profissão (EN):</label>
                <input type="text" class="form-control" id="profissao_en" name="profissao_en" placeholder="Profissão (EN)" value="{{$pessoa->profissao_en}}">
            </div>
            <div class="form-group">
                <label for="empresa">Empresa:</label>
                <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Empresa" value="{{$pessoa->empresa}}">
            </div>
            <div class="form-group">
                <label for="facebook">Facebook:</label>
                <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Facebook" value="{{$pessoa->facebook}}">
            </div>
            <div class="form-group">
                <label for="linkedin">LinkedIn:</label>
                <input type="text" class="form-control" id="linkedin" name="linkedin" placeholder="LinkedIn" value="{{$pessoa->linkedin}}">
            </div>
            <div class="form-group">
                <label for="twitter">Twitter:</label>
                <input type="text" class="form-control" id="twitter" name="twitter" placeholder="twitter" value="{{$pessoa->twitter}}">
            </div>
            <div class="form-group">
                <label for="fotografia">Fotografia:</label>
                <input type="file" class="form-control-file" id="medfotografiaia" name="fotografia" placeholder="Fotografia">
                <img src="/img/pessoa/{{$pessoa->fotografia}}" alt="{{$pessoa->nome}}" style="width: 100px; margin-top:10px;">
            </div>
            <div class="form-group">
                <label for="ativo">Ativo:</label>
                <select name="ativo" id="ativo" class="from-group">
                    <option value="1">Sim</option>
                    <option value="0" {{$pessoa->ativo == 0 ? "selected='selected" : ""}}>Não</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Editar Pessoa">
            
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
    if (nome == null || nome == "", 
        descricao == null || descricao == "",
        descricao_en == null || descricao_en == "",
        email == null || email == "",
        telemovel == null || telemovel == "",
        cidade == null || cidade == "", 
        profissao == null || profissao == "",
        profissao_en == null || profissao_en == "",
        empresa == null || empresa == "",) {
      alert("Por favor, preencha todos os campos");
      return false;
    }
  }
</script>