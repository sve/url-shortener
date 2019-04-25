<?php

namespace App\Containers\Link\Events;

use App\Containers\link\Models\Link;
use App\Ship\Parents\Events\Event;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Log\Logger;

class LinkCreatedEvent extends Event implements ShouldQueue
{
    /**
     * @var \App\Containers\link\Models\Link
     */
    protected $link;

    /**
     * @param \App\Containers\link\Models\Link $link
     */
    public function __construct(Link $link)
    {
        $this->link = $link;
    }

    /**
     * @param  \Illuminate\Log\Logger $logger
     * @return void
     */
    public function handle(Logger $logger)
    {
        $logger->info(
            sprintf(
                'New link created. Hash: %s | ID: %d',
                $this->link->hash,
                $this->link->id
            )
        );
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
