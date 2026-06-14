<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\Materia;
use App\Http\Requests\StoreAtividadeRequest;
use App\Http\Requests\UpdateAtividadeRequest;

class AtividadeController extends Controller
{
    public function index()
    {
        $atividades = Atividade::where(
            'user_id',
            auth()->id()
        )->get();

        return view(
            'atividades.index',
            compact('atividades')
        );
    }

    public function create()
    {
        $materias = Materia::where(
            'user_id',
            auth()->id()
        )->get();

        return view(
            'atividades.create',
            compact('materias')
        );
    }

    public function store(StoreAtividadeRequest $request)
    {
        Atividade::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'data_entrega' => $request->data_entrega,
            'status' => $request->status,
            'materia_id' => $request->materia_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()
            ->route('atividades.index')
            ->with('success', 'Atividade cadastrada com sucesso!');
    }

    public function show(Atividade $atividade)
    {
        //
    }

    public function edit(Atividade $atividade)
    {
        abort_if(
            $atividade->user_id !== auth()->id(),
            403
        );

        $materias = Materia::where(
            'user_id',
            auth()->id()
        )->get();

        return view(
            'atividades.edit',
            compact(
                'atividade',
                'materias'
            )
        );
    }

    public function update(
        UpdateAtividadeRequest $request,
        Atividade $atividade
    ) {
        abort_if(
            $atividade->user_id !== auth()->id(),
            403
        );

        $atividade->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'data_entrega' => $request->data_entrega,
            'status' => $request->status,
            'materia_id' => $request->materia_id,
        ]);

        return redirect()
            ->route('atividades.index')
            ->with('success', 'Atividade atualizada com sucesso!');
    }

    public function destroy(Atividade $atividade)
    {
        abort_if(
            $atividade->user_id !== auth()->id(),
            403
        );

        $atividade->delete();

        return redirect()
            ->route('atividades.index')
            ->with('success', 'Atividade excluída com sucesso!');
    }
}