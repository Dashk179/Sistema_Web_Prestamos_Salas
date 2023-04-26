<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adm = Role::create(['name'=> 'Admin']);
        $jefeDepartamento = Role::create(['name'=> 'JefeDepartamento']);

        //Permisos para ventana Home

        $permission = Permission::create(['name' =>'home'])->first();
        $permission->syncRoles([$adm, $jefeDepartamento]);



        //Permisos para Salas
        Permission::create(['name'=>'salas']) ->syncRoles([$adm,$jefeDepartamento]);

        //Permisos para Salas
        Permission::create(['name'=>'admin.salas.index']) ->syncRoles([$adm]);
        Permission::create(['name'=>'admin.salas.store'])->syncRoles([$adm]);
        Permission::create(['name'=>'admin.salas.update'])->syncRoles([$adm]);
        Permission::create(['name'=>'admin.salas.delete'])->syncRoles([$adm]);

        //Permisos para Materiales
        Permission::create(['name'=>'admin.materiales.index']) ->syncRoles([$adm]);
        Permission::create(['name'=>'admin.materiales.store'])->syncRoles([$adm]);
        Permission::create(['name'=>'admin.materiales.update'])->syncRoles([$adm]);
        Permission::create(['name'=>'admin.materiales.delete'])->syncRoles([$adm]);

        //Permisos para Eventos
        Permission::create(['name'=>'admin.eventos.index']) ->syncRoles([$adm,$jefeDepartamento]);
        Permission::create(['name'=>'admin.eventos.store'])->syncRoles([$adm,$jefeDepartamento]);
        Permission::create(['name'=>'admin.eventos.update'])->syncRoles([$adm]);
        Permission::create(['name'=>'admin.eventos.delete'])->syncRoles([$adm]);


    }
}
