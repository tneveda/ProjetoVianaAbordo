@extends('layouts.admin_main')
@section('title', 'Admin - Números e Factos')

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

<h1 style="font-family: Eczar">Números e Factos</h1>

<button class="btn btn-primary"><a href="/admin/criar_numeros_factos" class="text-white">Adicionar Números e Factos</a></button>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="text-align: center;">
                <tr>
                <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 102px;" aria-sort="descending">#</th>
                    <th>Nome</th>
                    <th>Nome (EN)</th>
                    <th>Número</th>
                    <th>Icone</th>
                    <th>Ativo</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($numeros_factos as $numero_facto)
                <tr>
                    <td style="text-align: center; vertical-align: middle">{{$numero_facto->id}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$numero_facto->nome}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$numero_facto->nome_en}}</td>
                    <td style="text-align: center; vertical-align: middle">{{$numero_facto->numero}}</td>
                    <td style="text-align: center; vertical-align: middle; background:#E62B36"><img src="/img/numeros_factos/{{$numero_facto->icone}}" style="width: 75px;"></img></td>
                    <td style="text-align: center; vertical-align: middle">
                        @if($numero_facto->ativo == 1)
                            <b class="text-center"style="color: green; ">Sim</b>
                            @else
                            <b style="color: red; text-aling: center;">Não</b>
                        @endif
                    </td>
                    <td style="text-align: center; vertical-align: middle">{{$numero_facto->created_at}}</td>
                    <td style="text-align: center; vertical-align: middle">{{$numero_facto->updated_at}}</td>
                    <td style="text-align: center; vertical-align: middle">
                        <button class="btn bg-warning text-white" style="width:40px; margin:2px"><a href="/admin/editar_numeros_factos/{{$numero_facto->id}}" style="color:white"><i class="fa fa-edit"></i></a></button>
                        <form action="/admin/numeros_factos/{{$numero_facto->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Pretende apagar a notícia &quot {{$numero_facto->nome}} &quot ?')" type="submit" class="btn  bg-danger text-white" style="width:40px; margin:2px;"><i class="fa fa-trash"></i></button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{$numeros_factos->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
@endsection