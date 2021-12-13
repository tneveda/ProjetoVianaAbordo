@extends('layouts.admin_main')
@section('title', 'Admin - Criar Mentores')

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
<h1 style="font-family: Eczar">Criar Mentor</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/mentores" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
            <div class="form-group">
                <label for="nome">Nome: *</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="username">Username: *</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="email">Email: *</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="ocupacao_profissional">Ocupação Profissional: *</label>
                <input type="text" class="form-control" id="ocupacao_profissional" name="ocupacao_profissional" placeholder="Ocupacao Profissional">
            </div>
            <div class="form-group">
                <label for="ocupacao_profissional_ing">Ocupação Profissional (Eng): *</label>
                <input type="text" class="form-control" id="ocupacao_profissional_ing" name="ocupacao_profissional_ing" placeholder="Ocupacao Profissional (Eng)">
            </div>
            <p style="font-family: Eczar">Área de Interesse</p>
           
            <div class="form-group">
            @foreach($interesses as $interesse)
            
   <input type="radio" id="{{$interesse->area_interesse}}" name="area_interesse" value = "{{$interesse->id}}"/>
   <label for="area_interesse">{{$interesse->area_interesse}}</label>
   <br><br>
   @endforeach
           </div>
             
            <input type="submit" class="btn btn-primary" value="Criar Mentor">
         
</div>
<br>
@endsection

<script type="text/javascript">
  function validateForm() {
    var nome = document.forms["Form"]["name"].value;
    var username = document.forms["Form"]["username"].value;
    var email = document.forms["Form"]["email"].value;
    var ocupacao_profissional = document.forms["Form"]["ocupacao_profissional"].value;
    var ocupacao_profissional_ing = document.forms["Form"]["ocupacao_profissional_ing"].value;
    

   
    if (nome == null || nome == "", 
        username == null || username == "",
        email == null || email == "",
        ocupacao_profissional == null || ocupacao_profissional == "",
        ocupacao_profissional_ing== null || ocupacao_profissional_ing == "", 
        fotografia == null || fotografia == "") {
      alert("Por favor, preencha todos os campos obrigatórios (*)");
      return false;
    }
  }
</script>