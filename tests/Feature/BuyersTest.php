<?php

namespace Tests\Feature;

use App\Buyer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BuyersTest extends TestCase
{
    use RefreshDatabase;

    
    /** @test */
    public function list_can_be_retrieved()
    {
        $this->withoutExceptionHandling();

        factory(Buyer::class, 3)->create();
        $response = $this->get('/buyers');
        $response->assertOk();
        
    }

    /** @test */
    public function buyer_can_be_created()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/buyers',[
            'names' => 'habib',
            'surnames' => 'padilla',
            'identification' => '73203383',
            'email' => 'habibpadilla@hotmail.com',
            'password' => '123456789'
        ]);
        $response->assertOk();
        $this->assertCount(1,Buyer::all());
        $post= Buyer::first();
        $this->assertEquals($post->names, 'habib');
        $this->assertEquals($post->surnames, 'padilla');
        $this->assertEquals($post->identification, '73203383');
        $this->assertEquals($post->email, 'habibpadilla@hotmail.com');
        $this->assertEquals($post->password, '123456789');

    }

    /** @test */
    public function buyer_can_be_retrieved()
    {
        $this->withoutExceptionHandling();

        $buyer = factory(Buyer::class)->create();
        $response = $this->get('/buyers/'.$buyer->id);
        $response->assertOk();
        
    }

    /** @test */
    public function buyer_can_be_update()
    {
        $this->withoutExceptionHandling();
        $buyer = factory(Buyer::class)->create();
        $response = $this->put('/buyers/'.$buyer->id,[
            'names' => 'habib',
            'surnames' => 'padilla',
            'identification' => '73203383',
            'email' => 'habibpadilla@hotmail.com',
            'password' => '123456789'
        ]);
        $this->assertCount(1,Buyer::all());
        $buyer= $buyer->fresh();
        $this->assertEquals($buyer->names, 'habib');
        $this->assertEquals($buyer->surnames, 'padilla');
        $this->assertEquals($buyer->identification, '73203383');
        $this->assertEquals($buyer->email, 'habibpadilla@hotmail.com');
        $this->assertEquals($buyer->password, '123456789');  
    }

    /** @test */
    public function buyer_can_be_deleted()
    {
        $this->withoutExceptionHandling();

        $buyer = factory(Buyer::class)->create();
        $response = $this->delete('/buyers/'.$buyer->id);

        $this->assertCount(0, Buyer::all());
        
    }

}
