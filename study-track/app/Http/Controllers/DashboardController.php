<?php

namespace App\Http\Controllers;

use App\Models\Prova;

class DashboardController extends Controller
{
    public function index()
    {
        $materias = Prova::where('user_id', auth()->id())
            ->with('materia')
            ->get()
            ->groupBy('materia_id');

        $dadosGrafico = [];

        foreach ($materias as $provas) {

            $provas = $provas->sortBy('data_prova')->values();

            $notas = $provas->pluck('nota')
                ->map(fn($n) => round((float) $n, 2))
                ->values()
                ->toArray();

            // se não tiver provas, ignora matéria
            if (count($notas) === 0) {
                continue;
            }

            // média acumulada
            $mediaAcumulada = [];
            $soma = 0;

            foreach ($notas as $i => $nota) {
                $soma += $nota;
                $mediaAcumulada[] = round($soma / ($i + 1), 2);
            }

            // status
            if (count($notas) < 2) {
                $status = "Sem dados suficientes";
            } else {

                $ultimo = end($mediaAcumulada);
                $penultimo = $mediaAcumulada[count($mediaAcumulada) - 2];

                if ($ultimo > $penultimo) {
                    $status = "📈 Melhorou";
                } elseif ($ultimo < $penultimo) {
                    $status = "📉 Piorou";
                } else {
                    $status = "➖ Manteve";
                }
            }

            $dadosGrafico[] = [
                'materia' => $provas->first()->materia->nome ?? 'Sem nome',
                'notas' => $notas,
                'media' => $mediaAcumulada,
                'status' => $status
            ];
        }

        return view('dashboard', compact('dadosGrafico'));
    }
}