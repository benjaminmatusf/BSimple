<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//spatie 

use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permisos = [
            //tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //tabla proveedores
            'ver-proveedor',
            'crear-proveedor',
            'editar-proveedor',
            'borrar-proveedor',
            //tabla clientes
            'ver-cliente',
            'crear-cliente',
            'editar-cliente',
            'borrar-cliente',
            //tabla productos
            'ver-producto',
            'crear-producto',
            'editar-producto',
            'borrar-producto',
            //tabla compras
            'ver-compra',
            'crear-compra',
            'editar-compra',
            'borrar-compra',
            //tabla ventas
            'ver-venta',
            'crear-venta',
            'editar-venta',
            'borrar-venta'
        ];
        foreach($permisos as $permiso){
            Permission::create(['name' => $permiso]);
        }
    }
}
