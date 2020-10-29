<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index(){
        //$ticket = Ticket::all();
        /*$ticket =Ticket::leftJoin("ticket_assignments", "tickets.id", "=", "ticket_assignments.id_ticket")
        ->whereNull('ticket_assignments.id_ticket')
        ->get();*/
        $ticket=DB::table('tickets',)
            ->leftJoin('ticket_assignments', 'tickets.id', '=', 'ticket_assignments.id_ticket')
            ->whereNull('ticket_assignments.id_ticket')
            ->select('tickets.id', 'tickets.names')
            ->get();
            
        return $ticket;
    }
    public function store(){
        $data = request()->validate([
            'names' => ''
        ]);
        Ticket::create($data);
        //$ticket = Ticket::create($data);
        //return $ticket;
    }
    public function show(Ticket $ticket){
   
        return compact('ticket');
    }
    public function update(Ticket $ticket){
   
        $data = request()->validate([
            'names' => ''
        ]);
        $ticket->update($data);
    }
    public function destroy(Ticket $ticket){
   
        $ticket->delete();
    }
}
