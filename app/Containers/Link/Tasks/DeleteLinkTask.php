<?php

namespace App\Containers\Link\Tasks;

use App\Containers\Link\Data\Repositories\LinkRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 *
 */
class DeleteLinkTask extends Task
{
    /**
     * @var \App\Containers\Link\Data\Repositories\LinkRepository
     */
    protected $repository;

    /**
     * @param LinkRepository $repository
     */
    public function __construct(LinkRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param  $id
     * @return int
     */
    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        } catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
