<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Answer;

class AnswerSeeder extends Seeder
{
    public function run()
    {
        $csvFile = database_path('seeds/answers.csv');

        $answers = array_map('str_getcsv', file($csvFile));

        $header = array_shift($answers);

        foreach ($answers as $answerData) {
            $answer = [];
            foreach ($header as $key => $column) {
                $answer[$column] = $answerData[$key];
            }
            Answer::create($answer);
        }
    }
}
