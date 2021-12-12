<?php

namespace App\Http\Controllers;

use App\Models\Contactos;
use Illuminate\Http\Request;

class AdminContactosController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:contactos-list|post-create|post-edit|post-delete', ['only' => ['contactos']]);
        $this->middleware('permission:contactos-edit', ['only' => [ 'editar_contactos', 'atualizar_contactos']]);
        
    }
    /*  Função para apresentar a view de Admin - Contactos.  
        A variável $contactos guarda a informação respetiva da tabela "contactos".
        Retorna a view 'Admin - Contactos', e passa as variáveis necessárias para serem utilizadas na view.
    */
    public function contactos(){
        $contactos = Contactos::all();
        return view('admin/contactos/admin_contactos', ['contactos' => $contactos]);
    }

    /*  Função para abrir a view "Admin - Editar Contactos", onde é passado um $id como parâmetro.
        A variável $contactos guarda o Contactos com o $id passado como parâmetro.
        Retorna a view "Admin - Editar Contactos".*/
    public function editar_contactos($id){
        $contactos = Contactos::findOrFail($id);
        return view('admin/contactos/admin_editar_contactos', ['contactos' => $contactos]);
    }

    /*  Função para atualizar os dados dos Contactos .
        A variável $data guarda todos os valores passados no request.
        É atualizado o Contacto com o $id passado através do request.
        Retorna a view "Admin - Contactos" onde apresenta uma mensagem de sucesso.*/
    public function atualizar_contactos(Request $request){

        $data = $request->all();

        Contactos::findOrFail($request->id)->update($data);
        return redirect('admin/contactos')->with('msg', 'Contactos atualizados com sucesso!');
    }

}
