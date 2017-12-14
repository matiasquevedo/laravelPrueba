<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdNoticia extends Model
{
    //
    protected $table = "adsnoticias";

    protected $fillable = ['name','image','description'];

    public function ad(){
    	return $this->belongsTo('App\Ad');
    }
}
