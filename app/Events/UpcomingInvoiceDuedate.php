<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpcomingInvoiceDuedate implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $upcominginvoice;

    public function __construct($upcominginvoice)
    {
        $this->upcominginvoice = $upcominginvoice;
        info('upcomingInvoice');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('my-channel', $this->upcominginvoice->id),
        ];
    }

    public function broadcastAs(): string
    {
        return 'upcoming_invoice';
    }
}
