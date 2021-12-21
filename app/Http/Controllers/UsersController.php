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
use App\Mail\RegistoMentorando;
use App\Mail\MentorandoValidado;
use App\Mail\MentorandoRecusado;
use App\Mail\MentorandoApagado;
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


    public function mentorandos(){
         
        $mentorandos= User::role('mentorando')->with('interesses')-> get(); 
        $NotValidated = User::where('validacao','=',0)->get();
        $totalNotValidated = $NotValidated ->count();
        
        return view('admin/mentorandos/admin_mentorandos', ['mentorandos' => $mentorandos, 'totalNotValidated'=> $totalNotValidated]);
    }

    public function criar_mentorandos(){
        $interesse= AreaInteresse::all();
        return view('/auth/registo' , ['interesses' => $interesse]);

    }

    public function store_mentorandos(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name'=>'required|min:3',
            'area_interesse' => 'required',
            
            
        ],
    
    [    'name.required'=>  'Preencha ocampo nome',
         'area_interesse.required'=>  'Escolha pelo menos uma área de interesse',

    ]);
        if ($validator->fails()) {
            return redirect('/registo')
                ->withErrors($validator)
                ->withInput();
        }
        

         
        $mentorando = new User;
        $password= $request->password;
        $hashed_password = Hash::make($password);

        $mentorando -> name = $request->name;
        $mentorando -> username = $request->username;
        $mentorando -> password = $hashed_password;
        $mentorando -> email = $request->email;
        $mentorando -> ocupacao_profissional = $request->ocupacao_profissional;
        $mentorando -> ocupacao_profissional_ing="";
       /* $mentorando -> ocupacao_profissional_ing = $request->ocupacao_profissional_ing;*/
        $mentorando -> linkedin== $request->linkedin;;
        $mentorando -> motivo= $request->motivo;;
        $mentorando -> validacao=0;

        $mentorando->assignRole('mentorando');

        if($request->hasFile('fotografia') && $request->file('fotografia')->isValid()) {

            $requestfotografia = $request->fotografia;

            $extension = $requestfotografia->extension();

            $fotografiaName = md5($requestfotografia->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestfotografia->move(public_path('img/mentorando'), $fotografiaName);

            $mentorando->fotografia = $fotografiaName;

        }

        $mentorando->save();
        
        $interesses = $request->get('area_interesse');
   
        $mentorando->interesses()->attach($interesses);
        
        $email = $request->email;

        $data = ([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $password,
            ]);

        Mail::to($email)->send(new RegistoMentorando($data));


       
        return redirect('/mentoria')->with('msg', 'Pedido de registo realizado com sucesso! Esteja atento ao seu email');

    }


    public function validar_mentorandos(){
        $mentorandos= User::role('mentorando')->with('interesses')-> get(); 
        $interesse= AreaInteresse::all();
        return view('admin/mentorandos/admin_validar_mentorandos' , ['mentorandos'=> $mentorandos, 'interesses' => $interesse]);
    }

    public function editar_validacao($id){
        $mentorandos = User::find($id)->load('interesses');
        return view('admin/mentorandos/admin_editar_validacao_mentorandos', ['mentorandos'=> $mentorandos]);
        
    }

    public function atualizar_validacao(Request $request){

        $data= $request->all();
        User::findOrFail($request->id)->update($data); 

        if($request->validacao == 1){
        
            $mentorandos = User::find($request->id);
           $email = $mentorandos->email;

        $data = ([
            'name' => $mentorandos->name,
            'email' => $email,
            'username' => $mentorandos->username
            ]);

        Mail::to($email)->send(new MentorandoValidado($data));
    }



        return redirect('admin/mentorandos')->with('msg', 'Mentorando atualizado!');
    
    }

   
    public function apagar_mentorando($id){

        $mentorandos = User::find($id);
           $email = $mentorandos->email;

        $data = ([
            'name' => $mentorandos->name,
            'email' => $email,
            'username' => $mentorandos->username
            ]);

        if($mentorandos->validacao == 0){
        Mail::to($email)->send(new MentorandoRecusado($data));
        User::findOrFail($id)->delete(); 

        return redirect('admin/validar_mentorandos')->with('msg', 'Mentorando apagado com sucesso!');
    }
    else {
        Mail::to($email)->send(new MentorandoApagado($data));
        User::findOrFail($id)->delete(); 

        return redirect('admin/mentorandos')->with('msg', 'Mentorando apagado com sucesso!');
    }


       
       
    }




    


}