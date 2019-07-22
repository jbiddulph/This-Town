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
    public function users() {
        return $this->belongsToMany(User::class)->withTimeStamps();
    }
    public function showInterest() {
        return \DB::table('event_user')->where('user_id',auth()->user()->id)->where('status','Interested')->where
        ('event_id',$this->id)->exists();
    }
    public function checkAttending() {
        return \DB::table('event_user')->where('user_id',auth()->user()->id)->where('status','Attending')->where
        ('event_id',$this->id)->exists();
    }
    public function favouriteevents() {
        return $this->belongsToMany(Event::class, 'favevents','event_id','user_id')
            ->withTimeStamps();
    }
    public function checkSavedevent() {
        return \DB::table('favevents')->where('user_id',auth()->user()->id)->where
        ('event_id',$this->id)->exists();
    }
}
