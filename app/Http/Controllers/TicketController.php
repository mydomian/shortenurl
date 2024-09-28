<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Services\TicketServices;
use Illuminate\Http\Request;

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
        $tickets =  $this->ticketService->tickets()->where('user_id', auth()->id());
        return view('user.tickets.index', compact('tickets'));
    }

    // create a ticket
    public function create()
    {
        return view('user.tickets.create');
    }

    //ticket store and send email
    public function store(Request $request)
    {
        $this->ticketService->createTicketWithEmail($request->all());
        return redirect()->route('tickets.index')->with('Ticket Created Successfully');
    }

    //ticket delete
    public function destroy(string $id)
    {
        $this->ticketService->deleteTicket($id);
        return redirect()->route('tickets.index')->with('error', 'Ticket Deleted Successfully');
    }
}
