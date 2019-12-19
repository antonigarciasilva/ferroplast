<?php

use Illuminate\Database\Seeder;
use App\Empleados;
use App\User;
use App\Cargo;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class, 1)->create();
        $cargo = factory(Cargo::class, 3)->create();
        $empleados = factory(Empleados::class, 100)->create();       
    }
}
