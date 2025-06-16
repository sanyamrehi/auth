<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Countries
        $india = \App\Models\Country::create(['name' => 'India']);
        $usa = \App\Models\Country::create(['name' => 'United States']);

        // States for India
        $maharashtra = \App\Models\State::create([
            'name' => 'Maharashtra',
            'country_id' => $india->id
        ]);
        $karnataka = \App\Models\State::create([
            'name' => 'Karnataka',
            'country_id' => $india->id
        ]);

        // States for USA
        $california = \App\Models\State::create([
            'name' => 'California',
            'country_id' => $usa->id
        ]);
        $newyork = \App\Models\State::create([
            'name' => 'New York',
            'country_id' => $usa->id
        ]);

        // Cities for Maharashtra
        \App\Models\City::create([
            'name' => 'Mumbai',
            'state_id' => $maharashtra->id
        ]);
        \App\Models\City::create([
            'name' => 'Pune',
            'state_id' => $maharashtra->id
        ]);

        // Cities for Karnataka
        \App\Models\City::create([
            'name' => 'Bangalore',
            'state_id' => $karnataka->id
        ]);
        \App\Models\City::create([
            'name' => 'Mysore',
            'state_id' => $karnataka->id
        ]);

        // Cities for California
        \App\Models\City::create([
            'name' => 'Los Angeles',
            'state_id' => $california->id
        ]);
        \App\Models\City::create([
            'name' => 'San Francisco',
            'state_id' => $california->id
        ]);

        // Cities for New York
        \App\Models\City::create([
            'name' => 'New York City',
            'state_id' => $newyork->id
        ]);
        \App\Models\City::create([
            'name' => 'Albany',
            'state_id' => $newyork->id
        ]);
    }
}
