<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Http\Requests\StoreMateriaRequest;
use App\Http\Requests\UpdateMateriaRequest;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materia::where('user_id', auth()->id())->get();
        return view('materias.index', compact('materias'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('materias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMateriaRequest $request)
    {
        Materia::create([
            'nome' => $request->nome,
            'professor' => $request->professor,
            'descricao' => $request->descricao,
            'cor' => $request->cor,
            'user_id' => auth()->id(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort_if($materia->user_id !== auth()->id(), 403);
        return view('materias.edit', compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        abort_if($materia->user_id !== auth()->id(), 403);

        $materia->update([
            'nome' => $request->nome,
            'professor' => $request->professor,
            'descricao' => $request->descricao,
            'cor' => $request->cor,
        ]);

        return redirect()->route('materias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia $materia)
    {
        abort_if($materia->user_id !== auth()->id(), 403);
        $materia->delete();
        return redirect()->route('materia.index');
    }
}
