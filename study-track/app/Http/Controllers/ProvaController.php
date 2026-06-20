<?php

namespace App\Http\Controllers;

use App\Models\Prova;
use Illuminate\Http\Request;
use App\Models\Materia;

class ProvaController extends Controller
{
    public function index()
    {
        $provas = Prova::where('user_id', auth()->id())
            ->with('materia')
            ->orderBy('data_prova')
            ->get();

        return view('provas.index', compact('provas'));
    }


    public function create()
    {
        $materias = Materia::where('user_id', auth()->id())->get();

        return view('provas.create', compact('materias'));
    }


    public function store(Request $request)
    {
        Prova::create([
            'titulo' => $request->titulo,
            'nota' => $request->nota,
            'data_prova' => $request->data_prova,
            'materia_id' => $request->materia_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Prova adicionada com sucesso!');
    }

    public function edit(Prova $prova)
    {
        return view('provas.edit', compact('prova'));
    }

    public function update(Request $request, Prova $prova)
    {
        $prova->update([
            'titulo' => $request->titulo,
            'nota' => $request->nota,
            'data_prova' => $request->data_prova,
            'materia_id' => $request->materia_id,
        ]);

        return redirect()
            ->route('provas.index')
            ->with('success', 'Prova atualizada com sucesso!');
    }

    public function destroy(Prova $prova)
    {
        $prova->delete();

        return redirect()
            ->route('provas.index')
            ->with('success', 'Prova excluída com sucesso!');
    }
}