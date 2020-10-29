<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::post("/tickets", "TicketController@store");
Route::get("/tickets", "TicketController@index");
Route::get("/tickets/{ticket}", "TicketController@show");
Route::put("/tickets/{ticket}", "TicketController@update");
Route::delete("/tickets/{ticket}", "TicketController@destroy");*/

Route::apiResource("tickets", "TicketController");

Route::post("/ticket_assignments", "TicketAssignmentController@store");
Route::get("/ticket_assignments", "TicketAssignmentController@index");
Route::get("/ticket_assignments/{ticketAssignment}", "TicketAssignmentController@show");
Route::put("/ticket_assignments/{ticketAssignment}", "TicketAssignmentController@update");
Route::delete("/ticket_assignments/{ticketAssignment}", "TicketAssignmentController@destroy");
