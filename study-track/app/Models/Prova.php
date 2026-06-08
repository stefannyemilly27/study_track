<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Materia;

class Prova extends Model
{
    protected $fillable = [
        'titulo',
        'nota',
        'peso',
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
}
