@extends('layouts.admin_main')
@section('title', 'Admin - Redes Sociais')

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

<h1 style="font-family: Eczar">Redes Sociais</h1>

<button class="btn btn-primary"><a href="/admin/criar_redes_sociais" class="text-white">Adicionar Rede Social</a></button>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="text-align: center;">
                <tr>
                <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 102px;" aria-sort="descending">#</th>
                    <th>Nome</th>
                    <th>Ligação</th>
                    <th>Icone</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($redes_sociais as $rede_social)
                <tr>
                    <td style="text-align: center; vertical-align: middle">{{$rede_social->id}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$rede_social->nome}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$rede_social->ligacao}}</td>
                    <td style="text-align: center; vertical-align: middle"><i class="{{$rede_social->icone}}"></i></td>
                    <td style="text-align: center; vertical-align: middle">{{$rede_social->created_at}}</td>
                    <td style="text-align: center; vertical-align: middle">{{$rede_social->updated_at}}</td>
                    <td style="text-align: center; vertical-align: middle">
                        <button class="btn bg-warning text-white" style="width:40px; margin:2px"><a href="/admin/editar_redes_sociais/{{$rede_social->id}}" style="color:white"><i class="fa fa-edit"></i></a></button>
                        <form action="/admin/redes_sociais/{{$rede_social->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Pretende apagar a Rede Social &quot {{$rede_social->nome}} &quot ?')" type="submit" class="btn  bg-danger text-white" style="width:40px; margin:2px;"><i class="fa fa-trash"></i></button>
                        </form>
                        
                    </td>
                </tr>
                
            @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{$redes_sociais->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
@endsection