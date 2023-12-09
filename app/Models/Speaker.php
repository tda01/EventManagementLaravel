<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    public $fillable = ['id', 'firstName', 'lastName', 'description', 'img', 'occupation', 'email'];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_speaker', 'speakerID', 'eventID');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
