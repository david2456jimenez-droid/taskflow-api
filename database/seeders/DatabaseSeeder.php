<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Administrador TaskFlow',
            'email' => 'admin@taskflow.test',
        ]);

        User::factory(8)->create();

        $this->call([
            ProjectSeeder::class,
            TaskSeeder::class,
        ]);
    }
}
