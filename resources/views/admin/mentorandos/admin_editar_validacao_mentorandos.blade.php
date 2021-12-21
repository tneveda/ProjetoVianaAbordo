@extends('layouts.admin_main')
@section('title', 'Admin - Pedido de Contacto . $mentorando->nome')

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

<?php
$int = $mentorandos->interesses->pluck('area_interesse');
?>

<h1 style="font-family: Eczar">Mentorando: {{$mentorandos->nome}}</h1>
<br>
    <div class="col-md-6 offset-md-3">
        <h4 name="nome" id="nome">Nome:</h4> 
        <p>{{$mentorandos->name}}<p>
        <h4 >Email:</h4> 
        <p name="email" id="email"><a  href="mailto:#">{{$mentorandos->email}}</a><p>
        <h4>Contacto Mòvel:</h4> 
        <p>{{$mentorandos->contacto_movel}}<p>
        <h4>Ocupação Profissional:</h4> 
        <p>{{$mentorandos->ocupacao_profissional}}<p>
        <h4>Ocupação Profissional (Eng):</h4> 
        <p>{{$mentorandos->ocupacao_profissional_ing}}<p>
        <h4>Linkedin:</h4> 
        <p>{{$mentorandos->linkedin}}<p>
        <h4>Area de Interesse:</h4> 
        <p>@foreach($mentorandos -> interesses as $area_interesse) 
            {{$area_interesse->area_interesse}} <br></br>
         @endforeach<p>
        <h4>Motivo:</h4> 
        <p>{{$mentorandos->motivo}}<p>
          <hr>
        <form action="/admin/atualizar_validacao/{{$mentorandos->id}}" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="validacao">Validado:</label>
                <select name="validacao" id="validacao" class="from-group">
                    <option value="1">Sim</option>
                    <option value="0" {{$mentorandos->validacao == 0 ? "selected='selected" : ""}}>Não</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Editar Validação">
        </form>
            
</div>
<br>
@endsection

<script type="text/javascript">
  function validateForm() {
    var nome = document.forms["Form"]["nome"].value;
    var email = document.forms["Form"]["email"].value;
    var mensagem = document.forms["Form"]["mensagem"].value;
    if (nome == null || nome == "", 
        email == null || email == "",
        mensagem == null || mensagem == "") {
      alert("Por favor, preencha todos os campos obrigatórios (*)");
      return false;
    }
  }
</script>