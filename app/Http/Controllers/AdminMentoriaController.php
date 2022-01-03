<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentoria;
use App\Models\User;
use App\Models\AreaInteresse;
use Validator; 

class AdminMentoriaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:mentoria-list|post-create|post-edit|post-mentoria', ['only' => ['mentoria']]);
        $this->middleware('permission:mentoria-create', ['only' => ['criar_mentoria', 'store']]);
        $this->middleware('permission:mentoria-edit', ['only' => [ 'editar_mentoria', 'atualizar_mentoria']]);
        $this->middleware('permission:mentoria-delete', ['only' => ['apagar_mentoria']]);
    }


    public function mentorias(){
        $mentorias = Mentoria::all();
    
   return view('admin/mentorias/admin_mentorias', ['mentorias' => $mentorias]);
    }

    public function criar_mentorias(){
    
     
    $mentores = User::role('mentor')->get();
    $interesses = AreaInteresse::all();
   
    
   return view('admin/mentorias/admin_criar_mentorias', ['mentores' => $mentores, 'interesses'=> $interesses]);
    }

   /* public function getInteresses(){
        $interesses = AreaInteresse::
    }*/


    public function store(Request $request){
       /* $validator = Validator::make($request->all(), [
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
        */

         
        $mentoria = new Mentoria;
        

        $mentoria -> titulo = $request->titulo;
        $mentoria -> titulo_en = $request->titulo_en;
        $mentoria -> id_mentor = $request->mentor;
        $mentoria -> descricao= $request->descricao;
        $mentoria -> descricao_en = $request->descricao_en;
        $mentoria -> id_Interesse = $request->area_interesse;
        

        
 if (Mentoria::where('id_mentor', $request->mentor)->where('id_interesse',$request->area_interesse)->exists()) {
                
           
          return redirect()->back()->with('msg', 'Mentoria não foi gravada O Mentor escolhido já tem uma mentoria da mesma área de interesse!');


        }

        else{
        $mentor = User::findOrFail($request->mentor)->load('interesses');
        
        
     /*   $email = $request->email;

        $data = ([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $password,
            ]);

        Mail::to($email)->send(new NovoMentor($data));*/
        $mentoria->save();


       
        return redirect('/admin/mentorias')->with('msg', 'Mentoria criado com sucesso!');
    }
         }

         



         public function editar_mentorias($id){
            $mentorias = Mentoria::findOrFail($id);
            return view('admin/mentorias/admin_editar_mentorias', ['mentorias'=> $mentorias]);
            
         }
    
         public function atualizar_mentorias(Request $request){
        
            $data = $request->all();
            
    
            Mentoria::findOrFail($request->id)->update($data);
    
            
            /*$email = $request->email;
    
            $data = ([
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                ]);
    
            Mail::to($email)->send(new EditarPerfil($data));*/
    
    
    
    
            return redirect('admin/mentorias')->with('msg', 'Mentoria atualizada com sucesso!');
           
         }
    
         public function apagar_mentorias($id){
            Mentoria::findOrFail($id)->delete();  
            return redirect('admin/mentorias')->with('msg', 'Mentoria apagada com sucesso!');
           
        }
}
