@extends('layouts.admin_main')
@section('title', 'Admin - Add interesse mentoria')

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
<h1 style="font-family: Eczar">Escolhe a Área de Interesse</h1>
@foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach 

    <div class="col-md-6 offset-md-3">
        <form action="/admin/mentorias/{{$mentorias->id}}" method="POST" enctype="multipart/form-data" name="Form" onsubmit="return validateForm()">
        @csrf
        @method('PUT')
      
            <p style="font-family: Eczar">Área de Interesse</p>
           
            <div class="form-group">
            @foreach($mentor->interesses as $interesse)
        <input type="checkbox" name="area_interesse[]" class="area_interesse" value="{{$interesse->id}}"> {{$interesse->area_interesse}} <br/>
        @endforeach
           </div>
  
             
            <input type="submit" class="btn btn-primary" value="Criar Mentoria">
         
</div>
<br>
@endsection