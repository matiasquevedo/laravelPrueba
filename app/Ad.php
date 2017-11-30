<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //
    protected $table = "ads";

    protected $fillable = ['category','name','image','description','precio','periodo'];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function images(){
    	return $this->hasMany('App\ImageAd');
    }

}
