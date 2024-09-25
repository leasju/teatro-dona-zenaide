<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EspImagem extends Model
{
    protected $fillable = [
        'fk_espetaculo_id',
        'img_id',
        'img',
        'principal',
    ];

    public function espetaculo(): BelongsTo
    {
        return $this->belongsTo(Espetaculo::class, 'fk_espetaculo_id');
    }
}
