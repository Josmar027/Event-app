<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_evento',
        'contenido'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class);
    }
}
