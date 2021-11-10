<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactos;
use App\Models\PedidoContacto;
use App\Models\RedesSociais;

class ContactosController extends Controller
{
    /*  Função responsável pela renderização da view de Contactos.
        $contactos guarda os contactos para apresentar no footer
        $redes_sociais guarda as redes sociais para apresentar no footer
        Retorna a view Contactos com as respetivas variáveis necessárias*/
    public function index(){
        $contactos = Contactos::all();
        $redes_sociais = RedesSociais::all();
        return view('contactos', ['contactos' => $contactos, 'redes_sociais' => $redes_sociais]);
    }

    /*  Função responsável pelo envio dos dados do pedido de contacto para a base de dados.
        Através do request os campos do pedido_contacto são preenchidos. 
        O campo "respondido" é preenchido a 0 (não respondido).
        Redireciona para a view Contactos e apresenta a mensagem de sucesso.
    */
    public function store(Request $request){
        $pedido_contacto = new PedidoContacto();

        $pedido_contacto -> nome = $request->nome;
        $pedido_contacto -> email = $request->email;
        $pedido_contacto -> mensagem = $request->mensagem;
        $pedido_contacto -> respondido = 0;

        $pedido_contacto->save();

        return redirect('/contactos')->with('msg', 'Pedido de Contacto efetuado com sucesso!');
    }

}
