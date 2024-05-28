<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\GameQuestion;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{

    // init game 
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        // Ottieni l'ID dell'utente autenticato
        $userId = Auth::id();
    
        // Crea un nuovo gioco per l'utente autenticato
        $game = Game::create([
            'user_id' => $userId,
            'start_time' => now(),
        ]);

        // dd($game);
    
        // Assegna domande al gioco
        $questions = Question::inRandomOrder()->take(10)->get();
    
        $orders = range(1, 10);
        shuffle($orders);
    
        foreach ($questions as $index => $question) {
            GameQuestion::create([
                'game_id' => $game->id,
                'question_id' => $question->id,
                'order' => $orders[$index], // Incrementa l'ordine per ogni domanda
            ]);
        }
    
        // Ottieni la prima domanda associata al nuovo gioco
        $firstGameQuestion = $game->gameQuestions()->orderBy('order')->first();
        $gameId=$game->id;

        return  view('games.index', compact('gameId','firstGameQuestion'));
    }

    public function show($gameId, $questionId)
    {
        // Trova il gioco e la domanda corrispondenti agli ID forniti
        $game = Game::findOrFail($gameId);
        $question = GameQuestion::findOrFail($questionId);

        // dd($question);
        
        // Mostra la vista con la domanda e il gioco
        return view('games.show', compact('game', 'question'));
    }
    

    public function answer(Request $request)
    {
        // Validazione dei dati inviati nel form
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'question_id' => 'required|exists:questions,id',
            'answer_id' => 'required|exists:answers,id',
            'game_question_id' => 'required|exists:game_questions,id',
        ]);
    
        // Ottenere l'istanza del gioco, della domanda e della risposta selezionata dall'utente
        $game = Game::findOrFail($request->game_id);
        $question = GameQuestion::findOrFail($request->game_question_id);  // Ottieni l'istanza di GameQuestion
        $selectedAnswer = Answer::findOrFail($request->answer_id);
    
        // Verifica se la risposta selezionata dall'utente è corretta
        $isCorrect = $selectedAnswer->is_correct;
    
        // Registra la risposta dell'utente nel database
        UserAnswer::create([
            'game_id' => $game->id,
            'question_id' => $question->question_id,
            'answer_id' => $selectedAnswer->id,
            'game_question_id' => $question->id,
            'is_correct' => $isCorrect,
        ]);
    
        // Trova l'ordine della prossima domanda
        $nextQuestionOrder = $question->order;
        // dd($nextQuestionOrder);
    
        // Trova la prossima domanda nel gioco
        $nextQuestion = $game->gameQuestions()
            ->where( 'order','>', $nextQuestionOrder)
            ->first();
    
        // Se la risposta è corretta e c'è una prossima domanda, mostra la prossima domanda
        if ($isCorrect && $nextQuestion) {
            // Passa i dettagli della prossima domanda alla vista
            return redirect()->route('games.show', ['game' => $game->id, 'question' => $nextQuestion->id]);
        } else {
            // Altrimenti, reindirizzalo alla home
            return redirect()->route('dashboard');
        }
    }
    

    
    
}
