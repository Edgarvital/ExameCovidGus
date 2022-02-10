<?php

namespace Database\Seeders;

use App\Models\tipoUsuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = tipoUsuario::where('tipo', 'Administrador')->first();

        DB::table('users')->insert([
            'name' => 'Administrar',
            'email' => 'admin@admin.com',
            'email_verified_at' => today(),
            'password' => bcrypt('123456'),
            'tipoUsuario_id' => $tipo->id
        ]);
    }
}
