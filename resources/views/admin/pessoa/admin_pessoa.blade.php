@extends('layouts.admin_main')
@section('title', 'Admin - Pessoa')

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

<h1 style="font-family: Eczar">Pessoa</h1>

<button class="btn btn-primary"><a href="/admin/criar_pessoa" class="text-white">Adicionar Pessoa</a></button>

<div class="card-body">
<div>
        @if($pesquisa)
        <form action="/admin/pessoa" method="GET" class="d-none d-md-inline-block form-inline" style="width: 50%;">
            <div class="input-group">
                <input type="text" id="pesquisa" name="pesquisa" class="form-control" placeholder="Procurar..." value="{{$pesquisa}}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
                
            </div>
        </form>
        <button class="btn btn-primary" style="margin-top:-5px; margin-left:10px"><a href="/admin/pessoa" class="text-white">Voltar</a></button>

        @else
        <form action="/admin/pessoa" method="GET" class="d-none d-md-inline-block form-inline" style="width: 50%;">
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
                    <th>Descrição</th>
                    <th>Descrição (EN)</th>
                    <th>Email</th>
                    <th>Telemóvel</th>
                    <th>Cidade</th>
                    <th>Profissão</th>
                    <th>Profissão (EN)</th>
                    <th>Empresa</th>
                    <th>Facebook</th>
                    <th>LinkedIn</th>
                    <th>Twitter</th>
                    <th>Fotografia</th>
                    <th>Ativo</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pessoas as $pessoa)
                <tr>
                    <td style="text-align: center; vertical-align: middle">{{$pessoa->id}}</td>
                    <td style="text-align: justify; vertical-align: middle"><a href="/pessoa/{{$pessoa->id}}">{{$pessoa->nome}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{ Str::limit($pessoa-> descricao, 15) }}</td>
                    <td style="text-align: justify; vertical-align: middle">{{ Str::limit($pessoa-> descricao_en, 15) }}</td>
                    <td style="text-align: justify; vertical-align: middle">{{ Str::limit($pessoa-> email, 10) }}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$pessoa->telemovel}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$pessoa->cidade}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{ Str::limit($pessoa-> profissao, 15) }}</td>
                    <td style="text-align: justify; vertical-align: middle">{{ Str::limit($pessoa-> profissao_en, 15) }}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$pessoa->empresa}}</td>
                    <td style="text-align: justify; vertical-align: middle"><a href="{{$pessoa->facebook}}">{{ Str::limit($pessoa-> facebook, 15) }}</td>
                    <td style="text-align: justify; vertical-align: middle"><a href="{{$pessoa->linkedin}}">{{ Str::limit($pessoa-> linkedin, 15) }}</td>
                    <td style="text-align: justify; vertical-align: middle"><a href="{{$pessoa->twitter}}">{{ Str::limit($pessoa-> twitter, 15) }}</td>
                    <td style="text-align: center; vertical-align: middle"><img src="/img/pessoa/{{$pessoa->fotografia}}" style="width: 75px;"></img></td>
                    <td style="text-align: center; vertical-align: middle">
                        @if($pessoa->ativo == 1)
                        <b class="text-center" style="color: green; ">Sim</b>
                        @else
                        <b style="color: red; text-aling: center;">Não</b>
                        @endif
                    </td>
                    <td style="text-align: center; vertical-align: middle">{{$pessoa->created_at}}</td>
                    <td style="text-align: center; vertical-align: middle">{{$pessoa->updated_at}}</td>
                    <td style="text-align: center; vertical-align: middle">
                        <button class="btn bg-warning text-white" style="width:40px; margin:2px"><a href="/admin/editar_pessoa/{{$pessoa->id}}" style="color:white"><i class="fa fa-edit"></i></a></button>
                        <form action="/admin/pessoa/{{$pessoa->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Pretende apagar a Pessoa &quot {{$pessoa->nome}} &quot ?')" type="submit" class="btn  bg-danger text-white" style="width:40px; margin:2px;"><i class="fa fa-trash"></i></button>
                        </form>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        @if($pesquisa)
        @else
        <div class="d-flex justify-content-center">
            {{$pessoas->links('pagination::bootstrap-4')}}
        </div>
        @endif
    </div>
</div>
@endsection