<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Foro extends Model
{
    /** @use HasFactory<\Database\Factories\ForoFactory> */
    use HasFactory;

    protected $fillable = ['nombre','slug'];

     public static function slug($nombre)
    {
        $slug = Str::slug($nombre);
        $count = Tema::where('slug', 'LIKE', "{$slug}%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function subforos()
    {
        return $this->hasMany(Subforo::class);
    }
}
