<?php

namespace Modules\Ibooking\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use Translatable;

    protected $table = 'ibooking__events';

    public $translatedAttributes = [
        'title',
        'slug',
        'description',
        'summary'
    ];
    protected $fillable = [
        'place',
        'status',
        'options',
        'duration',
        'people',
        'inforprice',
        'video'
    ];

    protected $fakeColumns = ['options'];

    protected $casts = [
      'options' => 'array'
    ];


    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    public function days(){
        return $this->belongsToMany(Day::class,'ibooking__day_event')->withTimestamps();
    }

    public function setOptionsAttribute($value) {
        $this->attributes['options'] = json_encode($value);
    }

    public function getOptionsAttribute($value) {
        return json_decode($value);
    }

    


}
