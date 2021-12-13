<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AreaInteresse;
use App\Models\UtilizadorInteresse;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Str;

class UsersController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:mentores-list|post-create|post-edit|post-delete', ['only' => ['mentores']]);
         $this->middleware('permission:mentores-create', ['only' => ['criar_mentores', 'store']]);
         $this->middleware('permission:mentores-edit', ['only' => [ 'editar_mentores','atualizar_mentores']]);
         $this->middleware('permission:mentores-delete', ['only' => ['apagar_mentores']]);
    }


    public function mentores(){
        $mentores= User::role('mentor')->get();
        $area_interesse = DB::table('area_interesse')
        ->join('utilizador_interesse', 'area_interesse.id', '=', 'utilizador_interesse.id_interesse')
        ->join('users', 'users.id', '=', 'utilizador_interesse.id_utilizador')
        ->select('area_interesse')
        ->get();
        return view('admin/mentores/admin_mentores', ['mentores' => $mentores, 'area_interesse' => $area_interesse]);
    }

    public function criar_mentores(){
       $interesse= AreaInteresse::all();
        return view('admin/mentores/admin_criar_mentores' , ['interesses' => $interesse]);
    }

    public function store(Request $request){
        $mentor = new User;
        $password= Str::random(8);
        $hashed_password = Hash::make($password);

        $mentor -> name = $request->name;
        $mentor -> username = $request->username;
        $mentor -> password = $hashed_password;
        $mentor -> email = $request->email;
        $mentor -> ocupacao_profissional = $request->ocupacao_profissional;
        $mentor -> ocupacao_profissional_ing = $request->ocupacao_profissional_ing;
        $mentor -> fotografia="";
        $mentor -> linkedin="";
        $mentor -> motivo="";
        $mentor -> validacao=1;

        $mentor->assignRole('mentor');


        $mentor->save();
       
        

        return redirect('/admin/mentores')->with('msg', 'Mentor criado com sucesso!');
    }

    


}