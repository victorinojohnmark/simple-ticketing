<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function ticketview(Request $request) {
        return view('ticket.ticketlist');
    }
}
