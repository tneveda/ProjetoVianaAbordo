@extends('layouts.admin_main')
@section('title', 'Admin - Pedido de Contacto . $pedido_contacto->nome')

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

<h1 style="font-family: Eczar">Pedido de Contacto: {{$pedido_contacto->nome}}</h1>
<br>
    <div class="col-md-6 offset-md-3">
        <h4>Nome:</h4> 
        <p>{{$pedido_contacto->nome}}<p>
        <h4>Email:</h4> 
        <p><a  href="mailto:#">{{$pedido_contacto->email}}</a><p>
        <h4>Mensagem:</h4> 
        <p>{{$pedido_contacto->mensagem}}<p>
          <hr>
        <form action="/admin/atualizar_pedido_contacto/{{$pedido_contacto->id}}" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="respondido">Respondido:</label>
                <select name="respondido" id="respondido" class="from-group">
                    <option value="1">Sim</option>
                    <option value="0" {{$pedido_contacto->respondido == 0 ? "selected='selected" : ""}}>Não</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Editar Pedido de Contacto: Respondido">
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