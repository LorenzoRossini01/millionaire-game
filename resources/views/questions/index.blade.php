@extends('layouts.app')

@section('content')
<div class="container my-5 mx-10">

    <h1>Domande</h1>
    <a href="{{ route('questions.create') }}">Aggiungi Nuova Domanda</a>
    <table class="hover:table-fixed my-10 border-collapse border border-slate-400">
        <thead>
            <tr>
                <th class="border border-slate-300 p-5">Questions</th>
                <th class="border border-slate-300 p-5">Answers</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
                <tr>
                    <td class="border border-slate-300 py-3 px-5">{{ $question->question_text }}</td>
                    <td class="border border-slate-300 py-3 px-5">
                        <ul class="flex text-wrap">
                            @foreach($question->answers as $answer)
                                <li @class(['text-lime-500' => $answer->is_correct])>{{ $answer->answer_text }}, </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    {{-- <ul>
        @foreach($questions as $question)
            <li>{{ $question->question_text }}</li>
        @endforeach
    </ul> --}}
@endsection