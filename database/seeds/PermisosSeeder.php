<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name'=>'admin']);
        $guest = Role::create(['name'=>'guest']);
        $analist = Role::create(['name'=>'analist']);

        $admin->givePermissionTo(Permission::create(['name' => 'create permission']));
        $admin->givePermissionTo(Permission::create(['name' => 'edit permission']));
        $admin->givePermissionTo(Permission::create(['name' => 'delete permission']));
        $admin->givePermissionTo(Permission::create(['name' => 'show permission']));

        $admin->givePermissionTo(Permission::create(['name' => 'create user']));
        $admin->givePermissionTo(Permission::create(['name' => 'edit user']));
        $admin->givePermissionTo(Permission::create(['name' => 'delete user']));
        $admin->givePermissionTo(Permission::create(['name' => 'show user']));

        $admin->givePermissionTo(Permission::create(['name' => 'create client']));
        $admin->givePermissionTo(Permission::create(['name' => 'edit client']));
        $admin->givePermissionTo(Permission::create(['name' => 'delete client']));
        $admin->givePermissionTo(Permission::create(['name' => 'show client']));
        
        $admin->givePermissionTo(Permission::create(['name' => 'create provider']));
        $admin->givePermissionTo(Permission::create(['name' => 'edit provider']));
        $admin->givePermissionTo(Permission::create(['name' => 'delete provider']));
        $admin->givePermissionTo(Permission::create(['name' => 'show provider']));
        
        $admin->givePermissionTo(Permission::create(['name' => 'create muestra']));
        $admin->givePermissionTo(Permission::create(['name' => 'edit muestra']));
        $admin->givePermissionTo(Permission::create(['name' => 'delete muestra']));
        $admin->givePermissionTo(Permission::create(['name' => 'show muestra']));
        
        $admin->givePermissionTo(Permission::create(['name' => 'create insumo']));
        $admin->givePermissionTo(Permission::create(['name' => 'edit insumo']));
        $admin->givePermissionTo(Permission::create(['name' => 'delete insumo']));
        $admin->givePermissionTo(Permission::create(['name' => 'show insumo']));
        
        $admin->givePermissionTo(Permission::create(['name' => 'create solicitud']));
        $admin->givePermissionTo(Permission::create(['name' => 'edit solicitud']));
        $admin->givePermissionTo(Permission::create(['name' => 'delete solicitud']));
        $admin->givePermissionTo(Permission::create(['name' => 'show solicitud']));
        
        $admin->givePermissionTo(Permission::create(['name' => 'create resultado']));
        $admin->givePermissionTo(Permission::create(['name' => 'edit resultado']));
        $admin->givePermissionTo(Permission::create(['name' => 'delete resultado']));
        $admin->givePermissionTo(Permission::create(['name' => 'show resultado']));

        $admin->givePermissionTo(Permission::create(['name' => 'create orden']));
        $admin->givePermissionTo(Permission::create(['name' => 'edit orden']));
        $admin->givePermissionTo(Permission::create(['name' => 'delete orden']));
        $admin->givePermissionTo(Permission::create(['name' => 'show orden']));

        $admin->givePermissionTo(Permission::create(['name' => 'create informe']));
        $admin->givePermissionTo(Permission::create(['name' => 'edit informe']));
        $admin->givePermissionTo(Permission::create(['name' => 'delete informe']));
        $admin->givePermissionTo(Permission::create(['name' => 'show informe']));

        $admin->givePermissionTo(Permission::create(['name' => 'create departamento']));
        $admin->givePermissionTo(Permission::create(['name' => 'edit departamento']));
        $admin->givePermissionTo(Permission::create(['name' => 'delete departamento']));
        $admin->givePermissionTo(Permission::create(['name' => 'show departamento']));

        $guest->givePermissionTo('show departamento');
        $guest->givePermissionTo('show informe');
        $guest->givePermissionTo('show orden');
        $guest->givePermissionTo('show resultado');
        $guest->givePermissionTo('show solicitud');
        $guest->givePermissionTo ('show muestra');
        $guest->givePermissionTo('show insumo');
        $guest->givePermissionTo('show user');
        $guest->givePermissionTo('show client');
        $guest->givePermissionTo('show provider');
        $guest->givePermissionTo('show muestra');

        
    }
}
