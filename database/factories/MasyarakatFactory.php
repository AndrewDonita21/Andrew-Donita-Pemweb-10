<?php

namespace Database\Factories;

use App\Models\Masyarakat;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class MasyarakatFactory extends Factory
{
    protected $model = Masyarakat::class;

    public function definition(): array
    {
    return [
        'nomor_kk'      => $this->faker->numerify('################'),
        'nik'           => $this->faker->unique()->numerify('################'),
        'nama'          => $this->faker->name(),
        'alamat'        => $this->faker->address(),
        'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
    ];
    }
}