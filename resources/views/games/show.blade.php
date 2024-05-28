@extends('layouts.app')

@section('content')
<div class="container my-5 mx-10 text-center">

@if(!isset($nextQuestion))
    <h1>Domanda {{$question->order}}</h1>
    <h2>{{ $question->question->question_text }}</h2>
    <p>{{$question->question->category}}</p>
    <form method="POST" action="{{ route('games.answer') }}">
        @csrf
        <input type="hidden" name="game_id" value="{{ $game->id }}">
        <input type="hidden" name="question_id" value="{{ $question->question_id }}">
        <input type="hidden" name="game_question_id" value="{{  $question->question_id }}">
        
        <ul class="columns-4 my-10">
            @foreach($question->question->answers as $answer)
                <li>
                    <label>
                        <input type="radio" name="answer_id" value="{{ $answer->id }}">
                        {{ $answer->answer_text }}
                    </label>
                </li>
                @endforeach
            </ul>
            
            <button type="submit" class="bg-slate-500 hover:px-5 py-3">Invia risposta</button>
    </form>
    {{-- @else
    <h2>Prossima domanda</h2>
    <p>{{ $nextQuestion->question->question_text }}</p>
    <!-- Mostra le opzioni di risposta e il form per inviare la risposta -->
    <form method="POST" action="{{ route('games.answer') }}">
        @csrf
        <input type="hidden" name="game_id" value="{{ $game->id }}">
        <input type="hidden" name="question_id" value="{{ $nextQuestion->question_id }}">
        <input type="hidden" name="game_question_id" value="{{  $nextQuestion->question_id }}">
        
        <ul class="columns-4 my-10">
            @foreach($nextQuestion->question->answers as $answer)
                <li>
                    <label>
                        <input type="radio" name="answer_id" value="{{ $answer->id }}">
                        {{ $answer->answer_text }}
                    </label>
                </li>
                @endforeach
            </ul>
            
            <button type="submit" class="bg-slate-500 hover:px-5 py-3">Invia risposta</button>
    </form> --}}
@endif
    
</div>
@endsection
