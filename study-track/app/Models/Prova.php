<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Materia;
use App\Models\Prova;

class Prova extends Model
{
    protected $fillable = [
        'titulo',
        'descricao',
        'nota',
        'bimestre',
        'data_prova',
        'materia_id',
        'user_id'
    ];

    public function Materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function provas()
    {
        return $this->hasMany(Prova::class);
    }
}
