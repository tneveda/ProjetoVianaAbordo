@extends('layouts.admin_main')
@section('title', 'Admin - Editar Rede Social . $redes_sociais->nome')

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
<h1 style="font-family: Eczar">Editar Redes Sociais: {{$redes_sociais->nome}}</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/atualizar_redes_sociais/{{$redes_sociais->id}}" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="nome">Nome: *</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{$redes_sociais->nome}}">
            </div>
            <div class="form-group">
                <label for="ligacao">Ligação: *</label>
                <input type="text" class="form-control" id="ligacao" name="ligacao" placeholder="Ligação" value="{{$redes_sociais->ligacao}}">
            </div>
            <div class="form-group">
                <label for="icone">Icone: *</label>
                <input type="text" class="form-control" id="icone" name="icone" placeholder="Icone" value="{{$redes_sociais->icone}}">
                <i class="{{$redes_sociais->icone}}"></i>
            </div>
            <input type="submit" class="btn btn-primary" value="Editar Rede Social">
</div>
@endsection

<script type="text/javascript">
  function validateForm() {
    var nome = document.forms["Form"]["nome"].value;
    var ligacao = document.forms["Form"]["ligacao"].value;
    var icone = document.forms["Form"]["icone"].value;
    if (nome == null || nome == "", 
        ligacao == null || ligacao == "",
        icone == null || icone == "") {
      alert("Por favor, preencha todos os campos obrigatórios (*)");
      return false;
    }
  }
</script>