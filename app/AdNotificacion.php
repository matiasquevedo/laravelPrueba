<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdNotificacion extends Model
{
    //
     protected $table = "adsnotificacion";

    protected $fillable = ['name','image','description'];

    public function ad(){
    	return $this->belongsTo('App\Ad');
    }
}
