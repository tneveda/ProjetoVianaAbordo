@extends('layouts.admin_main')
@section('title', 'Admin - Criar Galeria Agenda')

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

<h1 style="font-family: Eczar">Adicionar Galeria Agenda: {{$agenda->nome}}</h1>
    <div class="col-md-6 offset-md-3">
        <form action="/admin/galeria_agenda/{{$agenda->id}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
            </div>
            <div class="form-group">
                <label for="media">Media:</label>
                <input type="file" class="form-control-file" id="media" name="media" placeholder="Media">
            </div>
            <p><strong>Aviso:</strong> Importar imagem com resolução 720x480p.</p>
            <input type="submit" class="btn btn-primary" value="Adicionar Imagem">
</div>
@endsection