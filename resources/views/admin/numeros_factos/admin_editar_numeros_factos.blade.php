@extends('layouts.admin_main')
@section('title', 'Admin - Editar Números e Factos . $numeros_factos->nome')

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
<h1 style="font-family: Eczar">Editar Números e Factos: {{$numeros_factos->nome}}</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/atualizar_numeros_factos/{{$numeros_factos->id}}" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="nome">Nome: *</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{$numeros_factos->nome}}">
            </div>
            <div class="form-group">
                <label for="nome_en">Nome (EN): *</label>
                <input type="text" class="form-control" id="nome_en" name="nome_en" placeholder="Nome (EN)" value="{{$numeros_factos->nome_en}}">
            </div>
            <div class="form-group">
                <label for="numero">Número: *</label>
                <input type="text" class="form-control" id="numero" name="numero" placeholder="Número" value="{{$numeros_factos->numero}}">
            </div>
            <div class="form-group">
                <label for="icone">Icone:</label>
                <input type="file" class="form-control-file" id="icone" name="icone" placeholder="Icone">
                <img src="/img/numeros_factos/{{$numeros_factos->icone}}" alt="{{$numeros_factos->nome}}" style="width: 100px; margin-top:10px; background:#E62B36">
            </div>
            <div class="form-group">
                <label for="ativo">Ativo:</label>
                <select name="ativo" id="ativo" class="from-group">
                    <option value="1">Sim</option>
                    <option value="0" {{$numeros_factos->ativo == 0 ? "selected='selected" : ""}}>Não</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Editar Números e Factos">
</div>
@endsection

<script type="text/javascript">
  function validateForm() {
    var nome = document.forms["Form"]["nome"].value;
    var nome_en = document.forms["Form"]["nome_en"].value;
    var numero = document.forms["Form"]["numero"].value;
    if (nome == null || nome == "", 
        nome_en == null || nome_en == "", 
        numero == null || numero == "") {
      alert("Por favor, preencha todos os campos obrigatórios (*)");
      return false;
    }
  }
</script>