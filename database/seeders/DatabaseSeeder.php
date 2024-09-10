<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(KategoriSampahSeeder::class);
        $this->call(SatuanSampahSeeder::class);
        $this->call(ProdukSampahSeeder::class);
         \App\Models\User::factory()->create([
             'name' => 'John',
             'last_name' => 'Doe',
             'password' => 'password',
             'email' => 'test@example.com',
         ]);

         \App\Models\User::factory()->create([
            'name' => 'Zidni',
            'last_name' => 'Ilma',
            'password' => '12345678',
            'email' => 'uhuy@gmail.com',
        ]);

        
    }
 
}
