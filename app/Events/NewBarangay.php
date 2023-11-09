<?php

namespace App\Events;

use App\Models\Barangay;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewBarangay implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $barangay;
    /**
     * Create a new event instance.
     */
    public function __construct(Barangay $barangay)
    {
        $this->barangay = $barangay;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new Channel('registerBarangay');
    }
}
