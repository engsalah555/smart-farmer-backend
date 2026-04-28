<?php

namespace App\Events;

use App\Models\IotDevice;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DeviceTelemetryUpdated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $device;
    public $telemetryData;

    /**
     * Create a new event instance.
     */
    public function __construct(IotDevice $device, array $telemetryData)
    {
        $this->device = $device;
        $this->telemetryData = $telemetryData;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('user.' . $this->device->user_id),
        ];
    }
    
    public function broadcastAs(): string
    {
        return 'DeviceTelemetryUpdated';
    }

    /**
     * Get the data to broadcast.
     */
    public function broadcastWith(): array
    {
        return [
            'device_id' => $this->device->device_id,
            'telemetry' => $this->telemetryData,
        ];
    }
}
