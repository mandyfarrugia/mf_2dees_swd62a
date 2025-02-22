<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    public function run(): void
    {
        $malta = Country::where('name', 'Malta')->first()->id;

        $regionObjects = [
            ['name' => 'Eastern Region', 'country_id' => $malta],
            ['name' => 'Gozo Region', 'country_id' => $malta],
            ['name' => 'Northern Region', 'country_id' => $malta],
            ['name' => 'Port Region', 'country_id' => $malta],
            ['name' => 'Southern Region', 'country_id' => $malta],
            ['name' => 'Western Region', 'country_id' => $malta]
        ];

        foreach($regionObjects as $regionObject) {
            Region::create($regionObject);
        }
    }
}
