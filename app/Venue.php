<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    public function events() {
        return $this->hasMany('App\Event');
    }
    public function getRouteKeyName() {
        return 'slug';
    }
}
