<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageAd extends Model
{
    //
    protected $table = "imagesAds";

    protected $fillable = ['name','ads_id'];

    public function ads(){
    	return $this->belongsTo('App\Ad');
    }

}
