<?php

use Illuminate\Database\Seeder;
use App\Departamento;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create([
            'nombre'=>'Fisicoquimica',
            'abreviatura'=>'FQ',
            'encargado'=>1
        ]);
        Departamento::create([
            'nombre'=>'Residuos Quimicos',
            'abreviatura'=>'RQ',
            'encargado'=>1
        ]);
        Departamento::create([
            'nombre'=>'Microbiologia',
            'abreviatura'=>'MB',
            'encargado'=>1
        ]);
    }
}
