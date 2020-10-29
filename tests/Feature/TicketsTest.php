<?php

namespace Tests\Feature;

use App\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function ticket_can_be_created()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/tickets',[
            'names' => 'Boleta 1'
        ]);
        $response->assertOk();
        $this->assertCount(1,Ticket::all());
        $ticket= Ticket::first();
        $this->assertEquals($ticket->names, 'Boleta 1');

    }

     /** @test */
     public function list_ticket_can_be_retrieved()
     {
         $this->withoutExceptionHandling();
 
         factory(Ticket::class, 3)->create();
         $response = $this->get('/tickets');
         $response->assertOk();
         
     }

    /** @test */
    public function ticket_can_be_retrieved()
    {
        $this->withoutExceptionHandling();

        $ticket = factory(Ticket::class)->create();
        $response = $this->get('/tickets/'.$ticket->id);
        $response->assertOk();
        
    }

    /** @test */
    public function ticket_can_be_update()
    {
        $this->withoutExceptionHandling();
        $ticket = factory(Ticket::class)->create();
        $response = $this->put('/tickets/'.$ticket->id,[
            'names' => 'Boleta 1'
        ]);
        $this->assertCount(1,Ticket::all());
        $ticket= $ticket->fresh();
        $this->assertEquals($ticket->names, 'Boleta 1');
    }

    /** @test */
    public function ticket_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $ticket = factory(Ticket::class)->create();
        $response = $this->delete('/tickets/'.$ticket->id);

        $this->assertCount(0, Ticket::all());
        
    }
}
