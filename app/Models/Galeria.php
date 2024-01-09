<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Galeria extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'imagen',
        'caption'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
