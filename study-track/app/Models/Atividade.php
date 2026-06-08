<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Materia;

class Atividade extends Model
{
    protected $fillable = [
        'titulo',
        'descricao',
        'data_entrega',
        'status',
        'materia_id',
        'user_id',
    ];

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
