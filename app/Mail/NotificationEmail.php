<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $ticket;

    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->view('emails.ticket')
                    ->subject('Ticket Notification')
                    ->with([
                        'name' => $this->ticket->user->name ?? '',
                        'ticket_title' => $this->ticket->ticket_title ?? '',
                        'ticket_issues' => $this->ticket->ticket_issues ?? '',
                        'status' => $this->ticket->status ?? ''
                    ]);
    }
}
