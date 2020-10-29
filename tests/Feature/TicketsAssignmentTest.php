<?php

namespace Tests\Feature;

use App\TicketAssignment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketsAssignmentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function ticket_assignment_can_be_created()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/ticket_assignments',[
            'id_ticket' => 1,
            'id_buyer' =>1
        ]);
        $response->assertOk();
        $this->assertCount(1,TicketAssignment::all());
        $ticketass= TicketAssignment::first();
        $this->assertEquals($ticketass->id_ticket, 1);
        $this->assertEquals($ticketass->id_buyer, 1);

    }

     /** @test */
     public function list_ticket_assignment_can_be_retrieved()
     {
         $this->withoutExceptionHandling();
 
         factory(TicketAssignment::class, 3)->create();
         $response = $this->get('/ticket_assignments');
         $response->assertOk();
         
     }

    /** @test */
    public function ticket_assignment_can_be_retrieved()
    {
        $this->withoutExceptionHandling();

        $ticketass = factory(TicketAssignment::class)->create();
        $response = $this->get('/ticket_assignments/'.$ticketass->id);
        $response->assertOk();
        
    }

    /** @test */
    public function ticket_assignment_can_be_update()
    {
        $this->withoutExceptionHandling();
        $ticketass = factory(TicketAssignment::class)->create();
        $response = $this->put('/ticket_assignments/'.$ticketass->id,[
            'id_ticket' => 1,
            'id_buyer' =>1
        ]);
        $this->assertCount(1,TicketAssignment::all());
        $ticketass= $ticketass->fresh();
        $this->assertEquals($ticketass->id_ticket, 1);
        $this->assertEquals($ticketass->id_buyer, 1);
    }

    /** @test */
    public function ticket_assignment_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $ticketass = factory(TicketAssignment::class)->create();
        $response = $this->delete('/ticket_assignments/'.$ticketass->id);

        $this->assertCount(0, TicketAssignment::all());
        
    }
}
