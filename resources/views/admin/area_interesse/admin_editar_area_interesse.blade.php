@extends('layouts.admin_main')
@section('title', 'Admin - Editar Área de Interesse . $area_interesse->area_interesse')

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
<h1 style="font-family: Eczar">Editar Área de Interesse: {{$area_interesse->area_interesse}}</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/atualizar_area_interesse/{{$area_interesse->id}}" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="titulo">Nome: *</label>
                <input type="text" class="form-control" id="area_interesse" name="area_interesse" placeholder="Nome" value="{{$area_interesse->area_interesse}}">
            </div>
            <div class="form-group">
                <label for="titulo_en">Nome (EN): *</label>
                <input type="text" class="form-control" id="area_interesse_ing" name="area_interesse_ing" placeholder="Nome(EN)" value="{{$area_interesse->area_interesse_ing}}">
            </div>
            <div class="form-group">
                <label for="ativo">Ativo:</label>
                <select name="ativo" id="ativo" class="from-group">
                    <option value="1">Sim</option>
                    <option value="0" {{$area_interesse->ativo == 0 ? "selected='selected" : ""}}>Não</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Editar Área de Interesse">
            
</div>
<br>
@endsection

<script type="text/javascript">
  function validateForm() {
    var nome = document.forms["Form"]["area_interesse"].value;
    var nome_ing = document.forms["Form"]["area_interesse_ing"].value;
    
    if (nome == null || nome == "", 
        nome_ing == null || nome_ing == "") {
      alert("Por favor, preencha todos os campos");
      return false;
    }
  }
</script>