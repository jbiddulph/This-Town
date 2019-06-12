<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function getRouteKeyName() {
        return 'slug';
    }
    public function venue(){
        return $this->belongsTo('App\Venue');
    }
}
