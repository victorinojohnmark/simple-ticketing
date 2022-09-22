<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by_id', 'ticket_id', 'description'
    ];

    //RELATIONSHIP
    public function user() 
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }

    //CUSTOM ATTRIBUTE
    public function getCreatedByAttribute()
    {
        return $this->user->name;
    }

    //METHODS
    
}
