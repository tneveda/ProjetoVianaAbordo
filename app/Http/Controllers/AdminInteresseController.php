<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreaInteresse;


class AdminInteresseController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:area_interesse-list|post-create|post-edit|post-delete', ['only' => ['area_interesse']]);
        $this->middleware('permission:area_interesse-create', ['only' => ['criar_area_interesse', 'store']]);
        $this->middleware('permission:area_interesse-edit', ['only' => [ 'editar_area_interesse', 'atualizar_area_interesse']]);
        $this->middleware('permission:area_interesse-delete', ['only' => ['apagar_area_interesse']]);
    }


    public function area_interesse(){
        $area_interesse = AreaInteresse::paginate(4);
        return view('admin/area_interesse/admin_area_interesse', ['areasInteresse' => $area_interesse]);
    }


    public function criar_area_interesse(){
        return view('admin/area_interesse/admin_criar_area_interesse');
    }

    public function store(Request $request){
        $area_interesse = new AreaInteresse;

        $area_interesse -> area_interesse = $request->nome;
        $area_interesse -> area_interesse_ing = $request->nome_ing;
       

        $area_interesse->save();

        return redirect('/admin/area_interesse')->with('msg', 'Area de Interesse criada com sucesso!');
    }

    public function editar_area_interesse($id){
        $area_interesse = AreaInteresse::findOrFail($id);
        return view('admin/area_interesse/admin_editar_area_interesse', ['area_interesse' => $area_interesse]);
    }

    public function atualizar_area_interesse(Request $request){

        $data = $request->all();

        AreaInteresse::findOrFail($request->id)->update($data);
        return redirect('admin/area_interesse')->with('msg', 'Área de Interesse atualizada com sucesso!');

        }


        public function apagar_area_interesse($id){
            AreaInteresse::findOrFail($id)->delete();
            return redirect('admin/area_interesse')->with('msg', 'Area de Interesse apagada com sucesso!');
        }




}