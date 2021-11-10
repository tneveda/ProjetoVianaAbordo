<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class AdminBannerController extends Controller
{
    /*  Função para apresentar a view do Admin - Banner onde lista todas as agendas com o limite de 4 linhas na tabela, 
    se exceder as 4 linhas são criadas páginas para percorrer a lista.  
        A variável $banner guarda a informação respetiva da tabela "banner".
        Retorna a view 'Admin - Banner', e passa as variáveis necessárias para serem utilizadas na view.
    */
    public function banner(){
        $banner = Banner::paginate(4);
        return view('admin/banner/admin_banner', ['banners' => $banner]);
    }

    /*  Função responsável por renderizar a view Criar Banner.*/
    public function criar_banner(){
        return view('admin/banner/admin_criar_banner');
    }

    /*  Função responsável por enviar os dados para a Tabela "banner".
        A variável $banner é uma nova Banner. "Banner" é o Model.
        Preenche todos os campos da tabela "banner" com os valores que vem no request
        Verifica a imagem importada e guarda na pasta "img/banner" com um nome gerado automaticamente
    através do md5().
        Faz o save() para enviar os dados.
        Redireciona para a view "Admin - Banner" onde apresenta uma mensagem de sucesso.*/
    public function store(Request $request){
        $banner = new Banner;

        $banner -> nome = $request->nome;
        $banner -> nome_en = $request->nome_en;
        $banner -> corpo = $request->corpo;
        $banner -> corpo_en = $request->corpo_en;
        $banner -> ativo = $request->ativo;

        if($request->hasFile('media') && $request->file('media')->isValid()) {

            $requestMedia = $request->media;

            $extension = $requestMedia->extension();

            $mediaName = md5($requestMedia->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestMedia->move(public_path('img/banner'), $mediaName);

            $banner->media = $mediaName;

        }

        $banner->save();

        return redirect('/admin/banner')->with('msg', 'Banner criado com sucesso!');
    }

    /*  Função para abrir a view "Admin - Editar Banner", onde é passado um $id como parâmetro.
        A variável $banner guarda o banner com o $id passado como parâmetro.
        Retorna a view "Admin - Editar Banner".*/
    public function editar_banner($id){
        $banner = Banner::findOrFail($id);
        return view('admin/banner/admin_editar_banner', ['banner' => $banner]);
    }

    /*  Função para atualizar os dados do banner .
        A variável $data guarda todos os valores passados no request.
        É atualizado o banner com o $id passado através do request.
        Retorna a view "Admin - Banner" onde apresenta uma mensagem de sucesso.*/
    public function atualizar_banner(Request $request){

        $data = $request->all();

        if($request->hasFile('media') && $request->file('media')->isValid()) {

            $requestMedia = $request->media;

            $extension = $requestMedia->extension();

            $mediaName = md5($requestMedia->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestMedia->move(public_path('img/banner'), $mediaName);

            $data['media'] = $mediaName;

        }

        Banner::findOrFail($request->id)->update($data);
        return redirect('admin/banner')->with('msg', 'Banner atualizado com sucesso!');
    }

    /*  Função para apagar o banner .
        É apagado o banner com o $id passado pelo request.
        Retorna a view "Admin - Banner" onde apresenta uma mensagem de sucesso.*/
    public function apagar_banner($id){
        Banner::findOrFail($id)->delete();
        return redirect('admin/banner')->with('msg', 'Banner apagados com sucesso!');
    }
}
