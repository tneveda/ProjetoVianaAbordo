@extends('layouts.admin_main')
@section('title', 'Admin - Editar Contactos')

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
<h1 style="font-family: Eczar">Editar Contactos</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/atualizar_contactos/{{$contactos->id}}" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="email">Email: *</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{$contactos->email}}">
            </div>
            <div class="form-group">
                <label for="morada">Morada: *</label>
                <textarea name="morada" id="morada" class="form-control"> {{$contactos->morada}}</textarea>
            </div>
            <div class="form-group">
                <label for="telemovel">Telemóvel: *</label>
                <textarea name="telemovel" id="telemovel" class="form-control"> {{$contactos->telemovel}}</textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Editar Contactos">
</div>
@endsection

<script type="text/javascript">
  function validateForm() {
    var email = document.forms["Form"]["email"].value;
    var morada = document.forms["Form"]["morada"].value;
    var telemovel = document.forms["Form"]["telemovel"].value;
    if (email == null || email == "", morada == null || morada == "", telemovel == null || telemovel == "") {
      alert("Por favor, preencha todos os campos obrigatórios (*)");
      return false;
    }
  }
</script>