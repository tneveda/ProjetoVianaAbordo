<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testemunhos;

class AdminTestemunhosController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:testemunhos-list|post-create|post-edit|post-delete', ['only' => ['testemunhos']]);
        $this->middleware('permission:testemunhos-create', ['only' => ['criar_testemunhos', 'store']]);
        $this->middleware('permission:testemunhos-edit', ['only' => [ 'editar_testemunhos', 'atualizar_testemunhos']]);
        $this->middleware('permission:testemunhos-delete', ['only' => ['apagar_testemunhos']]);
    }

    /*  Função para apresentar a view do Admin - Testemunhos onde lista todas as agendas com o limite de 4 linhas na tabela, 
    se exceder as 4 linhas são criadas páginas para percorrer a lista.  
        A variável $testemunhos guarda a informação respetiva da tabela "testemunhos".
        Retorna a view 'Admin - Testemunhos', e passa as variáveis necessárias para serem utilizadas na view.
    */
    public function testemunhos(){
        $testemunhos = Testemunhos::paginate(4);
        return view('admin/testemunhos/admin_testemunhos', ['testemunhoss' => $testemunhos]);
    }

    /*  Função responsável por renderizar a view Criar Testemunho.*/
    public function criar_testemunhos(){
        return view('admin/testemunhos/admin_criar_testemunhos');
    }


    /*  Função responsável por enviar os dados para a Tabela "testemunho".
        A variável $testemunho é uma nova Testemunho. "Testemunho" é o Model.
        Preenche todos os campos da tabela "testemunho" com os valores que vem no request
        Faz o save() para enviar os dados.
        Redireciona para a view "Admin - testemunho" onde apresenta uma mensagem de sucesso.*/
    public function store(Request $request){
        $testemunhos = new Testemunhos;

        $testemunhos -> nome = $request->nome;
        $testemunhos -> testemunho = $request->testemunho;
        $testemunhos -> testemunho_en = $request->testemunho_en;
        $testemunhos -> profissao = $request->profissao;
        $testemunhos -> profissao_en = $request->profissao_en;
        $testemunhos -> ativo = $request->ativo;


        $testemunhos->save();

        return redirect('/admin/testemunhos')->with('msg', 'Testemunho criado com sucesso!');
    }

    /*  Função para abrir a view "Admin - Editar Testemunho", onde é passado um $id como parâmetro.
        A variável $testemunhos guarda o testemunho com o $id passado como parâmetro.
        Retorna a view "Admin - Editar Testemunho".*/
    public function editar_testemunhos($id){
        $testemunhos = Testemunhos::findOrFail($id);
        return view('admin/testemunhos/admin_editar_testemunhos', ['testemunhos' => $testemunhos]);
    }

    /*  Função para atualizar os dados do testemunhoS .
        A variável $data guarda todos os valores passados no request.
        É atualizado o testemunhoS com o $id passado através do request.
        Retorna a view "Admin - Testemunhos" onde apresenta uma mensagem de sucesso.*/
    public function atualizar_testemunhos(Request $request){

        $data = $request->all();

        Testemunhos::findOrFail($request->id)->update($data);
        return redirect('admin/testemunhos')->with('msg', 'Testemunho atualizado com sucesso!');
    }

    /*  Função para apagar o testemunho .
        É apagado o testemunho com o $id passado pelo request.
        Retorna a view "Admin - Testemunhos" onde apresenta uma mensagem de sucesso.*/
    public function apagar_testemunhos($id){
        Testemunhos::findOrFail($id)->delete();
        return redirect('admin/testemunhos')->with('msg', 'Testemunho apagado com sucesso!');
    }
}
