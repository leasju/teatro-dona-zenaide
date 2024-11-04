<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Use a classe User como base
use Illuminate\Support\Facades\Hash;

class Login extends Authenticatable // Mude de Model para Authenticatable
{
    use HasFactory;

    protected $table = "login";
    protected $primaryKey = 'id';
    
    // Campos que podem ser atribuídos em massa
    protected $fillable = ['adm_user', 'adm_pass']; // Inclua adm_pass aqui

    // Campos que devem ser protegidos de atribuição em massa
    protected $guarded = []; // Remova adm_pass da proteção

    // Método para verificar a senha
    public function verifyPassword($password)
    {
        return Hash::check($password, $this->adm_pass);
    }
}
