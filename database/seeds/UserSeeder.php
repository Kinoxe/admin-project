<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root = User::create([
            'name'=>'root',
            'email'=>'root@root.com',
            'password'=>bcrypt('123456'),
        ]);

        $root->assignRole('admin');
    }
}
