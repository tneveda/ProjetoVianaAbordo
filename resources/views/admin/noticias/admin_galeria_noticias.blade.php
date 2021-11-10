@extends('layouts.admin_main')
@section('title', 'Admin - Galeria Notícias')

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
                    <p class="msg" style="background-color: #d4edda;
                                            color: #155724;
                                            border: 1px solid #c3e6cb;
                                            width: 100%;
                                            margin-bottom: 0;
                                            text-align: center;
                                            padding: 10px;
                                            margin:10px;">
                                            {{session('msg')}}
                    </p>
                @endif
</div>

<h1 style="font-family: Eczar">Galeria Notícias</h1>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="text-align: center;">
                <tr>
                <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 102px;" aria-sort="descending">#</th>
                    <th>Descrição</th>
                    <th>Media</th>
                    <th>Notícia</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($galerias as $galeria)
                <tr>
                    <td style="text-align: center; vertical-align: middle">{{$galeria->id}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$galeria->descricao}}</td>
                    <td style="text-align: center; vertical-align: middle"><img src="/img/galeria_noticias/{{$galeria->media}}" style="width: 75px;"></img></td>
                    <td style="text-align: center; vertical-align: middle"><a href="/noticias/{{$galeria->id_noticia}}">{{$galeria->noticia->titulo}}</a></td>
                    <td style="text-align: center; vertical-align: middle">{{$galeria->created_at}}</td>
                    <td style="text-align: center; vertical-align: middle">{{$galeria->updated_at}}</td>
                    <td style="text-align: center; vertical-align: middle">
                        <form action="/admin/galeria_noticias/{{$galeria->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Pretende apagar a Imagem &quot {{$galeria->descricao}} &quot ?')" type="submit" class="btn  bg-danger text-white" style="width:40px; heigth: 40px; margin:2px;"><i class="fa fa-trash"></i></button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-center">
        {{$galerias->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
@endsection