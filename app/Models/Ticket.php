<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by_id', 'classification_header', 'classification_desc', 'subject',
        'department_id', 'bl_no', 'priority', 'expected_date_accomplished', 'description'
    ];

    public function ticketReplies()
    {
        return $this->hasMany(TicketReply::class);
    }


}
