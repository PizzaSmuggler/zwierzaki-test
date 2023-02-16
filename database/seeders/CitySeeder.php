<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Voievodeship;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Szczecin','voievodeship_id' => '16'],
            ['name' => 'Koszalin','voievodeship_id' => '16'],
            ['name' => 'Stargard','voievodeship_id' => '16'],
            ['name' => 'Kołobrzeg','voievodeship_id' => '16'],
            ['name' => 'Świnoujście','voievodeship_id' => '16'],
            ['name' => 'Szczecinek','voievodeship_id' => '16'],
            ['name' => 'Police','voievodeship_id' => '16'],
            ['name' => 'Wałcz','voievodeship_id' => '16'],
            ['name' => 'Białogard','voievodeship_id' => '16'],
            ['name' => 'Goleniów','voievodeship_id' => '16']
            ];
        City::insert($data);
    }
}
