<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public $fillable = ['id', 'name', 'phoneNumber', 'email', 'web', 'img'];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_partner', 'partnerID', 'eventID');
    }


}
