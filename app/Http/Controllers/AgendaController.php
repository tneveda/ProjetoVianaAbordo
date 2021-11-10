<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactos;
use App\Models\RedesSociais;
use App\Models\Agenda;
use App\Models\GaleriaAgenda;
use App\Models\Pessoa;
use App\Models\Reserva;
use Lang;

class AgendaController extends Controller
{
    /*  Função responsável pela renderização da view da Agenda.
        $agendaDescricao guarda da string de tradução.
        $agenda guarda todas as agendas ativas.
        $agenda_destaque guarda todoas as agendas ativas e em destaque.
        $pessoa guarda todas as Pessoas.
        $contactos guarda os contactos para apresentar no footer
        $redes_sociais guarda as redes sociais para apresentar no footer
        Retorna a view Agenda com as respetivas variáveis necessárias*/
    public function index(){
        $agendaDescricao = Lang::get('message.AgendaDescricao');
        $agenda = Agenda::all()->where("ativo", "=", "1")->where("destaque", "=", "0");;
        $agenda_destaque = Agenda::all()->where("ativo", "=", "1")->where("destaque", "=", "1");
        $pessoa = Pessoa::all();
        $contactos = Contactos::all();
        $redes_sociais = RedesSociais::all();
        return view('agenda', ['agenda' => $agenda, 
                    'agenda_destaque' => $agenda_destaque, 
                    'pessoa' => $pessoa, 
                    'contactos' => $contactos, 
                    'redes_sociais' => $redes_sociais,
                    'agendaDescricao' => $agendaDescricao]);
    }

    /*  Função responsável pela renderização da view de Ver Agenda.
        $agendaDescricao guarda da string de tradução.
        $agenda guarda a agenda com o $id que passa como parâmetro da função.
        $galeria guarda a galeria da agenda com o $id que passa como parâmetro da função.
        $contactos guarda os contactos para apresentar no footer
        $redes_sociais guarda as redes sociais para apresentar no footer
        Retorna a view Ver Agenda com as respetivas variáveis necessárias*/
    public function ver_agenda($id){
        $agendaDescricao = Lang::get('message.AgendaDescricao');
        $agenda = agenda::findOrFail($id);
        $galeria = GaleriaAgenda::all()->where('id_agenda', $id);
        $contactos = Contactos::all();
        $redes_sociais = RedesSociais::all();

        return view('agenda/ver_agenda', ['agenda' => $agenda, 
                    'galeria' => $galeria, 
                    'contactos' => $contactos, 
                    'redes_sociais' => $redes_sociais,
                    'agendaDescricao' => $agendaDescricao]);
    }

    /*  Função responsável pela renderização da view de Reservar Agenda..
        $agenda guarda a agenda com o $id que passa como parâmetro da função.
        $contactos guarda os contactos para apresentar no footer
        $redes_sociais guarda as redes sociais para apresentar no footer
        Retorna a view Reservar Agenda com as respetivas variáveis necessárias*/
    public function reservar_agenda($id){

        $agenda = agenda::findOrFail($id);
        $contactos = Contactos::all();
        $redes_sociais = RedesSociais::all();

        return view('agenda/reservar_agenda', ['agenda' => $agenda, 'contactos' => $contactos, 'redes_sociais' => $redes_sociais]);
    }

    /*  Função responsável por enviar os dados para a Tabela "reserva".
        A variável $reserva é uma nova Reserva. "Reserva" é o Model.
        Preenche todos os campos da tabela "reserva" com os valores que vem no request
        Faz o save() para enviar os dados.
        Redireciona para a view da Agenda que foi feita a reserva onde apresenta uma mensagem de sucesso.*/
    public function store(Request $request, $id){
        $reserva = new Reserva;

        $reserva -> nome = $request->nome;
        $reserva -> email = $request->email;
        $reserva -> profissao = $request->profissao;
        $reserva -> id_agenda = $id;

        $reserva->save();

        return redirect('/agenda/' . $id)->with('msg', 'Reserva efetuada com sucesso!');
    }
}
