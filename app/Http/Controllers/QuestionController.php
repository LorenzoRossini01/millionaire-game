<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        // Validazione e salvataggio della domanda e delle risposte
        $data = $request->validate([
            'question_text' => 'required|string',
            'difficulty' => 'required|string',
            'category' => 'required|string',
            'answers' => 'required|array',
            'answers.*.answer_text' => 'required|string',
            'answers.*.is_correct' => 'required|boolean',
        ]);

        $question = Question::create($data);

        foreach ($data['answers'] as $answer) {
            Answer::create([
                'question_id' => $question->id,
                'answer_text' => $answer['answer_text'],
                'is_correct' => $answer['is_correct'],
            ]);
        }

        return redirect()->route('questions.index');
    }

    // Altri metodi per gestire le domande...
}

