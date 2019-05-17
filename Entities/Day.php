<?php

namespace Modules\Ibooking\Entities;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
   
    protected $table = 'ibooking__days';
    protected $fillable = [
        'num',
        'status',
        'date'
    ];

    public function events(){
        return $this->belongsToMany(Event::class,'ibooking__day_event')->withTimestamps();
    }

    public function slots(){
        return $this->belongsToMany(Slot::class,'ibooking__day_slot')->withTimestamps();
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
