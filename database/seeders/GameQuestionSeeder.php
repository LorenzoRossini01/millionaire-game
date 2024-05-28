<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Question;
use App\Models\GameQuestion;
use Faker\Factory as Faker;

class GameQuestionSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $games = Game::all();
        $questions = Question::all()->pluck('id')->toArray();

        foreach ($games as $game) {
            // Seleziona 10 domande in modo unico
            $selectedQuestions = $faker->randomElements($questions, 10);

            // Genera un array di ordini unici da 1 a 10
            $orders = range(1, 10);
            shuffle($orders);

            foreach ($selectedQuestions as $index => $questionId) {
                GameQuestion::create([
                    'game_id' => $game->id,
                    'question_id' => $questionId,
                    'order' => $orders[$index],
                ]);
            }
        }
    }
}
