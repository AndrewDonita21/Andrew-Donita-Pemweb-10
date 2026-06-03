<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Masyarakat;

class MasyarakatSeeder extends Seeder
{
    public function run(): void
    {
        Masyarakat::factory()->count(500)->create();
    }
}
