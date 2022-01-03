@extends('layouts.admin_main')
@section('title', 'Admin - Criar Mentorias')

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

<div class="row">
                @if(session("msg"))
                    <p class="msg" style="background-color: #f58771;
                                            color: #c42108;
                                            border: 1px solid #ff7e70;
                                            width: 100%;
                                            margin-bottom: 0;
                                            text-align: center;
                                            padding: 10px;
                                            margin:10px;">
                                            {{session('msg')}}
                    </p>
                @endif
</div>

<h1 style="font-family: Eczar">Criar Mentoria</h1>
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach 

    <div class="col-md-6 offset-md-3">
        <form action="/admin/mentorias" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
            <div class="form-group">
                <label for="nome">Titulo: *</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
            </div>
            <div class="form-group">
                <label for="username">Titulo (Eng): *</label>
                <input type="text" class="form-control" id="titulo_en" name="titulo_en" placeholder="Titulo (eng)">
            </div>
            <div class="form-group">
                <label for="mentor">Mentor: *</label>
                <select name="mentor" id="mentor" class="from-group">
                    @foreach($mentores as $mentor)
                    <option value="{{$mentor->id}}">{{$mentor->name}}</option>
                    @endforeach
                </select>
            </div>
           
            <div class="form-group">
                <label for="descricao">Descrição: *</label>
                <textarea name="descricao" id="descricao" class="form-control" placeholder="Descricao"></textarea>
            </div>
            <div class="form-group">
                <label for="descricao_en">Descrição (EN): *</label>
                <textarea name="descricao_en" id="descricao_en" class="form-control" placeholder="Descrição (EN)"></textarea>
            </div>
            <div class="form-group">
            <label for="areaInteresse">Àrea de Interesse: *</label>
                <div class="form-group">
            @foreach($interesses as $interesse)
        <input type="radio" name="area_interesse" class="area_interesse" value="{{$interesse->id}}"> {{$interesse->area_interesse}} <br/>
        @endforeach
           </div>
           </div>
            <input type="submit" class="btn btn-primary" value="Criar Mentoria">
         
</div>
<br>
@endsection

