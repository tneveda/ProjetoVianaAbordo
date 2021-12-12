<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;

class AdminPessoaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:pessoa-list|post-create|post-edit|post-delete', ['only' => ['pessoa']]);
        $this->middleware('permission:pessoa-create', ['only' => ['criar_pessoa', 'store']]);
        $this->middleware('permission:pessoa-edit', ['only' => [ 'editar_pessoa', 'atualizar_pessoa']]);
        $this->middleware('permission:pessoa-delete', ['only' => ['apagar_pessoa']]);
    }

    /*  Função para apresentar a view da Admin - Pessoa onde lista todas as Pessoas com o limite de 4 linhas na tabela, 
    se exceder as 4 linhas são criadas páginas para percorrer a lista. 
        A variável $pesquisa guarda o conteúdo que vem do request do formulário da pesquisa. 
    É feita a verificação da variável $pesquisa, se existir apresentar apenas a Pessoa correspondente 
    ao que foi escrito na campo de pesquisa, caso não exista apresenta a tabela com todas a Pessoas. 
        Retorna a view 'Admin - Pessoa', e passa as variáveis necessárias para serem utilizadas na view.
    */
    public function pessoa(){

        $pesquisa = request('pesquisa');

        if($pesquisa){
            $pessoa = Pessoa::where([
                ['nome', 'like', '%'.$pesquisa.'%']
            ])->get();
        }else{
            $pessoa = Pessoa::paginate(4);
        }
       
        return view('admin/pessoa/admin_pessoa', ['pessoas' => $pessoa, 'pesquisa' => $pesquisa]);
    }

    /*  Função responsável por renderizar a view Criar Pessoa.*/
    public function criar_pessoa(){
        return view('admin/pessoa/admin_criar_pessoa');
    }

    /*  Função responsável por enviar os dados para a Tabela "pessoa".
        A variável $pessoa é uma nova Pessoa. "Pessoa" é o Model.
        Preenche todos os campos da tabela "pessoa" com os valores que vem no request
        Verifica a imagem importada e guarda na pasta "img/pessoa" com um nome gerado automaticamente
    através do md5().
        Faz o save() para enviar os dados.
        Redireciona para a view "Admin-Pessoa" onde apresenta uma mensagem de sucesso.*/
    public function store(Request $request){
        $pessoa = new Pessoa;

        $pessoa -> nome = $request->nome;
        $pessoa -> descricao = $request->descricao;
        $pessoa -> descricao_en = $request->descricao_en;
        $pessoa -> email = $request->email;
        $pessoa -> telemovel = $request->telemovel;
        $pessoa -> cidade = $request->cidade;
        $pessoa -> profissao = $request->profissao;
        $pessoa -> profissao_en = $request->profissao_en;
        $pessoa -> empresa = $request->empresa;
        $pessoa -> ativo = $request->ativo;

        if($request->hasFile('fotografia') && $request->file('fotografia')->isValid()) {

            $requestfotografia = $request->fotografia;

            $extension = $requestfotografia->extension();

            $fotografiaName = md5($requestfotografia->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestfotografia->move(public_path('img/pessoa'), $fotografiaName);

            $pessoa->fotografia = $fotografiaName;

        }

        $pessoa->save();

        return redirect('/admin/pessoa')->with('msg', 'Pessoa criada com sucesso!');
    }

    /*  Função para abrir a view "Admin - Editar Pessoa", onde é passado um $id como parâmetro.
        A variável $pessoa guarda a Pessoa com o $id passado como parâmetro. 
        Retorna a view "Admin - Editar Pessoa".*/
    public function editar_pessoa($id){
        $pessoa = Pessoa::findOrFail($id);
        return view('admin/pessoa/admin_editar_pessoa', ['pessoa' => $pessoa]);
    }

    /*  Função para atualizar os dados da pessoa .
        A variável $data guarda todos os valores passados no request.
        É atualizada a pessoa com o $id passado através do request.
        Retorna a view "Admin - pessoa" onde apresenta uma mensagem de sucesso.*/
    public function atualizar_pessoa(Request $request){

        $data = $request->all();

        if($request->hasFile('fotografia') && $request->file('fotografia')->isValid()) {

            $requestfotografia = $request->fotografia;

            $extension = $requestfotografia->extension();

            $fotografiaName = md5($requestfotografia->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestfotografia->move(public_path('img/pessoa'), $fotografiaName);

            $data['fotografia'] = $fotografiaName;

        }

        Pessoa::findOrFail($request->id)->update($data);
        return redirect('admin/pessoa')->with('msg', 'Pessoa atualizada com sucesso!');
    }

    /*  Função para apagar a pessoa.
        É apagada a pessoacom o $id passado pelo request.
        Retorna a view "Admin - pessoa onde apresenta uma mensagem de sucesso.*/
    public function apagar_pessoa($id){
        Pessoa::findOrFail($id)->delete();
        return redirect('admin/pessoa')->with('msg', 'Pessoa apagada com sucesso!');
    }
}
