@extends('layouts.admin_main')
@section('title', 'Admin - Editar Mentores . $mentores->mentores')

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
$int = $mentores->interesses->pluck('id')->toArray();
?>
<h1 style="font-family: Eczar">Editar Mentores: {{$mentores->mentores}}</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/atualizar_mentores/{{$mentores->id}}" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
        <div class="form-group">
                <label for="nome">Nome: *</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{$mentores->name}}">
            </div>
            <div class="form-group">
                <label for="username">Username: *</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{$mentores->username}}">
            </div>
            <div class="form-group">
                <label for="email">Email: *</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$mentores->email}}">
            </div>
            <div class="form-group">
                <label for="ocupacao_profissional">Ocupação Profissional: *</label>
                <input type="text" class="form-control" id="ocupacao_profissional" name="ocupacao_profissional" placeholder="Ocupacao Profissional" value="{{$mentores->ocupacao_profissional}}">
            </div>
            <div class="form-group">
                <label for="ocupacao_profissional_en">Ocupação Profissional (Eng): *</label>
                <input type="text" class="form-control" id="ocupacao_profissional_en" name="ocupacao_profissional_en" placeholder="Ocupacao Profissional (Eng)" value="{{$mentores->ocupacao_profissional_en}}">
            </div>
           <?php /* <p style="font-family: Eczar">Área de Interesse</p>
           
            <div class="form-group">
           
            @foreach($interesses as $interesse)
           
             <input type="checkbox" name="area_interesse[]" class="area_interesse" value="{{$interesse->id}}" @if (in_array($interesse->id, $int)) checked="checked" @endif > {{$interesse->area_interesse}} <br/>
            @endforeach
        
           </div>
           */
          ?>
            <input type="submit" class="btn btn-primary" value="Editar Mentor">
            
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