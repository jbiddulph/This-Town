<?php

namespace App;

use App\Company;
use App\Profile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Venue;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile() {
        return $this->hasOne(Profile::class);
    }

    public function company() {
        return $this->hasOne(Company::class);
    }
    public function venue() {
        return $this->hasOne(Venue::class);
    }
    public function favouritejobs() {
        return $this->belongsToMany(Job::class, 'favourites','user_id','job_id')
            ->withTimeStamps();
    }
    public function favouriteevents() {
        return $this->belongsToMany(Event::class, 'favevents','user_id','event_id')
            ->withTimeStamps();
    }
}
