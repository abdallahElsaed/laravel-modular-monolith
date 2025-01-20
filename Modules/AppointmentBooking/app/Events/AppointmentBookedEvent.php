<?php

namespace Modules\AppointmentBooking\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\AppointmentBooking\Domain\Entities\AppointmentEntity;

class AppointmentBookedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public array $appointmentData;
    /**
     * Create a new event instance.
     */
    public function __construct(array $appointmentData)
    {
        $this->appointmentData = $appointmentData;
    }

    /**
     * Get the channels the event should be broadcast on.
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
