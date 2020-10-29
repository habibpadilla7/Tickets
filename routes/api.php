<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource("buyers", "BuyerController");
Route::apiResource("tickets", "TicketController");
Route::post("/ticket_assignments", "TicketAssignmentController@store");
Route::get("/ticket_assignments", "TicketAssignmentController@index");
Route::get("/ticket_assignments/{ticketAssignment}", "TicketAssignmentController@show");
Route::put("/ticket_assignments/{ticketAssignment}", "TicketAssignmentController@update");
Route::delete("/ticket_assignments/{ticketAssignment}", "TicketAssignmentController@destroy");