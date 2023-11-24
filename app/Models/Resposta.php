<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'pergunta_id', 'selecionada',
    ];

    public function pergunta()
    {
        return $this->belongsTo(Pergunta::class, 'pergunta_id');
    }
}