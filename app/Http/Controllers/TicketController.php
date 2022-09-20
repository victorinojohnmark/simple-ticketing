<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Ticket;
use App\Models\TicketReply;
use App\Models\Department;

class TicketController extends Controller
{
    public function ticketview(Request $request) {
        if($request->id) {
            return view('ticket.ticketview', [
                'ticket' => Ticket::findOrFail($request->id),
                'ticketReplies' => TicketReply::where('ticket_id', $request->id)->get()
            ]);
        } else {
            return view('ticket.ticketlist', [
                'tickets' => Ticket::all(),
                
            ]);
        }
    }

    public function ticketcreate(Request $request) {
        return view('ticket.ticketform',[
            'departments' => Department::all(),
            'priorities' => json_decode(Storage::disk('json')->get('priorities.json'), true),
            'statuses' => json_decode(Storage::disk('json')->get('statuses.json'), true)
        ]);
    }

    public function ticketsave(Request $request) {
        $data = $request->validate([
            'classification_header' => 'required',
            'classification_desc' => 'required',
            'subject' => 'required',
            'department_id' => 'required|integer',
            'bl_no' => 'required',
            'priority' => 'required',
            'expected_date_accomplished' => 'required|date',
            'description' => 'required'
        ]);

        $data['created_by_id'] = Auth::id();

        Ticket::create($data);

        return redirect()->route('ticketview');
    }

    
}
