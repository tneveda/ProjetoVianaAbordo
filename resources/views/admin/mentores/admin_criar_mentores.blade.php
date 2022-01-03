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
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach 

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
                <label for="ocupacao_profissional_en">Ocupação Profissional (Eng): *</label>
                <input type="text" class="form-control" id="ocupacao_profissional_en" name="ocupacao_profissional_en" placeholder="Ocupacao Profissional (Eng)">
            </div>
            
           
  
             
            <input type="submit" class="btn btn-primary" value="Criar Mentor">
         
</div>
<br>
@endsection

