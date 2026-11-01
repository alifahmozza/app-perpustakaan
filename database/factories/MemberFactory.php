<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MemberFactory extends Factory
{
    public function definition(): array
    {
        $nama = fake()->firstname().' '.fake()->lastname();

        return [
             'nama' => $nama,
            'nim' => fake()->unique()->numerify('##########'),
            'email' => Str::slug($nama, '.').fake()->unique()->numerify('###').'@pens.ac.id',
            'nomor_telepon' => fake()->numerify('08##########'),
            'alamat' => fake()->address(),
            'status' => fake()->randomElement(['aktif', 'aktif', 'aktif', 'nonaktif']),
        ];
    }
}