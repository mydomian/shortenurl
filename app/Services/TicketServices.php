<?php

namespace App\Services;

use App\Models\User;
use App\Models\Ticket;
use App\Mail\NotificationEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketServices
{
    public function tickets()
    {
        try {
            return $tickets = Ticket::with('user')->latest()->get(['id', 'user_id', 'ticket_title', 'ticket_issues', 'status', 'created_at']);
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }
    public function createTicketWithEmail($data)
    {
        try {
            $ticket['user_id'] = Auth::id();
            $ticket['ticket_title'] = $data['ticket_title'] ?? null;
            $ticket['ticket_issues'] = $data['ticket_issues'] ?? null;
            $ticket = Ticket::create($ticket);
            $admin = User::where('role', 'admin')->first();
            Mail::to($admin->email)->send(new NotificationEmail($ticket));
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function deleteTicket($id)
    {
        try {
            Ticket::findOrFail($id)->delete();
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function ticketStatuswithMail($id)
    {
        try {
            $ticket = Ticket::findOrFail($id);
            $ticket->update(['status' => true]);
            Mail::to($ticket->user->email)->send(new NotificationEmail($ticket));
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
