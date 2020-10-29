<?php

use Illuminate\Database\Seeder;
use App\Ticket;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::create(['id' => 1,'names' => 'Boleta 1']);       
        Ticket::create(['id' => 2,'names' => 'Boleta 2']);
        Ticket::create(['id' => 3,'names' => 'Boleta 3']);
        Ticket::create(['id' => 4,'names' => 'Boleta 4']);
        Ticket::create(['id' => 5,'names' => 'Boleta 5']);
        Ticket::create(['id' => 6,'names' => 'Boleta 6']);
        Ticket::create(['id' => 7,'names' => 'Boleta 7']);
        Ticket::create(['id' => 8,'names' => 'Boleta 8']);
        Ticket::create(['id' => 9,'names' => 'Boleta 9']);
        Ticket::create(['id' => 10,'names' => 'Boleta 10']);
        Ticket::create(['id' => 11,'names' => 'Boleta 11']);
    }
}
