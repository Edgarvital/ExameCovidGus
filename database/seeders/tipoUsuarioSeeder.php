<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class tipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos = ['Administrador'];

        for ($i = 0; $i < sizeof($tipos); $i++) {
            DB::table('tipoUsuarios')->insert([
                'tipo' => $tipos[$i],
            ]);
        }

    }
}
