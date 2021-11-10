<?php

namespace App\Http\Controllers;

use App\Models\PedidoContacto;
use Illuminate\Http\Request;

class AdminPedidoContactoController extends Controller
{

    /*  Função para apresentar a view da Admin - Pedido Contacto onde lista todos os Pedido Contactos 
    com o limite de 4 linhas na tabela, se exceder as 4 linhas são criadas páginas para percorrer a lista. 
        A variável $pedido_contacto guarda todos os Pedidos de Contacto.
        Retorna a view 'Admin - Pedido Contacto', e passa as variáveis necessárias para serem utilizadas na view.
    */
    public function pedido_contacto(){
        $pedido_contacto = PedidoContacto::paginate(4);
        
        return view('admin/pedido_contacto/admin_pedido_contacto', ['pedido_contactos' => $pedido_contacto]);
    }

    /*  Função para abrir a view "Admin - Pedido Contacto", onde é passado um $id como parâmetro.
        A variável $pedido_contacto guarda o pedido_contacto com o $id passado como parâmetro.
        Retorna a view "Admin - Pedido Contacto".*/
    public function editar_pedido_contacto($id){
        $pedido_contacto = PedidoContacto::findOrFail($id);
        return view('admin/pedido_contacto/admin_editar_pedido_contacto', ['pedido_contacto' => $pedido_contacto]);
    }

    /*  Função para atualizar os dados do pedido_contacto .
        A variável $data guarda todos os valores passados no request.
        É atualizado o pedido_contacto com o $id passado através do request.
        Retorna a view "Admin - Pedido Contacto" onde apresenta uma mensagem de sucesso.*/
    public function atualizar_pedido_contacto(Request $request){

        $data = $request->all();

        PedidoContacto::findOrFail($request->id)->update($data);
        return redirect('admin/pedido_contacto')->with('msg', 'Pedido de Contacto atualizado com sucesso!');
    }

    /*  Função para apagar o pedido_contacto.
        É apagado o pedido_contacto com o $id passado pelo request.
        Retorna a view "Admin - Pedido Contacto" onde apresenta uma mensagem de sucesso.*/
    public function apagar_pedido_contacto($id){
        PedidoContacto::findOrFail($id)->delete();
        return redirect('admin/pedido_contacto')->with('msg', 'Pedido de Contacto apagado com sucesso!');
    }
}
