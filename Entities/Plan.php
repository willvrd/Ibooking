<?php

namespace Modules\Ibooking\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use Translatable;

    protected $table = 'ibooking__plans';

    public $translatedAttributes = [
        'title'
    ];
    protected $fillable = [
        'event_id',
        'status',
        'options'
    ];

    protected $fakeColumns = ['options'];

    protected $casts = [
      'options' => 'array'
    ];


    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function setOptionsAttribute($value) {
        $this->attributes['options'] = json_encode($value);
    }

    public function getOptionsAttribute($value) {
        return json_decode($value);
    }

}
