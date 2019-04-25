<?php

namespace App\Containers\Link\Jobs;

use App\Containers\Link\Events\LinkCreatedEvent;
use App\Containers\Link\Models\Link as LinkModel;
use App\Ship\Parents\Jobs\Job;
use Illuminate\Events\Dispatcher as EventDispatcher;

/**
 * Class SaveLink
 */
class SaveLink extends Job
{
    /**
     * @var array
     */
    private $data;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        //$this->link = new LinkModel($data);
    }

    /**
     * @param  EventDispatcher $dispatcher
     * @return void
     */
    public function handle(EventDispatcher $dispatcher): void
    {
        $link = new LinkModel($this->data);
        $link->save();

        $dispatcher->dispatch(new LinkCreatedEvent($link));
    }
}
