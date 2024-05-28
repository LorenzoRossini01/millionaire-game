<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $csvFile = database_path('seeds/users.csv');

        if (!file_exists($csvFile)) {
            $this->command->error('Il file CSV degli utenti non è stato trovato.');
            return;
        }

        $users = array_map('str_getcsv', file($csvFile));

        $header = array_shift($users);

        foreach ($users as $userData) {
            $user = [];
            foreach ($header as $key => $column) {
                $user[$column] = $userData[$key];
            }
            User::create($user);
        }
    }
}

