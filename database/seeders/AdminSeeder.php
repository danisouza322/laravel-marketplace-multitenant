<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar o usuário administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@minhavitrine.com.br',
            'password' => Hash::make('password'),
            'avatar' => '', // Campo avatar vazio
            'is_admin' => true,
        ]);
        
        // Atualizar o usuário existente (admin@themesbrand.com) para ser admin também
        $existingAdmin = User::where('email', 'admin@themesbrand.com')->first();
        
        if ($existingAdmin) {
            $existingAdmin->update([
                'is_admin' => true
            ]);
        }
    }
}
