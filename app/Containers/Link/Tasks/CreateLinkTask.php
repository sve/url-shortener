<?php

namespace App\Containers\Link\Tasks;

use App\Containers\Link\Data\Repositories\LinkRepository;
use App\Containers\Link\Events\LinkCreatedEvent;
use App\Containers\Link\Models\Link;
use App\Containers\Link\UidManager\UidManager;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Events\Dispatcher;

/**
 *
 */
class CreateLinkTask extends Task
{
    /**
     * @var LinkRepository
     */
    protected $repository;

    /**
     * @var UidManager
     */
    protected $uidManager;

    /**
     * @var Dispatcher
     */
    protected $dispatcher;

    /**
     * @param LinkRepository $repository
     * @param UidManager     $uidManager
     * @param Dispatcher     $dispatcher
     */
    public function __construct(LinkRepository $repository, UidManager $uidManager, Dispatcher $dispatcher)
    {
        $this->repository = $repository;
        $this->uidManager = $uidManager;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param  string $url
     * @return \App\Containers\Link\Models\Link
     */
    public function run(string $url): Link
    {
        try {
            $link = $this->repository->create(
                [
                'url' => $url,
                'uid' => $this->uidManager->generate(),
                ]
            );
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }

        $this->dispatcher->dispatch(new LinkCreatedEvent($link));

        return $link;
    }
}
