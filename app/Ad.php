<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //
    protected $table = "ads";

    protected $fillable = ['category','name','image','description'];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
