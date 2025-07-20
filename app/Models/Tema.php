<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tema extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'slug', 'contenido','status','user_id', 'subforo_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function slug($titulo)
    {
        $slug = Str::slug($titulo);
        $count = Tema::where('slug', 'LIKE', "{$slug}%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function subforo()
    {
        return $this->belongsTo(Subforo::class, 'subforo_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }
    
    public function ultimaRespuesta()
    {
        return $this->hasOne(Respuesta::class)->latest(); 
    }
}
