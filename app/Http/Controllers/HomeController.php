<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Numeros_Factos;
use App\Models\Testemunhos;
use App\Models\Banner;
use App\Models\Contactos;
use App\Models\RedesSociais;
use App\Models\SobreNos;
use App;
use Lang;

class HomeController extends Controller
{
    /*  Função responsável pela renderização da view da Home.
        $titulo guarda da string de tradução dos campos titulo.
        $corpo guarda da string de tradução dos campos corpo.
        $nome guarda da string de tradução do campo nome dos Numeros e Factos.
        $testemunho guarda da string de tradução do campo testemunho dos Testemunhos.
        $profissao guarda da string de tradução do campo profissao dos Testemunhos.
        $bannerNome guarda da string de tradução do campo nome do Banner.
        $bannerCorpo guarda da string de tradução do campo corpo do Banner.
        $numeros_factos guarda os Numeros e Factos ativos.
        $testemunhos guarda os Testemunhos ativos.
        $banner guarda todos os Banners ativos.
        $sobre_nos guarda todos os Sobre Nós ativos.
        $contactos guarda os contactos para apresentar no footer
        $redes_sociais guarda as redes sociais para apresentar no footer
        Retorna a view Home com as respetivas variáveis necessárias*/
    public function index(){
        $titulo = Lang::get('message.Titulo');
        $corpo = Lang::get('message.Corpo');
        $nome = Lang::get('message.NumerosFactosNome');
        $testemunho = Lang::get('message.Testemunho');
        $profissao = Lang::get('message.TestemunhoProfissao');
        $bannerNome = Lang::get('message.BannerNome');
        $bannerCorpo = Lang::get('message.BannerCorpo');
        $numeros_factos = Numeros_Factos::all()->where("ativo", "=", "1");
        $testemunhos = Testemunhos::all()->where("ativo", "=", "1");
        $banner = Banner::all()->where("ativo", "=", "1");
        $sobre_nos = SobreNos::all()->where("ativo", "=", "1");
        $contactos = Contactos::all();
        $redes_sociais = RedesSociais::all();
        return view('home', ['numeros_factos' => $numeros_factos, 
                    'testemunhos' => $testemunhos, 
                    'banner' => $banner, 
                    'sobre_nos' => $sobre_nos,
                    'contactos' => $contactos,
                    'redes_sociais' => $redes_sociais,
                    'titulo' => $titulo,
                    'corpo' => $corpo,
                    'nome' => $nome,
                    'testemunho' => $testemunho,
                    'profissao' => $profissao,
                    'bannerNome' => $bannerNome,
                    'bannerCorpo' => $bannerCorpo,]);
    }



}
