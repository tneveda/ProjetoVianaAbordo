@extends('layouts.admin_main')
@section('title', 'Admin - Contactos')

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

<h1 style="font-family: Eczar">Contactos</h1>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="text-align: center;">
                <tr>
                <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 102px;" aria-sort="descending">#</th>
                    <th>Email</th>
                    <th>Morada</th>
                    <th>telemovel</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($contactos as $contactos)
                <tr>
                    <td style="text-align: center; vertical-align: middle">{{$contactos->id}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$contactos->email}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$contactos->morada}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$contactos->telemovel}}</td>
                    <td style="text-align: center; vertical-align: middle">{{$contactos->created_at}}</td>
                    <td style="text-align: center; vertical-align: middle">{{$contactos->updated_at}}</td>
                    <td style="text-align: center; vertical-align: middle">
                        <button class="btn bg-warning text-white" style="width:40px; margin:2px"><a href="/admin/editar_contactos/{{$contactos->id}}" style="color:white"><i class="fa fa-edit"></i></a></button>
                        
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection