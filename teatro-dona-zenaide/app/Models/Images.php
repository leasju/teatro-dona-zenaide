<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;
    protected $table = "images";


// Relaçaõ imagens
public function espetaculos()
{
    return $this->belongsToMany(Espetaculos::class, 'espetaculo_imagem');
}

}
