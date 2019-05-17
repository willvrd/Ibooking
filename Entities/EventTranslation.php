<?php

namespace Modules\Ibooking\Entities;

use Illuminate\Database\Eloquent\Model;

class EventTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'summary'
    ];
    protected $table = 'ibooking__event_translations';


    protected function setSlugAttribute($value){

        if(!empty($value)){
            $this->attributes['slug'] = str_slug($value,'-');
        }else{
            $this->attributes['slug'] = str_slug($this->title,'-');
        }

    }

    protected function setSummaryAttribute($value){

        if(!empty($value)){
            $this->attributes['summary'] = $value;
        } else {
            $this->attributes['summary'] = substr(strip_tags($this->description),0,150);
        }

    }

}
