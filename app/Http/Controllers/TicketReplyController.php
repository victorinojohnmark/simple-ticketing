<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\TicketReply;

class TicketReplyController extends Controller
{
    public function ticketreplysave(Request $request)
    {
        $data = $request->validate([
            'ticket_id' => 'required|integer',
            'description' => 'required',
            'ticket_status' => 'required'
        ]);

        $data['created_by_id'] = Auth::id();

        //temporarily remove until ticket status change feature available
        // unset($data['ticket_status']);

        //create data
        $ticketReply = TicketReply::create($data);

        $ticketReply->ticket->updateStatus($data['ticket_status']);

        return redirect()->route('ticketview', ['id' => $request->ticket_id])->with('success', 'Reply created.');
    }   
}
