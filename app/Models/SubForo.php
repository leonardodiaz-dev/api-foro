<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubForo extends Model
{
    /** @use HasFactory<\Database\Factories\SubForoFactory> */
    use HasFactory;

    protected $fillable = ['nombre', 'slug', 'descripcion', 'foro_id'];

    protected $table = 'subforos';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function slug($nombre)
    {
        $slug = Str::slug($nombre);
        $count = Tema::where('slug', 'LIKE', "{$slug}%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function foro()
    {
        return $this->belongsTo(Foro::class);
    }

    public function temas()
    {
        return $this->hasMany(Tema::class, 'subforo_id'); 
    }
}
