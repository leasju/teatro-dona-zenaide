<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EspImagem extends Model
{
    protected $fillable = [
        'img',
        'principal',
    ];

    public function espetaculos()
    {
        return $this->belongsToMany(Espetaculo::class, 'fk_id_esp');
    }// fk_id_img
}
