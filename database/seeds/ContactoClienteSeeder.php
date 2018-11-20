<?php

use Illuminate\Database\Seeder;
use App\ContactoCliente;
class ContactoClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ContactoCliente::class, 100)->create();
    }
}
