<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdPrincipal extends Model
{
	protected $table = "adsprincipal";

    protected $fillable = ['name','image','description'];

    public function ad(){
    	return $this->belongsTo('App\Ad');
    }
}
