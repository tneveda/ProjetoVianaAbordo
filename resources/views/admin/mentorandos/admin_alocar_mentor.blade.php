@extends('layouts.admin_main')
@section('title', 'Admin - Alocar mentor')

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

<h1 style="font-family: Eczar">Alocar Mentor</h1>



<div class="card-body">

<div>
        @if($pesquisa)
        <form action="/admin/alocar_mentor/{{$mentorandos->id}}" method="GET" class="d-none d-md-inline-block form-inline" style="width: 50%;">
            <div class="input-group">
                <input type="text" id="pesquisa" name="pesquisa" class="form-control" placeholder="Procurar por titulo..." value="{{$pesquisa}}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
                
            </div>
        </form>
        <button class="btn btn-primary" style="margin-top:-5px; margin-left:10px"><a href="/admin/alocar_mentor/{{$mentorandos->id}}" class="text-white">Voltar</a></button>

        @else
        <form action="/admin/alocar_mentor/{{$mentorandos->id}}" method="GET" class="d-none d-md-inline-block form-inline" style="width: 50%;">
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
    <div>
    <form action="/admin/alocar_mentor/{{$mentorandos->id}}" method="GET" style="margin-top: 20px;">
    			<select name="area_interesse" id="area_interesse">
    				<option value="0">Escolhe a Area de Interesse</option>
    				@foreach ($interesses as $interesse)
    					<option value="{{ $interesse->id }}" {{ $interesse->id == $selected_id['id_interesse'] ? 'selected' : '' }}>
    					{{ $interesse['area_interesse'] }}
    				    </option>
    				@endforeach
    			</select>
                <input type="submit" class="btn btn-primary btn-sm" value="Filtrar por Interesse">
	    		</form>
                </div>
    <br>

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead style="text-align: center;">
                <tr>
                <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 102px;" aria-sort="descending">#</th>
                    <th>Titulo</th>
                    <th>Mentor</th>
                    <th>Área de Interesse</th>
                    <th>Descrição</th>
                    <th>Alocação</th>
                </tr>
            </thead>
            <tbody>
            @foreach($mentorias as $mentoria)
                <tr>
                    <td style="text-align: center; vertical-align: middle">{{$mentoria->id}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$mentoria->titulo}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$mentoria->mentores->name}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$mentoria->interesses->area_interesse}}</td>
                    <td style="text-align: justify; vertical-align: middle">{{$mentoria->descricao}}</td>
                    <td style="text-align: center; vertical-align: middle">
                    <button class="btn btn-primary text-white" style="width:40px; margin:2px"><a href="/admin/alocacao/{{$mentorandos->id}}/{{$mentoria->id}}" style="color:white"><i class="fa fa-eye"></i></a></button>
                </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        @if($pesquisa)
        @else
        <div class="d-flex justify-content-center">
            {{$mentorias->links('pagination::bootstrap-4')}}
        </div>
        @endif
        
    </div>
</div>
@endsection