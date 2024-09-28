<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\TicketServices;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    protected $ticketService;
    public function __construct(TicketServices $ticketService)
    {
        $this->ticketService = $ticketService;
    }
    //tickets lists
    public function index()
    {
        $tickets =  $this->ticketService->tickets();
        return view('admin.tickets.index', compact('tickets'));
    }

    //ticket status and email send
    public function status($id){
        $this->ticketService->ticketStatuswithMail($id);
        return redirect()->route('admin.tickets')->with('message','Ticket Closed Successfully');
    }
}
