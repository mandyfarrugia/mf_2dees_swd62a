<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Region;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    public function run(): void
    {
        $easternRegion = Region::where('name', 'Eastern Region')->first()->id;
        $gozoRegion = Region::where('name', 'Gozo Region')->first()->id;
        $northernRegion = Region::where('name', 'Northern Region')->first()->id;
        $portRegion = Region::where('name', 'Port Region')->first()->id;
        $southernRegion = Region::where('name', 'Southern Region')->first()->id;
        $westernRegion = Region::where('name', 'Western Region')->first()->id;

        $locationObjects = [
            ['name' => 'Fontana', 'region_id' => $gozoRegion],
            ['name' => 'Ghajnsielem', 'region_id' => $gozoRegion],
            ['name' => 'Gharb', 'region_id' => $gozoRegion],
            ['name' => 'Ghasri', 'region_id' => $gozoRegion],
            ['name' => 'Kercem', 'region_id' => $gozoRegion],
            ['name' => 'Marsalforn', 'region_id' => $gozoRegion],
            ['name' => 'Mgarr (Gozo)', 'region_id' => $gozoRegion],
            ['name' => 'Munxar', 'region_id' => $gozoRegion],
            ['name' => 'Nadur', 'region_id' => $gozoRegion],
            ['name' => 'Qala', 'region_id' => $gozoRegion],
            ['name' => 'San Lawrenz', 'region_id' => $gozoRegion],
            ['name' => 'Sannat', 'region_id' => $gozoRegion],
            ['name' => 'Victoria', 'region_id' => $gozoRegion],
            ['name' => 'Xaghra', 'region_id' => $gozoRegion],
            ['name' => 'Xewkija', 'region_id' => $gozoRegion],
            ['name' => 'Xlendi', 'region_id' => $gozoRegion],
            ['name' => 'Zebbug (Gozo)', 'region_id' => $gozoRegion],
            ['name' => 'Birkirkara', 'region_id' => $easternRegion],
            ['name' => 'Gharghur', 'region_id' => $easternRegion],
            ['name' => 'Gzira', 'region_id' => $easternRegion],
            ['name' => 'Ibragg', 'region_id' => $easternRegion],
            ['name' => 'Iklin', 'region_id' => $easternRegion],
            ['name' => 'Lija', 'region_id' => $easternRegion],
            ['name' => 'Msida', 'region_id' => $easternRegion],
            ['name' => 'Pembroke', 'region_id' => $easternRegion],
            ['name' => 'Pietà', 'region_id' => $easternRegion],
            ['name' => 'San Giljan', 'region_id' => $easternRegion],
            ['name' => 'Sliema', 'region_id' => $easternRegion],
            ['name' => 'Swieqi', 'region_id' => $easternRegion],
            ['name' => 'Ta\' Xbiex', 'region_id' => $easternRegion],
            ['name' => 'Dingli', 'region_id' => $westernRegion],
            ['name' => 'Kirkop', 'region_id' => $westernRegion],
            ['name' => 'Mdina', 'region_id' => $westernRegion],
            ['name' => 'Mqabba', 'region_id' => $westernRegion],
            ['name' => 'Qrendi', 'region_id' => $westernRegion],
            ['name' => 'Rabat', 'region_id' => $westernRegion],
            ['name' => 'Safi', 'region_id' => $westernRegion],
            ['name' => 'Siggiewi', 'region_id' => $westernRegion],
            ['name' => 'Zebbug (Malta)', 'region_id' => $westernRegion],
            ['name' => 'Zurrieq', 'region_id' => $westernRegion],
            ['name' => 'Birzebbuga', 'region_id' => $southernRegion],
            ['name' => 'Ghaxaq', 'region_id' => $southernRegion],
            ['name' => 'Gudja', 'region_id' => $southernRegion],
            ['name' => 'Hamrun', 'region_id' => $southernRegion],
            ['name' => 'Luqa', 'region_id' => $southernRegion],
            ['name' => 'Marsa', 'region_id' => $southernRegion],
            ['name' => 'Marsaskala', 'region_id' => $southernRegion],
            ['name' => 'Marsaxlokk', 'region_id' => $southernRegion],
            ['name' => 'Qormi', 'region_id' => $southernRegion],
            ['name' => 'Santa Lucija', 'region_id' => $southernRegion],
            ['name' => 'Santa Venera', 'region_id' => $southernRegion],
            ['name' => 'Zejtun', 'region_id' => $southernRegion],
            ['name' => 'Birgu', 'region_id' => $portRegion],
            ['name' => 'Bormla', 'region_id' => $portRegion],
            ['name' => 'Fgura', 'region_id' => $portRegion],
            ['name' => 'Floriana', 'region_id' => $portRegion],
            ['name' => 'Isla', 'region_id' => $portRegion],
            ['name' => 'Kalkara', 'region_id' => $portRegion],
            ['name' => 'Paola', 'region_id' => $portRegion],
            ['name' => 'Tarxien', 'region_id' => $portRegion],
            ['name' => 'Valletta', 'region_id' => $portRegion],
            ['name' => 'Xghajra', 'region_id' => $portRegion],
            ['name' => 'Zabbar', 'region_id' => $portRegion],
            ['name' => 'Attard', 'region_id' => $northernRegion],
            ['name' => 'Bahar ic-Caghaq', 'region_id' => $northernRegion],
            ['name' => 'Bidnija', 'region_id' => $northernRegion],
            ['name' => 'Balzan', 'region_id' => $northernRegion],
            ['name' => 'Mellieha', 'region_id' => $northernRegion],
            ['name' => 'L-Imgarr', 'region_id' => $northernRegion],
            ['name' => 'Mosta', 'region_id' => $northernRegion],
            ['name' => 'Mtarfa', 'region_id' => $northernRegion],
            ['name' => 'Naxxar', 'region_id' => $northernRegion],
            ['name' => 'San Pawl il-Bahar', 'region_id' => $northernRegion],
        ];

        foreach($locationObjects as $locationObject) {
            Location::create($locationObject);
        }
    }
}