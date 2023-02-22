<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Breed;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Koń gorącokrwisty',
                'species_id' => '3'],
            ['name' => 'Koń zimnokrwisty',
                'species_id' => '3'],
            ['name' => 'Kuc',
                'species_id' => '3'],
        ];
        Breed::insert($data);
    }
}
