<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'store_name',
        'address',
        'image_url',
        'title',
        'body',
        'evaluation',
        'user_id',
        'phone_number',
        'menu',
        'store_image',
        'holiday',
        'open',
        'genre',
        'lat',
        'lng',
        ];

    public function user(){
	return $this->belongsTo('App\User');
}

public function getLat(){

if(isset($this->address)){

mb_language("Japanese");
mb_internal_encoding("UTF-8");


$address = $this->address;
$myKey = "AIzaSyBWGVkl90qpryhG_Fglt8fXZolre1uld3c";

$address = urlencode($address);

$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "+CA&key=" . $myKey ;

$contents= file_get_contents($url);
$jsonData = json_decode($contents,true);

$lat = $jsonData["results"][0]["geometry"]["location"]["lat"];
$lng = $jsonData["results"][0]["geometry"]["location"]["lng"];

return $lat;
}

}

public function getLng(){

if(isset($this->address)){

mb_language("Japanese");
mb_internal_encoding("UTF-8");


$address = $this->address;
$myKey = "AIzaSyBWGVkl90qpryhG_Fglt8fXZolre1uld3c";

$address = urlencode($address);

$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "+CA&key=" . $myKey ;

$contents= file_get_contents($url);
$jsonData = json_decode($contents,true);

$lat = $jsonData["results"][0]["geometry"]["location"]["lat"];
$lng = $jsonData["results"][0]["geometry"]["location"]["lng"];

return $lng;
}

}

}
