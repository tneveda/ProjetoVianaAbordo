@extends('layouts.admin_main')
@section('title', 'Admin - Editar Testemunhos . $testemunhos->testemunho')

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
<h1 style="font-family: Eczar">Editar Testemunho de: {{$testemunhos->nome}}</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/atualizar_testemunhos/{{$testemunhos->id}}" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{$testemunhos->nome}}">
            </div>
            <div class="form-group">
                <label for="testemunho">Testemunho:</label>
                <input type="text" class="form-control" id="testemunho" name="testemunho" placeholder="Testemunho" value="{{$testemunhos->testemunho}}">
            </div>
            <div class="form-group">
                <label for="testemunho_en">Testemunho (EN):</label>
                <input type="text" class="form-control" id="testemunho_en" name="testemunho_en" placeholder="Testemunho (EN)" value="{{$testemunhos->testemunho_en}}">
            </div>
            <div class="form-group">
                <label for="profissao">Profissão:</label>
                <input type="text" class="form-control" id="profissao" name="profissao" placeholder="Profissão" value="{{$testemunhos->profissao}}">
            </div>
            <div class="form-group">
                <label for="profissao_en">Profissão (EN):</label>
                <input type="text" class="form-control" id="profissao_en" name="profissao_en" placeholder="Profissão (EN)" value="{{$testemunhos->profissao_en}}">
            </div>
            <div class="form-group">
                <label for="ativo">Ativo:</label>
                <select name="ativo" id="ativo" class="from-group">
                    <option value="1">Sim</option>
                    <option value="0" {{$testemunhos->ativo == 0 ? "selected='selected" : ""}}>Não</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary" value="Editar Números e Factos">
</div>
@endsection