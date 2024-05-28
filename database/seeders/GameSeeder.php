<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    public function run()
    {
        $csvFile = database_path('seeds/games.csv');
        $games = array_map('str_getcsv', file($csvFile));
        $header = array_shift($games);

        foreach ($games as $gameData) {
            $game = [];
            foreach ($header as $key => $column) {
                // Verifica se il dato esiste e se non è vuoto
                $game[$column] = isset($gameData[$key]) && $gameData[$key] !== '' ? $gameData[$key] : null;
            }
            Game::create($game);
        }
    }
}
