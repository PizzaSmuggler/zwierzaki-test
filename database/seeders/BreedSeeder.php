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
            ['name' => 'Siberian Husky',
            'species_id' => '1'],
            ['name' => 'Rosyjski Niebieski',
                'species_id' => '2']
        ];
        Breed::insert($data);
    }
}
