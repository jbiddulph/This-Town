<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['user_id', 'venue_id', 'title', 'slug', 'description', 'event_startdate',
        'event_enddate', 'event_starttime', 'event_price',
        'eventcategory_id', 'type', 'status', 'last_date'];

    public function getRouteKeyName() {
        return 'slug';
    }
    public function venue(){
        return $this->belongsTo('App\Venue');
    }
}
