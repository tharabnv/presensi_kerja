<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pekerja>
 */
class PekerjaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_pekerja' => $this->faker->name(),
            'nomor_pekerja' => 'NP' . $this->faker->unique()->numerify('####'),
            'email' => $this->faker->unique()->safeEmail,
            'divisi' => $this->faker->randomElement(['Produksi', 'SDM', 'Keuangan', 'IT', 'Marketing']),
        ];
    }
}
