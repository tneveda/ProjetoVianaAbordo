<?php

namespace App\Http\Controllers;

use App\Models\SobreNos;
use Illuminate\Http\Request;

class AdminSobreNosController extends Controller
{

    /*  Função para apresentar a view do Admin - Sobre Nós onde lista todas as agendas com o limite de 4 linhas na tabela, 
    se exceder as 4 linhas são criadas páginas para percorrer a lista.  
        A variável $sobre_nos guarda a informação respetiva da tabela "sobre_nos".
        Retorna a view 'Admin - Sobre Nós', e passa as variáveis necessárias para serem utilizadas na view.
    */
    public function sobre_nos(){
        $sobre_nos = SobreNos::paginate(4);
        return view('admin/sobre_nos/admin_sobre_nos', ['sobre_noss' => $sobre_nos]);
    }

    /*  Função responsável por renderizar a view Criar Sobre Nós.*/
    public function criar_sobre_nos(){
        return view('admin/sobre_nos/admin_criar_sobre_nos');
    }

    /*  Função responsável por enviar os dados para a Tabela "sobre_nos".
        A variável $sobre_nos é uma nova SobreNos. "SobreNos" é o Model.
        Preenche todos os campos da tabela "sobre_nos" com os valores que vem no request
        Verifica a imagem importada e guarda na pasta "img/sobre_nos" com um nome gerado automaticamente
    através do md5().
        Faz o save() para enviar os dados.
        Redireciona para a view "Admin - Sobre Nós" onde apresenta uma mensagem de sucesso.*/
    public function store(Request $request){
        $sobre_nos = new SobreNos;

        $sobre_nos -> titulo = $request->titulo;
        $sobre_nos -> titulo_en = $request->titulo_en;
        $sobre_nos -> corpo = $request->corpo;
        $sobre_nos -> corpo_en = $request->corpo_en;
        $sobre_nos -> ativo = $request->ativo;

        if($request->hasFile('media') && $request->file('media')->isValid()) {

            $requestMedia = $request->media;

            $extension = $requestMedia->extension();

            $mediaName = md5($requestMedia->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestMedia->move(public_path('img/sobre_nos'), $mediaName);

            $sobre_nos->media = $mediaName;

        }

        $sobre_nos->save();

        return redirect('/admin/sobre_nos')->with('msg', 'Sobre Nós criado com sucesso!');
    }

    /*  Função para abrir a view "Admin - Editar Sobre Nos", onde é passado um $id como parâmetro.
        A variável $sobre_nos guarda o sobre_nos com o $id passado como parâmetro.
        Retorna a view "Admin - Editar Sobre Nos".*/
    public function editar_sobre_nos($id){
        $sobre_nos = SobreNos::findOrFail($id);
        return view('admin/sobre_nos/admin_editar_sobre_nos', ['sobre_nos' => $sobre_nos]);
    }

    
    /*  Função para atualizar os dados do sobre_nos .
        A variável $data guarda todos os valores passados no request.
        É atualizado o sobre_nos com o $id passado através do request.
        Retorna a view "Admin - Sobre Nos" onde apresenta uma mensagem de sucesso.*/
    public function atualizar_sobre_nos(Request $request){

        $data = $request->all();

        if($request->hasFile('media') && $request->file('media')->isValid()) {

            $requestMedia = $request->media;

            $extension = $requestMedia->extension();

            $mediaName = md5($requestMedia->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestMedia->move(public_path('img/sobre_nos'), $mediaName);

            $data['media'] = $mediaName;

        }

        SobreNos::findOrFail($request->id)->update($data);
        return redirect('admin/sobre_nos')->with('msg', 'Sobre Nós atualizado com sucesso!');
    }

    /*  Função para apagar o sobre_nos .
        É apagado o sobre_nos com o $id passado pelo request.
        Retorna a view "Admin - Sobre Nos" onde apresenta uma mensagem de sucesso.*/
    public function apagar_sobre_nos($id){
        SobreNos::findOrFail($id)->delete();
        return redirect('admin/sobre_nos')->with('msg', 'Sobre Nós apagado com sucesso!');
    }
}
