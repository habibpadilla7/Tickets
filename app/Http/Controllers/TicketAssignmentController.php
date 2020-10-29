<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TicketAssignment;

class TicketAssignmentController extends Controller
{
    public function index(){
        $ticketass = TicketAssignment::all();
        return $ticketass;
    }
    public function store(){
        $data = request()->validate([
            'id_ticket' => 'required',
            'id_buyer' =>'required'
        ]);
        TicketAssignment::create($data);
    }
    public function show(TicketAssignment $ticketass){
   
        return compact('ticketass');
    }
    public function update(TicketAssignment $ticketAssignment){
   
        $data = request()->validate([
            'id_ticket' => 'required',
            'id_buyer' =>'required'
        ]);
        $ticketAssignment->update($data);
    }
    public function destroy(TicketAssignment $ticketAssignment){
   
        $ticketAssignment->delete();
    }
}
