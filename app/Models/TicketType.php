<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    public $fillable = ['id', 'description', 'price', 'eventID'];

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function soldTickets() {
        return $this->hasMany(SoldTicket::class);
    }
}
