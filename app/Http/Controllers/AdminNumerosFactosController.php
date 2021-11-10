<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Numeros_Factos;

class AdminNumerosFactosController extends Controller
{

    /*  Função para apresentar a view da Admin - Numeros e Factos onde lista todas os Numeros e Factoss com o limite de 4 linhas na tabela, 
    se exceder as 4 linhas são criadas páginas para percorrer a lista. 
        A variável $numeros_factos guarda todos os Numeros e Factos.
        Retorna a view 'Admin - Numeros e Factos', e passa as variáveis necessárias para serem utilizadas na view.
    */
    public function numeros_factos(){
        $numeros_factos = Numeros_Factos::paginate(4);
        return view('admin/numeros_factos/admin_numeros_factos', ['numeros_factos' => $numeros_factos]);
    }

    /*  Função responsável por renderizar a view Criar Numeros e Factos.*/
    public function criar_numeros_factos(){
        return view('admin/numeros_factos/admin_criar_numeros_factos');
    }

    /*  Função responsável por enviar os dados para a Tabela "numeros_factos".
        A variável $numeros_factos é uma nova Numeros_Factos. "Numeros_Factos" é o Model.
        Preenche todos os campos da tabela "numeros_factos" com os valores que vem no request
        Verifica a imagem importada e guarda na pasta "img/numeros_factos" com um nome gerado automaticamente
    através do md5().
        Faz o save() para enviar os dados.
        Redireciona para a view "Admin- Numeros e Factos" onde apresenta uma mensagem de sucesso.*/
    public function store(Request $request){
        $numeros_factos = new Numeros_Factos;

        $numeros_factos -> nome = $request->nome;
        $numeros_factos -> nome_en = $request->nome_en;
        $numeros_factos -> numero = $request->numero;
        $numeros_factos -> ativo = $request->ativo;

        if($request->hasFile('icone') && $request->file('icone')->isValid()) {

            $requestIcone = $request->icone;

            $extension = $requestIcone->extension();

            $iconeName = md5($requestIcone->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestIcone->move(public_path('img/numeros_factos'), $iconeName);

            $numeros_factos->icone = $iconeName;

        }

        $numeros_factos->save();

        return redirect('/admin/numeros_factos')->with('msg', 'Números e Factos criados com sucesso!');
    }

    /*  Função para abrir a view "Admin - Editar Numeros Factos", onde é passado um $id como parâmetro.
        A variável $numeros_factos guarda a numeros_factos com o $id passado como parâmetro.
        Retorna a view "Admin - Editar Numeros Factos".*/
    public function editar_numeros_factos($id){
        $numeros_factos = Numeros_Factos::findOrFail($id);
        return view('admin/numeros_factos/admin_editar_numeros_factos', ['numeros_factos' => $numeros_factos]);
    }

    /*  Função para atualizar os dados dos numeros_factos .
        A variável $data guarda todos os valores passados no request.
        É atualizado o numeros_factos com o $id passado através do request.
        Retorna a view "Admin - Numeros Factos" onde apresenta uma mensagem de sucesso.*/
    public function atualizar_numeros_factos(Request $request){

        $data = $request->all();

        if($request->hasFile('icone') && $request->file('icone')->isValid()) {

            $requestIcone = $request->media;

            $extension = $requestIcone->extension();

            $iconeName = md5($requestIcone->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestIcone->move(public_path('img/numeros_factos'), $iconeName);

            $data['icone'] = $iconeName;

        }

        Numeros_Factos::findOrFail($request->id)->update($data);
        return redirect('admin/numeros_factos')->with('msg', 'Números e Factos atualizados com sucesso!');
    }

    /*  Função para apagar o numeros_factos .
        É apagada o numeros_factos com o $id passado pelo request.
        Retorna a view "Admin - Numeros Factos" onde apresenta uma mensagem de sucesso.*/
    public function apagar_numeros_factos($id){
        Numeros_Factos::findOrFail($id)->delete();
        return redirect('admin/numeros_factos')->with('msg', 'Números e Factos apagados com sucesso!');
    }
}
