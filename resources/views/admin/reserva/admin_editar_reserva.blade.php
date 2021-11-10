@extends('layouts.admin_main')
@section('title', 'Admin - Editar Reserva . $reserva->nome')

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
<h1 style="font-family: Eczar">Editar Reserva: {{$reserva->nome}}</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/atualizar_reserva/{{$reserva->id}}" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
        <div class="form-group">
                <label for="nome">Nome: *</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{$reserva->nome}}">
            </div>
            <div class="form-group">
                <label for="email">Email: *</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$reserva->email}}">
            </div>
            <div class="form-group">
                <label for="profissao">Profissão: *</label>
                <input type="text" class="form-control" id="profissao" name="profissao" placeholder="Profissão" value="{{$reserva->profissao}}">
            </div>
            <div class="form-group">
                <label for="id_agenda">Agenda: *</label>
                <select name="id_agenda" id="id_agenda" class="from-group">
                    @foreach($agenda as $agenda)
                    <option value="{{$agenda->id}}" {{$agenda->id == $reserva->id_agenda ? "selected='selected" : ""}}>{{$agenda->nome}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Editar Reserva">
        </form>
            
</div>
<br>
@endsection

<script type="text/javascript">
  function validateForm() {
    var nome = document.forms["Form"]["nome"].value;
    var email = document.forms["Form"]["email"].value;
    var profissao = document.forms["Form"]["profissao"].value;
    if (nome == null || nome == "", 
        email == null || email == "",
        profissao == null || profissao == "") {
      alert("Por favor, preencha todos os campos obrigatórios (*)");
      return false;
    }
  }
</script>