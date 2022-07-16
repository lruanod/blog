<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;

    protected $fillable =['url','entrada_id'];

    /***  relacion de imagen, solo tiene una entrada**/
    public function entrada(){
        return $this->belongsTo('App\Models\Entrada');
    }

}
