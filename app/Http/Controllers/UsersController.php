<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AreaInteresse;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovoMentor;
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
         
        $mentores= User::role('mentor')->with('interesses')-> get(); 
        
        return view('admin/mentores/admin_mentores', ['mentores' => $mentores]);
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
        
        $interesses = $request->get('area_interesse');
   
        $mentor->interesses()->attach($interesses);
        
        $email = $request->email;

        var_dump($email);

        $data = ([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $password,
            ]);

        Mail::to($email)->send(new NovoMentor($data));

       
        return redirect('/admin/mentores')->with('msg', 'Mentor criado com sucesso!');
    }

    


}