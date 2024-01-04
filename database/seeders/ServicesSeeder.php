<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            ['name' => 'Passport Application', 'code' => 'PA', 'cost' => 7000],
            ['name' => 'Visa Application', 'code' => 'VA', 'cost' => 2000],
            ['name' => 'Student Visa Application', 'code' => 'VA-S', 'cost' => 10000],
            ['name' => 'Medical Visa Application', 'code' => 'VA-M', 'cost' => 8000],
        ];

        foreach ($services as $key => $service){
            Service::updateOrCreate([
                'name' => $service['name'],
                'slug' => Str::slug($service['name']),
                'code' => $service['code'],
                'description' => 'This is for demo purpose',
                'cost' => $service['cost'],
            ]);
        }
    }
}
