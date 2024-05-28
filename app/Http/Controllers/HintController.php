<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hint;

class HintController extends Controller
{
    public function index()
    {
        $hints = Hint::all();
        return view('hints.index', compact('hints'));
    }

    public function create()
    {
        return view('hints.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'hint_name' => 'required|string',
            'description' => 'required|string',
        ]);

        Hint::create($data);

        return redirect()->route('hints.index');
    }

    // Altri metodi per gestire i suggerimenti...
}
