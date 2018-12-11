<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   $this->truncateTables([ 
        //tablas predeterminadas
        'Roles',
        'Permissions',    	
        'Users',
        'Departamentos',
        //tablas de pruebas
        'Contacto_Clientes',
        'Clientes',

              
    ]);
        //seeder predeterminados
        $this->call(PermisosSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DepartamentosSeeder::class);
        //seeder para pruebas
        $this->call(ClientesTableSeeder::class);
        $this->call(ContactoClienteSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
    
    protected function truncateTables(array $tables){
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
    	foreach($tables as $table){
    		DB::table($table)->truncate();
    	}

    	DB::statement('SET FOREIGN_KEY_CHECKS =1;');
    }
}
