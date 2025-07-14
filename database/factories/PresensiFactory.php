<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Presensi>
 */
class PresensiFactory extends Factory
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
            'waktu_presensi' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'keterangan' => $this->faker->randomElement(['Masuk', 'Izin', 'Sakit']),
        ];
    }
}
