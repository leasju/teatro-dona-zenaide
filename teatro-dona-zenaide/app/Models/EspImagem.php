<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EspImagem extends Model
{
    protected $fillable = [
        'espetaculo_id',
        'img',
        'principal',
    ];

    public function espetaculo(): BelongsTo
    {
        return $this->belongsTo(Espetaculo::class);
    }
}
