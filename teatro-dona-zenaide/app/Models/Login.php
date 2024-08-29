<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Login extends Model
{
    use HasFactory;
    protected $table = "login";
    protected $primaryKey = 'id';
    protected $fillable = ['adm_user']; // Liste os campos que podem ser atribuídos em massa
    protected $guarded = ['adm_pass']; // Protege o campo adm_pass
    
   // Método para verificar a senha
   public function verifyPassword($password)
   {
       return Hash::check($password, $this->adm_pass);
   }

}