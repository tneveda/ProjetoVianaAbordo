<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Contactos;
use App\Models\GaleriaNoticia;
use App\Models\RedesSociais;
use Mockery\Matcher\Not;
use Illuminate\Support\Str;
use Lang;

class NoticiasController extends Controller
{
    /*  Função responsável pela renderização da view da Noticias.
        $pesquisa guarda o request que vem do formulário da pesquisa.
            Se houver $pesquisa lista a noticia com o nome da pesquisa, 
            caso não haja lista todas as noticias
        $noticias guarda todas as Noticias.
        $noticiasTitulo guarda da string de tradução do campo titulo da Noticia.
        $noticiasCorpo guarda da string de tradução do campo corpo da Noticia.
        $contactos guarda os contactos para apresentar no footer
        $redes_sociais guarda as redes sociais para apresentar no footer
        Retorna a view Noticias com as respetivas variáveis necessárias*/
    public function index(){

        $pesquisa = request('pesquisa');

        if($pesquisa){
            $noticias = Noticia::where([
                ['titulo', 'like', '%'.$pesquisa.'%']
            ])->get();
        }else{
            $noticias = Noticia::all()->sortByDesc("created_at")->where("ativo", "=", "1");
        }

        $noticiasTitulo = Lang::get('message.NoticiasTitulo');
        $noticiasCorpo = Lang::get('message.NoticiasCorpo');
        $contactos = Contactos::all();
        $redes_sociais = RedesSociais::all();
        return view('noticias', ['noticias' => $noticias, 
                                    'contactos' => $contactos, 
                                    'redes_sociais' => $redes_sociais,
                                    'noticiasTitulo' => $noticiasTitulo,
                                    'noticiasCorpo' => $noticiasCorpo,
                                    'pesquisa' => $pesquisa]);
    }

    /*  Função responsável pela renderização da view de Ver Noticia.
        $noticia guarda a Noticia com o $id passado como parâmetro na função.
        $noticiasTitulo guarda da string de tradução do campo titulo da Noticia.
        $noticiasCorpo guarda da string de tradução do campo corpo da Noticia.
        $galeria guarda a galeria da noticia com o $id que passa como parâmetro da função.
        $contactos guarda os contactos para apresentar no footer
        $redes_sociais guarda as redes sociais para apresentar no footer
        Retorna a view Ver Noticia com as respetivas variáveis necessárias*/
    public function ver_noticia($id){
        $noticiasTitulo = Lang::get('message.NoticiasTitulo');
        $noticiasCorpo = Lang::get('message.NoticiasCorpo');
        $noticia = Noticia::findOrFail($id);
        $galeria = GaleriaNoticia::all()->where('id_noticia', $id);
        $contactos = Contactos::all();
        $redes_sociais = RedesSociais::all();

        return view('noticias/ver_noticia', ['noticia' => $noticia, 
                                                'galeria' => $galeria,
                                                'contactos' => $contactos, 
                                                'redes_sociais' => $redes_sociais,
                                                'noticiasTitulo' => $noticiasTitulo,
                                                'noticiasCorpo' => $noticiasCorpo]);
    }
}
