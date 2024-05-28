@extends('layouts.app')

@section('content')
<div class="container my-5 mx-10 text-center">

    <h1 class="my-10">Benvenuto a Chi vuol essere milionario!</h1>
    <a href="{{ route('games.show', [$gameId,$firstGameQuestion]) }}" class="bg-slate-500 hover:px-5 py-3">Inizia un nuovo gioco</a>
</div>
@endsection

