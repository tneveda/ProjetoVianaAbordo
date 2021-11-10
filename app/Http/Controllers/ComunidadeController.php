<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use App\Models\Contactos;
use App\Models\RedesSociais;
use Lang;

class ComunidadeController extends Controller
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
            $pessoa = Pessoa::where([
                ['nome', 'like', '%'.$pesquisa.'%']
            ])->get();
        }else{
            $pessoa = Pessoa::all()->where("ativo", "=", "1");
        }

        $pessoaProfissao = Lang::get('message.PessoaProfissao');
        $pessoaDescricao = Lang::get('message.PessoaDescricao');
        
        $contactos = Contactos::all();
        $redes_sociais = RedesSociais::all();
        return view('comunidade', [ 'pessoa' => $pessoa, 
                                    'contactos' => $contactos, 
                                    'redes_sociais' => $redes_sociais,
                                    'pessoaProfissao' => $pessoaProfissao,
                                    'pessoaDescricao' => $pessoaDescricao,
                                    'pesquisa' => $pesquisa]);
    }


    /*  Função responsável pela renderização da view de Ver Pessoa.
        $pessoaProfissao guarda da string de tradução.
        $pessoaDescricao guarda da string de tradução.
        $pessoa guarda os dados da Pessoa.
        $contactos guarda os contactos para apresentar no footer
        $redes_sociais guarda as redes sociais para apresentar no footer
        Retorna a view Ver Pessoa com as respetivas variáveis necessárias*/
    public function ver_pessoa($id){
        $pessoaProfissao = Lang::get('message.PessoaProfissao');
        $pessoaDescricao = Lang::get('message.PessoaDescricao');
        $pessoa = Pessoa::findOrFail($id);
        $contactos = Contactos::all();
        $redes_sociais = RedesSociais::all();

        return view('pessoa/ver_pessoa', [  'pessoa' => $pessoa, 
                                            'contactos' => $contactos, 
                                            'redes_sociais' => $redes_sociais,
                                            'pessoaProfissao' => $pessoaProfissao,
                                            'pessoaDescricao' => $pessoaDescricao]);
    }
}
