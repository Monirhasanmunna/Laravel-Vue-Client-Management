<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            ['name' => 'Sakib Hossain', 'age' => 32, 'phone' => '01771547845', 'gender' => 'male',   'address' => 'Bogra, Rajshahi, Bangladesh'],
            ['name' => 'Sakil Ahamed',  'age' => 62, 'phone' => '01771547846', 'gender' => 'male',   'address' => 'Bogra, Rajshahi, Bangladesh'],
            ['name' => 'Shamoli Akter', 'age' => 52, 'phone' => '01771547847', 'gender' => 'female', 'address' => 'Bogra, Rajshahi, Bangladesh'],
        ];

        foreach ($clients as $key => $client) {
            Client::updateOrCreate([
                'name' => $client['name'],
                'phone' => $client['phone'],
                'gender' => $client['gender'],
                'address' => $client['address'],
                'age' => $client['age'],
            ]);
        }
    }
}
