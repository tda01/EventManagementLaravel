<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public $fillable = ['id', 'name', 'hour', 'eventDayID', 'speakerID'];

    public function eventDay()
    {
        return $this->belongsTo(EventDay::class);
    }

    public function speaker()
    {
        return $this->belongsTo(Speaker::class);
    }
}
