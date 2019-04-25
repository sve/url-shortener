<?php

namespace App\Containers\Link\Tasks;

use App\Containers\Link\Data\Repositories\LinkRepository;
use App\Ship\Parents\Tasks\Task;

/**
 *
 */
class GetAllLinksTask extends Task
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
     * @return mixed
     */
    public function run()
    {
        return $this->repository->paginate();
    }
}
