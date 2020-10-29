<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buyer;

class BuyerController extends Controller
{
    
    public function index(){
        $buyer = Buyer::all();
        return $buyer;
    }
    public function store(){
        $data = request()->validate([
            'names' => '',
            'surnames' => '',
            'identification' => '',
            'email' => ''
        ]);
        $buyer = Buyer::create($data);
        return $buyer;
    }
    public function show(Buyer $buyer){
   
        return compact('buyer');
    }
    public function update(Buyer $buyer){
   
        $data = request()->validate([
            'names' => '',
            'surnames' => '',
            'identification' => '',
            'email' => ''
        ]);
        $buyer->update($data);
    }
    public function destroy(Buyer $buyer){
   
        $buyer->delete();
    }

}
