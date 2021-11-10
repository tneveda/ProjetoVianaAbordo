<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Pessoa;
use App\Models\GaleriaAgenda;

class AdminAgendaController extends Controller
{
    /*  Função para apresentar a view da Admin - Agenda onde lista todas as agendas com o limite de 4 linhas na tabela, 
    se exceder as 4 linhas são criadas páginas para percorrer a lista. 
        A variável $pesquisa guarda o conteúdo que vem do request do formulário da pesquisa. 
    É feita a verificação da variável $pesquisa, se existir apresentar apenas a agenda correspondente 
    ao que foi escrito na campo de pesquisa, caso não exista apresenta a tabela com todas a agendas. 
        A variável $pessoa guarda todas as Pessoas.
        Retorna a view 'Admin - Agenda', e passa as variáveis necessárias para serem utilizadas na view.
    */
    public function agenda(){
        
        $pesquisa = request('pesquisa');

        if($pesquisa){
            $agenda = Agenda::where([
                ['nome', 'like', '%'.$pesquisa.'%']
            ])->get();
        }else{
            $agenda = Agenda::simplePaginate(4);
        }

        $pessoa = Pessoa::all();
        return view('admin/agenda/admin_agenda', ['agendas' => $agenda, 'pessoa' => $pessoa, 'pesquisa' => $pesquisa]);
    }

    /*  Função responsável por renderizar a view Criar Agenda.
        A variável $pessoa guarda todas as Pessoas*/
    public function criar_agenda(){
        $pessoa = Pessoa::all();
        return view('admin/agenda/admin_criar_agenda', ['pessoa' => $pessoa]);
    }

    /*  Função responsável por enviar os dados para a Tabela "agenda".
        A variável $agenda é uma nova Agenda. "Agenda" é o Model.
        Preenche todos os campos da tabela "agenda" com os valores que vem no request
        Verifica a imagem importada e guarda na pasta "img/agenda" com um nome gerado automaticamente
    através do md5().
        Faz o save() para enviar os dados.
        Redireciona para a view "Admin-Agenda" onde apresenta uma mensagem de sucesso.*/
    public function store(Request $request){
        $agenda = new Agenda;

        $agenda -> nome = $request->nome;
        $agenda -> orador = $request->orador;
        $agenda -> descricao = $request->descricao;
        $agenda -> local = $request->local;
        $agenda -> coordenadas = $request->coordenadas;
        $agenda -> data = $request->data;
        $agenda -> cidade = $request->cidade;
        $agenda -> lotacao = $request->lotacao;
        $agenda -> destaque = $request->destaque;
        $agenda -> ativo = $request->ativo;

        if($request->hasFile('cartaz') && $request->file('cartaz')->isValid()) {

            $requestcartaz = $request->cartaz;

            $extension = $requestcartaz->extension();

            $cartazName = md5($requestcartaz->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestcartaz->move(public_path('img/agenda'), $cartazName);

            $agenda->cartaz = $cartazName;

        }

        $agenda->save();

        return redirect('/admin/agenda')->with('msg', 'Agenda criada com sucesso!');
    }

    /*  Função para abrir a view "Admin - Editar Agenda", onde é passado um $id como parâmetro.
        A variável $agenda guarda a agenda com o $id passado como parâmetro.
        A variável $pessoa guarda todas as Pessoas. 
        Retorna a view "Admin - Editar Agenda".*/
    public function editar_agenda($id){
        $agenda = Agenda::findOrFail($id);
        $pessoa = Pessoa::all();
        return view('admin/agenda/admin_editar_agenda', ['agenda' => $agenda, 'pessoa' => $pessoa]);
    }

    /*  Função para atualizar os dados da agenda .
        A variável $data guarda todos os valores passados no request.
        É atualizada a agenda com o $id passado através do request.
        Retorna a view "Admin - Agenda" onde apresenta uma mensagem de sucesso.*/
    public function atualizar_agenda(Request $request){

        $data = $request->all();

        if($request->hasFile('cartaz') && $request->file('cartaz')->isValid()) {

            $requestcartaz = $request->cartaz;

            $extension = $requestcartaz->extension();

            $cartazName = md5($requestcartaz->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestcartaz->move(public_path('img/agenda'), $cartazName);

            $data['cartaz'] = $cartazName;

        }

        Agenda::findOrFail($request->id)->update($data);
        return redirect('admin/agenda')->with('msg', 'Agenda atualizada com sucesso!');
    }

    /*  Função para apagar a agenda .
        É apagada a agenda com o $id passado pelo request.
        Retorna a view "Admin - Agenda" onde apresenta uma mensagem de sucesso.*/
    public function apagar_agenda($id){
        GaleriaAgenda::where('id_agenda', $id)->delete();
        Agenda::findOrFail($id)->delete();
        return redirect('admin/agenda')->with('msg', 'Agenda apagada com sucesso!');
    }

    /*GALERIA*/

    /*  Função para apresentar a view da Galeria da Agenda onde lista todas as imagens 
    com o limite de 6 linhas na tabela, se exceder as 4 linhas são criadas páginas para percorrer a lista. 
        Retorna a view 'Admin - Galeria Agenda', e passa as variáveis necessárias para serem utilizadas na view.
    */
    public function galeria_agenda(){
        $galeria = GaleriaAgenda::paginate(6);
        return view('admin/agenda/admin_galeria_agenda', ['galerias' => $galeria]);
    }

    /*  Função responsável por renderizar a view Criar Galeria Agenda.*/
    public function adicionar_galeria_agenda($id){
        $agenda = Agenda::findOrFail($id);
        return view('admin/agenda/admin_adicionar_galeria_agenda', ['agenda' => $agenda]);
    }

    /*  Função responsável por enviar os dados para a Tabela "galeria_agenda".
        A variável $galeriaagenda é uma nova GaleriaAgenda. "GaleriaAgenda" é o Model.
        Preenche todos os campos da tabela "galeria_agenda" com os valores que vem no request
        Verifica a imagem importada e guarda na pasta "img/agenda" com um nome gerado automaticamente
    através do md5().
        Faz o save() para enviar os dados.
        Redireciona para a view "Admin-Galeria Agenda" onde apresenta uma mensagem de sucesso.*/
    public function store_galeria(Request $request, $id){
        $galeriaagenda = new GaleriaAgenda;

        $galeriaagenda -> descricao = $request->descricao;
        $galeriaagenda -> id_agenda = $id;

        if($request->hasFile('media') && $request->file('media')->isValid()) {

            $requestMedia = $request->media;

            $extension = $requestMedia->extension();

            $mediaName = md5($requestMedia->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestMedia->move(public_path('img/galeria_agenda'), $mediaName);

            $galeriaagenda->media = $mediaName;

        }

        $galeriaagenda->save();

        return redirect('/admin/galeria_agenda')->with('msg', 'Imagem inserida com sucesso!');
    }

    /*  Função para apagar uma imagem da galeria agenda .
        É apagada a imagem com o id passado pelo request.
        Retorna a view "Admin - Galeria Agenda" onde apresenta uma mensagem de sucesso.*/
    public function apagar_galeria_agenda($id){
        GaleriaAgenda::findOrFail($id)->delete();
        return redirect('admin/galeria_agenda')->with('msg', 'Imagem apagada com sucesso!');
    }
}