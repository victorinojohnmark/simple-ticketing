<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Ticket;

class TicketController extends Controller
{
    public function ticketview(Request $request) {
        if($request->id) {
            return view('ticket.ticketview', [
                'ticket' => Ticket::findOrFail($request->id)
            ]);
        } else {
            return view('ticket.ticketlist', [
                'tickets' => Ticket::all()
            ]);
        }
    }

    public function ticketcreate(Request $request) {
        return view('ticket.ticketform');
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
