<?php

namespace App\Events;

use App\Models\Products;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SaveProductEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $product;
    public $data;
    public $images;

    public function __construct($data, $images, $create = true)
    {
        $this->data = $data;
        $this->images = $images;

        if ($create) {
            // Attach the authenticated user's ID to the data
            $this->data['user_id'] = auth()->id();
        }
        // Update or create the product with the provided data
        $this->product = Products::query()->updateOrCreate(
            ['id' => $this->data['id'] ?? null], // Use existing ID or null for new product
            $this->data
        );
        //$this->product = Products::query()->create($this->data);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
