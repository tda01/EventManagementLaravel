<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $fillable = ['id', 'firstName', 'lastName', 'phoneNumber', 'email', 'eventID'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
