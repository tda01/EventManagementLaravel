<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $fillable = ['id', 'title', 'location', 'description', 'img'];

    public function contact()
    {
        return $this->hasOne(Contact::class, 'eventID');
    }
    public function speakers()
    {
        return $this->belongsToMany(Speaker::class, 'event_speaker', 'eventID', 'speakerID');
    }

    public function partners()
    {
        return $this->belongsToMany(Partner::class, 'event_partner', 'eventID', 'partnerID');
    }

    public function eventDays()
    {
        return $this->hasMany(EventDay::class, 'eventID');
    }

    public function ticketTypes() {
        return $this->hasMany(TicketType::class, 'eventID');
    }

}
