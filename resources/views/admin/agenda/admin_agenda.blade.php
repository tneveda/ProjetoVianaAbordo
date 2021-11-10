@extends('layouts.admin_main')
@section('title', 'Admin - Agenda')

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

<h1 style="font-family: Eczar">Agenda</h1>

<button class="btn btn-primary"><a href="/admin/criar_agenda" class="text-white">Adicionar Agenda</a></button>

<div class="card-body">
    <div>
        @if($pesquisa)
        <form action="/admin/agenda" method="GET" class="d-none d-md-inline-block form-inline" style="width: 50%;">
            <div class="input-group">
                <input type="text" id="pesquisa" name="pesquisa" class="form-control" placeholder="Procurar..." value="{{$pesquisa}}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
                
            </div>
        </form>
        <button class="btn btn-primary" style="margin-top:-5px; margin-left:10px"><a href="/admin/agenda" class="text-white">Voltar</a></button>

        @else
        <form action="/admin/agenda" method="GET" class="d-none d-md-inline-block form-inline" style="width: 50%;">
            <div class="input-group">
                <input type="text" id="pesquisa" name="pesquisa" class="form-control" placeholder="Procurar..." value="{{$pesquisa}}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        @endif
    </div>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="text-align: center;">
                <tr>
                    <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 102px;" aria-sort="descending">#</th>
                    <th>Nome</th>
                    <th>Orador</th>
                    <th>Descrição</th>
                    <th>Descrição (EN)</th>
                    <th>Local</th>
                    <th>Coordenadas</th>
                    <th>Data</th>
                    <th>Cidade</th>
                    <th>Lotação</th>
                    <th>Cartaz</th>
                    <th>Destaque</th>
                    <th>Ativo</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agendas as $agenda)
                <tr>
                    <td style="text-align: center; vertical-align: middle">{{$agenda->id}}</td>
                    <td style="text-align: justify; vertical-align: middle"><a href="/agenda/{{$agenda->id}}">{{$agenda->nome}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$agenda->orador}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{ Str::limit($agenda-> descricao, 20) }}</td>
                    <td style="text-align: justify; vertical-align: middle">{{ Str::limit($agenda-> descricao_en, 20) }}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$agenda->local}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$agenda->coordenadas}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$agenda->data}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$agenda->cidade}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$agenda->lotacao}}</td>
                    <td style="text-align: center; vertical-align: middle"><img src="/img/agenda/{{$agenda->cartaz}}" style="width: 75px;"></img></td>
                    <td style="text-align: center; vertical-align: middle">
                        @if($agenda->destaque == 1)
                        <b class="text-center" style="color: green; ">Sim</b>
                        @else
                        <b style="color: red; text-aling: center;">Não</b>
                        @endif
                    </td>
                    <td style="text-align: center; vertical-align: middle">
                        @if($agenda->ativo == 1)
                        <b class="text-center" style="color: green; ">Sim</b>
                        @else
                        <b style="color: red; text-aling: center;">Não</b>
                        @endif
                    </td>
                    <td style="text-align: center; vertical-align: middle">{{$agenda->created_at}}</td>
                    <td style="text-align: center; vertical-align: middle">{{$agenda->updated_at}}</td>
                    <td style="text-align: center; vertical-align: middle">
                        <button class="btn bg-primary text-white" style="width:40px; heigth: 40px; margin:2px"><a href="/admin/adicionar_galeria_agenda/{{$agenda->id}}" style="color:white"><i class="fa fa-image"></i></a></button>
                        <button class="btn bg-warning text-white" style="width:40px; margin:2px"><a href="/admin/editar_agenda/{{$agenda->id}}" style="color:white"><i class="fa fa-edit"></i></a></button>
                        <form action="/admin/agenda/{{$agenda->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Pretende apagar a agenda &quot {{$agenda->nome}} &quot ?')" type="submit" class="btn  bg-danger text-white" style="width:40px; margin:2px;"><i class="fa fa-trash"></i></button>
                        </form>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        @if($pesquisa)
        @else
        <div class="d-flex justify-content-center">
            {{$agendas->links('pagination::bootstrap-4')}}
        </div>
        @endif
    </div>
</div>
@endsection