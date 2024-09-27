<?php

namespace App\Listeners;

use App\Events\TicketCreateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Ticket;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\TicketCreateMail;
class TicketCreateListener
{
    /**
     * Create the event listener.
     */
    public $ticket;
    public function __construct(Ticket $ticket)
    {
        //
        $this->ticket = $ticket;
    }

    /**
     * Handle the event.
     */
    public function handle(TicketCreateEvent $event): void
    {
        //
        $admins = User::where('user_type','admin')->get();
        foreach($admins as $admin){
            Mail::to($admin->email)->send(new TicketCreateMail($event->ticket));
        }

    }
}
