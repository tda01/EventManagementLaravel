<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDay extends Model
{
    public $fillable = ['id', 'date', 'eventID'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'eventDayID');
    }
}
