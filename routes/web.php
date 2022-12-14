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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Tickets
    Route::get('tickets', 'TicketController@ticketview')->name('ticketview');
    Route::get('tickets/create', 'TicketController@ticketcreate')->name('ticketcreate');
    Route::post('tickets/save', 'TicketController@ticketsave')->name('ticketsave');

    //Ticket Replies
    Route::post('ticketreply/save', 'TicketReplyController@ticketreplysave')->name('ticketreplysave');

    //File Attachments
    Route::post('fileattachment/save', 'FileAttachmentController@uploadfile')->name('uploadfile');

    
});


