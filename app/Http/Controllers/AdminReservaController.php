<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Agenda;

class AdminReservaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:reserva-list|post-create|post-edit|post-delete', ['only' => ['resrva']]);
        $this->middleware('permission:reserva-edit', ['only' => [ 'editar_reserva', 'atualizar_reserva']]);
        $this->middleware('permission:reserva-delete', ['only' => ['apagar_reserva']]);
    }

    /*  Função para apresentar a view do Admin - Reserva onde lista todas as agendas com o limite de 4 linhas na tabela, 
    se exceder as 4 linhas são criadas páginas para percorrer a lista.  
        A variável $reserva guarda a informação respetiva da tabela "reserva".
        A variável $agenda guarda a informação da tabela "agenda".
        Retorna a view 'Admin - Reserva', e passa as variáveis necessárias para serem utilizadas na view.
    */
    public function reserva(){
        $agenda = Agenda::all();
        $reserva = Reserva::paginate(8);
        
        return view('admin/reserva/admin_reserva', ['reservas' => $reserva, 'agenda'=>$agenda]);
    }

    /*  Função para abrir a view "Admin - Editar Reserva", onde é passado um $id como parâmetro.
        A variável $reserva guarda a reserva com o $id passado como parâmetro.
        A variável $agenda guarda todas as Agendas. 
        Retorna a view "Admin - Editar Reserva".*/
    public function editar_reserva($id){
        $reserva = reserva::findOrFail($id);
        $agenda = Agenda::all();
        return view('admin/reserva/admin_editar_reserva', ['reserva' => $reserva, 'agenda' => $agenda]);
    }

    /*  Função para atualizar os dados da reserva.
        A variável $data guarda todos os valores passados no request.
        É atualizada a reserva com o $id passado através do request.
        Retorna a view "Admin - Reserva" onde apresenta uma mensagem de sucesso.*/
    public function atualizar_reserva(Request $request){

        $data = $request->all();

        reserva::findOrFail($request->id)->update($data);
        return redirect('admin/reserva')->with('msg', 'Reserva atualizada com sucesso!');
    }

    /*  Função para apagar a reserva.
        É apagada a reserva com o $id passado pelo request.
        Retorna a view "Admin - Reserva" onde apresenta uma mensagem de sucesso.*/
    public function apagar_reserva($id){
        reserva::findOrFail($id)->delete();
        return redirect('admin/reserva')->with('msg', 'Reserva apagada com sucesso!');
    }
}
