<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    /** @use HasFactory<\Database\Factories\RespuestaFactory> */
    use HasFactory;

    protected $fillable = ['contenido', 'user_id', 'tema_id'];

    public function tema()
    {
        return $this->belongsTo(Tema::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
