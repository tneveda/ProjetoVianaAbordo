@extends('layouts.admin_main')
@section('title', 'Admin - Confirmar alocacao . $mentorandos->name . $mentoria->titulo')

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



<h1 style="font-family: Eczar">Mentorando: {{$mentorandos->name}}</h1>
<br>
    <div class="col-md-6 offset-md-3">
        <input name="invisible" type="hidden" value="secret">
        <h4 name="nome" id="nome">Nome:</h4> 
        <p>{{$mentorandos->name}}<p>
        <h4 >Titulo Mentoria:</h4> 
        <p name="email" id="email">{{$mentorias->titulo}}<p>
        <h4>Mentor:</h4> 
        <p>{{$mentorias->mentores->name}}<p>
        <h4>Descrição:</h4> 
        <p>{{$mentorias->descricao}}<p>
          <hr>
        <form action="/admin/confirmar_alocacao/{{$mentorandos->id}}/{{$mentorias->id}}" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
        <input name="mentorando_id" id="mentorando_id" type="hidden" value="{{$mentorandos->id}}">
        <input name="mentoria_id" id="mentoria_id" type="hidden" value="{{$mentorias->id}}">
            <input type="submit" class="btn btn-primary" value="Confirmar Alocação">
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