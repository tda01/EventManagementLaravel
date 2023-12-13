<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldTicket extends Model
{
    public $fillable = ['id', 'eventID', 'userID'];

    public function ticketType() {
        return $this->belongsTo(TicketType::class);
    }

}
