<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AreaInteresse;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovoMentor;
use App\Mail\EditarPerfil;
use DB;
use App\Quotation;
use Str;
use Validator; 

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


        $validator = Validator::make($request->all(), [
            'name'=>'required|min:3',
            'area_interesse' => 'required',
            
            
        ],
    
    [    'name.required'=>  'Preencha ocampo nome',
         'area_interesse.required'=>  'Escolha pelo menos uma área de interesse',

    ]);
        if ($validator->fails()) {
            return redirect('/admin/criar_mentores')
                ->withErrors($validator)
                ->withInput();
        }
        

         
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

        $data = ([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $password,
            ]);

        Mail::to($email)->send(new NovoMentor($data));


       
        return redirect('/admin/mentores')->with('msg', 'Mentor criado com sucesso!');
    }

    
    public function editar_mentores($id){
        $mentores = User::find($id)->load('interesses');
        $interesses= AreaInteresse::get();
        return view('admin/mentores/admin_editar_mentores', ['mentores'=> $mentores, 'interesses' => $interesses]);
        
     }

     public function atualizar_mentores(Request $request, $id){
    
        $data = $request->all();
        

        User::findOrFail($request->id)->update($data);

        $mentores = User::find($id)->load('interesses');
        $interesses = $request->get('area_interesse');  
        $mentores->interesses()->sync($interesses);


        $email = $request->email;

        $data = ([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            ]);

        Mail::to($email)->send(new EditarPerfil($data));




        return redirect('admin/mentores')->with('msg', 'Mentor atualizado com sucesso!');
       
     }

     public function apagar_mentores($id){
        User::findOrFail($id)->delete();  
        return redirect('admin/mentores')->with('msg', 'Mentor apagado com sucesso!');
       
    }




    


}