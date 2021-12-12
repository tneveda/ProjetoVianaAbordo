<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\GaleriaNoticia;

class AdminNoticiasController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:noticias-list|post-create|post-edit|post-delete', ['only' => ['noticias']]);
        $this->middleware('permission:noticias-create', ['only' => ['criar_noticias', 'store']]);
        $this->middleware('permission:noticias-edit', ['only' => [ 'editar_noticias', 'atualizar_noticias']]);
        $this->middleware('permission:noticias-delete', ['only' => ['apagar_noticias']]);
        $this->middleware('permission:galeria_noticias-list|post-create|post-edit|post-delete', ['only' => ['galeria_noticias']]);
        $this->middleware('permission:galeria_noticias-create', ['only' => ['criar_galeria_noticia', 'store_galeria']]);
        $this->middleware('permission:galeria_noticias-delete', ['only' => ['apagar_galeria_noticia']]);
    }

    /*  Função para apresentar a view da Admin - Notícias onde lista todas as Notícias com o limite de 4 linhas na tabela, 
    se exceder as 4 linhas são criadas páginas para percorrer a lista. 
        A variável $pesquisa guarda o conteúdo que vem do request do formulário da pesquisa. 
    É feita a verificação da variável $pesquisa, se existir apresentar apenas a Notícia correspondente 
    ao que foi escrito na campo de pesquisa, caso não exista apresenta a tabela com todas as Notícias. 
        Retorna a view 'Admin - Notícias', e passa as variáveis necessárias para serem utilizadas na view.
    */
    public function noticias(){

        $pesquisa = request('pesquisa');

        if($pesquisa){
            $noticias = Noticia::where([
                ['titulo', 'like', '%'.$pesquisa.'%']
            ])->get();
        }else{
            $noticias = Noticia::paginate(4);
        }
        
        return view('admin/noticias/admin_noticias', ['noticias' => $noticias, 'pesquisa' => $pesquisa]);
    }

    /*  Função responsável por renderizar a view Criar Notícia.*/
    public function criar_noticias(){
        return view('admin/noticias/admin_criar_noticias');
    }

    /*  Função responsável por enviar os dados para a Tabela "noticia".
        A variável $noticia é uma nova Noticia. "Noticia" é o Model.
        Preenche todos os campos da tabela "noticia" com os valores que vem no request
        Verifica a imagem importada e guarda na pasta "img/noticias" com um nome gerado automaticamente
    através do md5().
        Faz o save() para enviar os dados.
        Redireciona para a view "Admin-Noticias" onde apresenta uma mensagem de sucesso.*/
    public function store(Request $request){
        $noticia = new Noticia;

        $noticia -> titulo = $request->titulo;
        $noticia -> titulo_en = $request->titulo_en;
        $noticia -> corpo = $request->corpo;
        $noticia -> corpo_en = $request->corpo_en;
        $noticia -> ativo = $request->ativo;

        if($request->hasFile('media') && $request->file('media')->isValid()) {

            $requestMedia = $request->media;

            $extension = $requestMedia->extension();

            $mediaName = md5($requestMedia->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestMedia->move(public_path('img/noticias'), $mediaName);

            $noticia->media = $mediaName;

        }

        $noticia->save();

        return redirect('/admin/noticias')->with('msg', 'Notícia criada com sucesso!');
    }

    /*  Função para abrir a view "Admin - Editar Noticia", onde é passado um $id como parâmetro.
        A variável $noticia guarda a Noticia com o $id passado como parâmetro.
        Retorna a view "Admin - Editar Noticia".*/
    public function editar_noticia($id){
        $noticia = Noticia::findOrFail($id);
        return view('admin/noticias/admin_editar_noticias', ['noticia' => $noticia]);
    }

     /*  Função para atualizar os dados da Noticia .
        A variável $data guarda todos os valores passados no request.
        É atualizada a noticia com o $id passado através do request.
        Retorna a view "Admin - Noticias" onde apresenta uma mensagem de sucesso.*/
    public function atualizar_noticia(Request $request){

        $data = $request->all();

        if($request->hasFile('media') && $request->file('media')->isValid()) {

            $requestMedia = $request->media;

            $extension = $requestMedia->extension();

            $mediaName = md5($requestMedia->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestMedia->move(public_path('img/noticias'), $mediaName);

            $data['media'] = $mediaName;

        }

        Noticia::findOrFail($request->id)->update($data);
        return redirect('admin/noticias')->with('msg', 'Notícia atualizada com sucesso!');
    }

    /*  Função para apagar a noticia .
        É apagada a noticia com o $id passado pelo request.
        Retorna a view "Admin - Noticias" onde apresenta uma mensagem de sucesso.*/
    public function apagar_noticia($id){
        GaleriaNoticia::where('id_noticia', $id)->delete();
        Noticia::findOrFail($id)->delete();
        return redirect('admin/noticias')->with('msg', 'Notícia apagada com sucesso!');
    }

    /*GALERIA*/

    /*  Função para apresentar a view da Galeria da Noticia onde lista todas as imagens 
    com o limite de 6 linhas na tabela, se exceder as 4 linhas são criadas páginas para percorrer a lista. 
        Retorna a view 'Admin - Galeria Noticia', e passa as variáveis necessárias para serem utilizadas na view.
    */
    public function galeria_noticias(){
        $galeria = GaleriaNoticia::paginate(6);
        return view('admin/noticias/admin_galeria_noticias', ['galerias' => $galeria]);
    }

    /*  Função responsável por renderizar a view Criar Galeria Noticia.*/
    public function adicionar_galeria_noticia($id){
        $noticia = Noticia::findOrFail($id);
        return view('admin/noticias/admin_adicionar_galeria_noticias', ['noticia' => $noticia]);
    }

    /*  Função responsável por enviar os dados para a Tabela "galeria_noticia".
        A variável $galerianoticia é uma nova GaleriaNoticia. "GaleriaNoticia" é o Model.
        Preenche todos os campos da tabela "galeria_noticia" com os valores que vem no request
        Verifica a imagem importada e guarda na pasta "img/noticia" com um nome gerado automaticamente
    através do md5().
        Faz o save() para enviar os dados.
        Redireciona para a view "Admin-Galeria Noticia" onde apresenta uma mensagem de sucesso.*/
    public function store_galeria(Request $request, $id){
        $galerianoticia = new GaleriaNoticia;

        $galerianoticia -> descricao = $request->descricao;
        $galerianoticia -> id_noticia = $id;

        if($request->hasFile('media') && $request->file('media')->isValid()) {

            $requestMedia = $request->media;

            $extension = $requestMedia->extension();

            $mediaName = md5($requestMedia->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestMedia->move(public_path('img/galeria_noticias'), $mediaName);

            $galerianoticia->media = $mediaName;

        }

        $galerianoticia->save();

        return redirect('/admin/galeria_noticias')->with('msg', 'Imagem inserida com sucesso!');
    }

    /*  Função para apagar uma imagem da galeria_noticia .
        É apagada a imagem com o id passado pelo request.
        Retorna a view "Admin - Galeria Noticia" onde apresenta uma mensagem de sucesso.*/
    public function apagar_galeria_noticia($id){

        GaleriaNoticia::findOrFail($id)->delete();
        return redirect('admin/galeria_noticias')->with('msg', 'Imagem apagada com sucesso!');
    }
}
