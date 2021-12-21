@extends('layouts.admin_main')
@section('title', 'Admin - validar mentorandos')

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

<h1 style="font-family: Eczar">Mentorandos por validar</h1>


<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="text-align: center;">
                <tr>
                <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 102px;" aria-sort="descending">#</th>
                    <th>Nome</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Contacto Mòvel</th>
                    <th>Ocupação Profissional</th>
                    <th>Ocupação Profissional (EN)</th>
                    <th>Área de Interesse</th>
                    <th>Fotografia</th>
                    <th>Linkedin</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($mentorandos as $mentorando)
                 @if($mentorando->validacao == 0)
                <tr>
                    <td style="text-align: center; vertical-align: middle">{{$mentorando->id}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$mentorando->name}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$mentorando->username}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{ Str::limit($mentorando->email, 10) }}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$mentorando->contacto_movel}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{ Str::limit($mentorando->ocupacao_profissional,15) }}</td>
                    <td style="text-align: justify; vertical-align: middle">{{ Str::limit($mentorando->ocupacao_profissional_ing, 15) }}</td>
                    <td style="text-align: justify; vertical-align: middle"
                    >@foreach($mentorando -> interesses as $area_interesse) 
                    @if($area_interesse->ativo == 1)
                    {{$area_interesse->area_interesse}} <br></br>
                    @endif
                    @endforeach
                    </td> 
                    <td style="text-align: center; vertical-align: middle"><img src="/img/mentorando/{{$mentorando->fotografia}}" style="width: 75px;"></img></td>
                    <td style="text-align: justify; vertical-align: middle"><a href="{{$mentorando->linkedin}}">{{ Str::limit($mentorando-> linkedin, 15) }}</td>
                    <td style="text-align: center; vertical-align: middle">{{$mentorando->created_at}}</td>
                    <td style="text-align: center; vertical-align: middle">{{$mentorando->updated_at}}</td>
                    <td style="text-align: center; vertical-align: middle">
                    <button class="btn btn-primary text-white" style="width:40px; margin:2px"><a href="/admin/editar_validacao/{{$mentorando->id}}" style="color:white"><i class="fa fa-eye"></i></a></button>
                    <form action="/admin/mentorandos/{{$mentorando->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Pretende apagar o Mentorando &quot {{$mentorando->name}} &quot ?')" type="submit" class="btn  bg-danger text-white" style="width:40px; margin:2px;"><i class="fa fa-trash"></i></button>
                     </form>
                        
                    </td>
                </tr>
                @endif
            @endforeach

            </tbody>
        </table>
        
    </div>
</div>
@endsection