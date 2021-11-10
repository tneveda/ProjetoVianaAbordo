@extends('layouts.admin_main')
@section('title', 'Admin - Reserva')

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

<h1 style="font-family: Eczar">Reserva</h1>


<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="text-align: center;">
                <tr>
                <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 102px;" aria-sort="descending">#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Profissão</th>
                    <th>Agenda</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($reservas as $reserva)
            @if(strtotime($reserva->agenda->data) > strtotime('now'))
                <tr>
                    <td style="text-align: center; vertical-align: middle">{{$reserva->id}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$reserva->nome}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$reserva->email}}</td> 
                    <td style="text-align: justify; vertical-align: middle">{{$reserva->profissao}}</td>
                    <td style="text-align: center; vertical-align: middle"><a href="/agenda/{{$reserva->id_agenda}}">{{$reserva->agenda->nome}}</a></td> 
                    <td style="text-align: center; vertical-align: middle">{{$reserva->created_at}}</td>
                    <td style="text-align: center; vertical-align: middle">{{$reserva->updated_at}}</td>
                    <td style="text-align: center; vertical-align: middle">
                        <button class="btn bg-warning text-white" style="width:40px; margin:2px"><a href="/admin/editar_reserva/{{$reserva->id}}" style="color:white"><i class="fa fa-edit"></i></a></button>
                        <form action="/admin/reserva/{{$reserva->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Pretende apagar a reserva &quot {{$reserva->nome}} &quot ?')" type="submit" class="btn  bg-danger text-white" style="width:40px; margin:2px;"><i class="fa fa-trash"></i></button>
                        </form>
                        
                    </td>
                </tr>
            @endif
            @endforeach

            </tbody>
        </table>
        <div class="d-flex justify-content-center">
        {{$reservas->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
@endsection