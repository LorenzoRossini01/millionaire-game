<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $csvFile = database_path('seeds/questions.csv');

        $questions = array_map('str_getcsv', file($csvFile));

        $header = array_shift($questions);

        foreach ($questions as $questionData) {
            $question = [];
            foreach ($header as $key => $column) {
                $question[$column] = $questionData[$key];
            }
            Question::create($question);
        }
    }
}
