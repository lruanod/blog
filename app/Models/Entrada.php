<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $fillable =['titulo','descripcion'];

    /***  relacion de entrada a muchas imagenes**/
    public function entradas(){
        return $this->hasMany('App\Models\Imagen');
    }
}
