<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = [
        'vname', 'user_id', 'slug', 'address', 'town', 'county', 'postcode', 'phone', 'website', 'logo', 'cover_photo', 'slogan', 'description', 'latitude', 'longitude'
    ];

    public function events() {
        return $this->hasMany('App\Event');
    }
    public function getRouteKeyName() {
        return 'slug';
    }
}
