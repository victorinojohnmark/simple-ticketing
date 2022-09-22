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

    //RELATIONSHIPS
    public function ticketReplies()
    {
        return $this->hasMany(TicketReply::class);
    }

    //CUSTOM ATTRIBUTES
    public function getStatusBadgeAttribute()
    {
       

        switch ($this->status) {
            case 'Open':
                return '<span class="badge badge-secondary mb-2">'.$this->status.'</span>';
                break;
            
            case 'Pending':
                return '<span class="badge badge-warning mb-2">'.$this->status.'</span>';
                break;
            
            case 'Resolved':
                return '<span class="badge badge-info mb-2">'.$this->status.'</span>';
                break;

            case 'Closed':
                return '<span class="badge badge-success mb-2">'.$this->status.'</span>';
                break;

            default:
                return '';
                break;
        }
    }

    public function getPriorityBadgeAttribute()
    {
       

        switch ($this->priority) {
            case 'Low':
                return '<span class="badge badge-light mb-2">'.$this->priority.'</span>';
                break;
            
            case 'Medium':
                return '<span class="badge badge-secondary mb-2">'.$this->priority.'</span>';
                break;
            
            case 'High':
                return '<span class="badge badge-dark mb-2">'.$this->priority.'</span>';
                break;

            case 'Urgent':
                return '<span class="badge badge-danger mb-2">'.$this->priority.'</span>';
                break;

            default:
                return '';
                break;
        }
    }


    //METHODS
    public function updateStatus($status)
    {
        $this->status = $status;
        $this->update();
    }




}
