<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contactos;
use App\Models\RedesSociais;
use Lang;

class MentoriaController extends Controller
{

    /*  Função responsável pela renderização da view da Comunidade.
        $pesquisa guarda o request que vem do formulário da pesquisa.
            Se houver $pesquisa lista a pessoa com o nome da pesquisa, 
            caso não haja lista todas as pessoas
        $pessoa guarda os dados da Pessoa.
        $pessoaProfissao guarda da string de tradução.
        $pessoaDescricao guarda da string de tradução.
        $contactos guarda os contactos para apresentar no footer
        $redes_sociais guarda as redes sociais para apresentar no footer
        Retorna a view Comunidade com as respetivas variáveis necessárias*/
    public function index(){

        $pesquisa = request('pesquisa');
        
        if($pesquisa){
            $mentores = User::role('mentor') ->where([
                ['name', 'like', '%'.$pesquisa.'%']
            ])->get();
        }else{
            $mentores = User::role('mentor')->get();;
        }

        $mentorOcupacaoProfissional = Lang::get('message.PessoaProfissao');
        $mentorAreaInteresse = Lang::get('message.PessoaDescricao');
        
        $contactos = Contactos::all();
        $redes_sociais = RedesSociais::all();
        return view('mentoria', [ 'mentores' => $mentores, 
                                    'contactos' => $contactos, 
                                    'redes_sociais' => $redes_sociais,
                                    'mentorOcupacaoProfissional' => $mentorOcupacaoProfissional,
                                    'mentorAreaInteresse' => $mentorAreaInteresse,
                                    'pesquisa' => $pesquisa]);
    }


    /*  Função responsável pela renderização da view de Ver Pessoa.
        $pessoaProfissao guarda da string de tradução.
        $pessoaDescricao guarda da string de tradução.
        $pessoa guarda os dados da Pessoa.
        $contactos guarda os contactos para apresentar no footer
        $redes_sociais guarda as redes sociais para apresentar no footer
        Retorna a view Ver Pessoa com as respetivas variáveis necessárias*/
    public function ver_mentor($id){
        $mentorOcupacaoProfissional = Lang::get('message.PessoaProfissao');
        $mentorAreaInteresse = Lang::get('message.PessoaDescricao');
        $mentor = User::findOrFail($id);
        $contactos = Contactos::all();
        $redes_sociais = RedesSociais::all();

        return view('mentor/ver_mentor', [  'mentor' => $mentor, 
                                            'contactos' => $contactos, 
                                            'redes_sociais' => $redes_sociais,
                                            'ocupacao_profissional' => $mentorOcupacaoProfissional,
                                            ]);
    }
}
