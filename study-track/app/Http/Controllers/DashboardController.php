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
                ->map(fn ($n) => round((float) $n, 2))
                ->values()
                ->toArray();

            if (count($notas) === 0) {
                continue;
            }

            // Média acumulada
            $mediaAcumulada = [];
            $soma = 0;

            foreach ($notas as $i => $nota) {
                $soma += $nota;
                $mediaAcumulada[] = round($soma / ($i + 1), 2);
            }

            // Estatísticas
            $mediaFinal = round(array_sum($notas) / count($notas), 2);

            $melhorNota = max($notas);

            $piorNota = min($notas);

            $quantidadeProvas = count($notas);

            // Situação
            if ($mediaFinal >= 7) {
                $situacao = 'Aprovado';
            } elseif ($mediaFinal >= 5) {
                $situacao = 'Recuperação';
            } else {
                $situacao = 'Reprovado';
            }

            // Evolução
            if ($quantidadeProvas < 2) {

                $evolucao = 'Sem dados suficientes';

            } else {

                $ultimaNota = $notas[$quantidadeProvas - 1];
                $penultimaNota = $notas[$quantidadeProvas - 2];

                if ($ultimaNota > $penultimaNota) {
                    $evolucao = '📈 Melhorando';
                } elseif ($ultimaNota < $penultimaNota) {
                    $evolucao = '📉 Piorando';
                } else {
                    $evolucao = '➖ Estável';
                }
            }

            $dadosGrafico[] = [
                'materia' => $provas->first()->materia->nome ?? 'Sem nome',
                'notas' => $notas,
                'media' => $mediaAcumulada,
                'media_final' => $mediaFinal,
                'melhor_nota' => $melhorNota,
                'pior_nota' => $piorNota,
                'quantidade_provas' => $quantidadeProvas,
                'situacao' => $situacao,
                'evolucao' => $evolucao
            ];
        }

        return view('dashboard', compact('dadosGrafico'));
    }
}