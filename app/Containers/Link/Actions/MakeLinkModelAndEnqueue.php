<?php

namespace App\Containers\Link\Actions;

use App\Containers\Link\Jobs\SaveLink as SaveLinkJob;
use App\Containers\Link\Models\Link as LinkModel;
use App\Containers\Link\Tasks\MakeLinkModelTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Contracts\Bus\Dispatcher;

class MakeLinkModelAndEnqueue extends Action
{
    /**
     * @var Dispatcher
     */
    protected $dispatcher;

    /**
     * @param Dispatcher $dispatcher
     */
    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param  DataTransporter $data
     * @return LinkModel
     *
     * @throws \Exception
     */
    public function run(DataTransporter $data): LinkModel
    {
        /**
         * @var LinkModel $link
         */
        $link = $this->call(
            MakeLinkModelTask::class, [
            $data->url,
            ]
        );

        $this->dispatcher->dispatch(new SaveLinkJob($link->toArray()));

        return $link;
    }
}
