@extends('layouts.app')

@section('content')
<div class="container my-5 mx-10">

    <h1>Aggiungi Domanda</h1>
    <form action="{{ route('questions.store') }}" method="POST">
        @csrf
        <div class="row columns-3 my-5">

            <div class="">
                <label>Testo della Domanda:</label>
                <input type="text" name="question_text">
            </div>
            <div class="">
                <label>Difficoltà:</label>
                <input type="text" name="difficulty">
            </div>
            <div class="">
                <label>Categoria:</label>
                <input type="text" name="category">
            </div>
        </div>
        <h2>Risposte:</h2>
        <div>
            <label>Testo della Risposta:</label>
            <input type="text" name="answers[0][answer_text]">
            <label>Corretta:</label>
            <input type="checkbox" name="answers[0][is_correct]" value="1">
        </div>
        <div>
            <label>Testo della Risposta:</label>
            <input type="text" name="answers[1][answer_text]">
            <label>Corretta:</label>
            <input type="checkbox" name="answers[1][is_correct]" value="1">
        </div>
        <div>
            <label>Testo della Risposta:</label>
            <input type="text" name="answers[1][answer_text]">
            <label>Corretta:</label>
            <input type="checkbox" name="answers[1][is_correct]" value="1">
        </div>
        <div>
            <label>Testo della Risposta:</label>
            <input type="text" name="answers[1][answer_text]">
            <label>Corretta:</label>
            <input type="checkbox" name="answers[1][is_correct]" value="1">
        </div>
        <!-- Aggiungi altri campi di risposta secondo necessità -->
        <button type="submit">Salva Domanda</button>
    </form>
</div>

@endsection
