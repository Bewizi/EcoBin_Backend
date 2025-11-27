<?php

namespace Database\Seeders;

use App\Models\WasteCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $household = WasteCategory::create(
            [
                'name' => 'Household Waste',
                'slug' => 'household',
            ]
        );

        $household->wasteItems()->createMany([
            ['name' => 'Food wrappers'],
            ['name' => 'Used tissues or napkins'],
            ['name' => 'Damaged household items'],
            ['name' => 'Old clothes or fabrics'],
            ['name' => 'All kind of household waste'],
        ]);

        $recyclables = WasteCategory::create(
            [
                'name' => 'Recyclables',
                'slug' => 'recyclables',
            ]
        );

        $recyclables->wasteItems()->createMany([
            ['name' => 'Plastic bottles and containers'],
            ['name' => 'Glass bottles and jars'],
            ['name' => 'Aluminum cans'],
            ['name' => 'Paper and cardboard'],
            ['name' => 'Metal scraps'],
        ]);

        $organicwaste = WasteCategory::create(
            [
                'name' => 'Organic Waste',
                'slug' => 'organicwaste',
            ]
        );

        $organicwaste->wasteItems()->createMany([
            ['name' => 'Food scraps'],
            ['name' => 'Yard waste'],
            ['name' => 'Coffee grounds and tea bags'],
            ['name' => 'Eggshells'],
            ['name' => 'All kind of organic waste'],
        ]);

        $electronicwaste = WasteCategory::create(
            [
                'name' => 'Electronic Waste',
                'slug' => 'electronicwaste',
            ]
        );

        $electronicwaste->wasteItems()->createMany([
            ['name' => 'Old phones and tablets'],
            ['name' => 'Broken laptops and computers'],
            ['name' => 'Used batteries'],
            ['name' => 'Outdated cables and chargers'],
            ['name' => 'All kind of electronic waste'],
        ]);

        $medicalwaste = WasteCategory::create(
            [
                'name' => 'Medical Waste',
                'slug' => 'medicalwaste',
            ]
        );

        $medicalwaste->wasteItems()->createMany([
            ['name' => 'Used bandages and dressings'],
            ['name' => 'Expired medications'],
            ['name' => 'Syringes and needles'],
            ['name' => 'Contaminated gloves and masks'],
            ['name' => 'All kind of medical waste'],
        ]);
    }
}
