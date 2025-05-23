<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    // protected $fillable = [
    //     'categoria_id', 'user_id', 'nombre', 'descripcion', 'cantidad', 'precio', 'imagen'
    // ];
    public function links(){
        return $this->hasMany(Link::class, 'producto_id');
    }
}
