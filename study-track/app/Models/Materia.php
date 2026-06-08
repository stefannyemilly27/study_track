<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Atividade;
use App\Models\Prova;

class Materia extends Model
{
    protected $fillable = [
        'nome',
        'professor',
        'descricao',
        'cor',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function atividades()
    {
        return $this->hasMany(Atividade::class);
    }
    
    public function provas()
    {
        return $this->hasMany(Prova::class);
    }
}
