<?php

namespace App\Events;

use App\Modules\Iot\Domain\Models\IotDevice;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DeviceStatusUpdated
{
    use Dispatchable, SerializesModels;

    public $device;

    /**
     * Create a new event instance.
     */
    public function __construct(IotDevice $device)
    {
        $this->device = $device;
    }
}
