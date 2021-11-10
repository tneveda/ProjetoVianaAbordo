@extends('layouts.admin_main')
@section('title', 'Admin - Criar Rede Social')

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
<h1 style="font-family: Eczar">Criar Rede Social</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/redes_sociais" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
            <div class="form-group">
                <label for="nome">Nome: *</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="ligacao">Ligação: *</label>
                <input type="text" class="form-control" id="ligacao" name="ligacao" placeholder="Ligação">
            </div>
            <div class="form-group">
                <label for="icone">Icone: *</label>
                <input type="text" class="form-control" id="icone" name="icone" placeholder="Ligação" value="fa fa-">
                <p>Para escolher o icone preencha o campo com "fa fa-(rede social) exemplo: fa fa-facebook"</p>
            </div>
            <input type="submit" class="btn btn-primary" value="Criar Rede Social">
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