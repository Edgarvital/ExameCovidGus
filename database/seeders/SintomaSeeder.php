<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SintomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Sintomas = ['Febre', 'Tosse', 'Dor na garganta', 'Coriza', 'Dor de cabeça', 'Dor de garganta', 'Dispneia', 'Alterações no olfato ou paladar', 'Nenhum'];

        for ($i = 0; $i < sizeof($Sintomas); $i++) {
            DB::table('sintomas')->insert([
                'nome' => $Sintomas[$i],
            ]);
        }
    }
}
