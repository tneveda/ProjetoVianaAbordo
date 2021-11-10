<?php

namespace App\Http\Controllers;

use App\Models\RedesSociais;
use Illuminate\Http\Request;

class AdminRedesSociaisController extends Controller
{
    /*  Função para apresentar a view do Admin - Redes Sociais onde lista todas as agendas com o limite de 4 linhas na tabela, 
    se exceder as 4 linhas são criadas páginas para percorrer a lista.  
        A variável $redes_sociais guarda a informação respetiva da tabela "redes_sociais".
        Retorna a view 'Admin - Redes Sociais', e passa as variáveis necessárias para serem utilizadas na view.
    */
    public function redes_sociais(){
        $redes_sociais = RedesSociais::paginate(4);
        return view('admin/redes_sociais/admin_redes_sociais', ['redes_sociais' => $redes_sociais]);
    }

    /*  Função responsável por renderizar a view Criar Redes Sociais.*/
    public function criar_redes_sociais(){
        return view('admin/redes_sociais/admin_criar_redes_sociais');
    }

    /*  Função responsável por enviar os dados para a Tabela "redes_sociais".
        A variável $redes_sociais é uma nova RedesSociais. "RedesSociais" é o Model.
        Preenche todos os campos da tabela "redes_sociais" com os valores que vem no request
        Faz o save() para enviar os dados.
        Redireciona para a view "Admin - Redes Sociais" onde apresenta uma mensagem de sucesso.*/
    public function store(Request $request){
        $redes_sociais = new RedesSociais;

        $redes_sociais -> nome = $request->nome;
        $redes_sociais -> ligacao = $request->ligacao;
        $redes_sociais -> icone = $request->icone;

        $redes_sociais->save();

        return redirect('/admin/redes_sociais')->with('msg', 'Rede Social criada com sucesso!');
    }

    /*  Função para abrir a view "Admin - Editar Redes Sociais", onde é passado um $id como parâmetro.
        A variável $redes_sociais guarda o Redes Sociais com o $id passado como parâmetro.
        Retorna a view "Admin - Editar Redes Sociais".*/
    public function editar_redes_sociais($id){
        $redes_sociais = RedesSociais::findOrFail($id);
        return view('admin/redes_sociais/admin_editar_redes_sociais', ['redes_sociais' => $redes_sociais]);
    }

    /*  Função para atualizar os dados da redes_sociais .
        A variável $data guarda todos os valores passados no request.
        É atualizada a redes_sociais com o $id passado através do request.
        Retorna a view "Admin - Redes Sociais" onde apresenta uma mensagem de sucesso.*/
    public function atualizar_redes_sociais(Request $request){

        $data = $request->all();


        RedesSociais::findOrFail($request->id)->update($data);
        return redirect('admin/redes_sociais')->with('msg', 'Rede Social atualizada com sucesso!');
    }

    /*  Função para apagar a redes_sociais .
        É apagado a redes_sociais com o $id passado pelo request.
        Retorna a view "Admin - Redes Sociais" onde apresenta uma mensagem de sucesso.*/
    public function apagar_redes_sociais($id){
        RedesSociais::findOrFail($id)->delete();
        return redirect('admin/redes_sociais')->with('msg', 'Rede Social apagada com sucesso!');
    }
}
