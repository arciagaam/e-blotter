<?php

namespace App\Events;

use App\Models\IssuedKpForm;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewIssuedKPForm
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $issuedKpForm;
    /**
     * Create a new event instance.
     */
    public function __construct(IssuedKpForm $issuedKpForm)
    {
        $this->issuedKpForm = $issuedKpForm;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn()
    {
        return new Channel('issueKpForm');
    }
}
