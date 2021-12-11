<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'banner-list',
            'banner-create',
            'banner-edit',
            'banner-delete',
            'sobre_nos-list',
            'sobre_nos-create',
            'sobre_nos-edit',
            'sobre_nos-delete',
            'numeros_factos-list',
            'numeros_factos-create',
            'numeros_factos-edit',
            'numeros_factos-delete',
            'testemunhos-list',
            'testemunhos-create',
            'testemunhos-edit',
            'testemunhos-delete',
            'contactos-list',
            'contactos-create',
            'contactos-edit',
            'contactos-delete',
            'redes_sociais-list',
            'redes_sociais-create',
            'redes_sociais-edit',
            'redes_sociais-delete',
            'agenda-list',
            'agenda-create',
            'agenda-edit',
            'agenda-delete',
            'reserva-list',
            'reserva-create',
            'reserva-edit',
            'reserva-delete',
            'galeria-list',
            'galeria-create',
            'galeria-edit',
            'galeria-delete',
            'pessoa-list',
            'pessoa-create',
            'pessoa-edit',
            'pessoa-delete',
            'mentores-list',
            'mentores-create',
            'mentores-edit',
            'mentores-delete',
            'mentorandos-list',
            'mentorandos-create',
            'mentorandos-edit',
            'mentorandos-delete',
            'area_interesse-list',
            'area_interesse-create',
            'area_interesse-edit',
            'area_interesse-delete',
            'mentorias-list',
            'mentorias-create',
            'mentorias-edit',
            'mentorias-delete',
            'sessoes-list',
            'sessoes-create',
            'sessoes-edit',
            'sessoes-delete',
            'noticias-list',
            'noticias-create',
            'noticias-edit',
            'noticias-delete',
            'galeria_noticias-list',
            'galeria_noticias-create',
            'galeria_noticias-edit',
            'galeria_noticias-delete',
            'pedido_contacto-list',
            'pedido_contacto-create',
            'pedido_contacto-edit',
            'pedido_contacto-delete'

         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}