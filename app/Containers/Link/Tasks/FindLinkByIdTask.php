<?php

namespace App\Containers\Link\Tasks;

use App\Containers\Link\Data\Repositories\LinkRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 *
 */
class FindLinkByIdTask extends Task
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
     * @return mixed
     */
    public function run($id)
    {
        try {
            return $this->repository->find($id);
        } catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
