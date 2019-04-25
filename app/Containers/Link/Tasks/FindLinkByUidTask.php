<?php

namespace App\Containers\Link\Tasks;

use App\Containers\Link\Data\Criterias\LimitCriteria;
use App\Containers\Link\Data\Criterias\UidCriteria;
use App\Containers\Link\Data\Repositories\LinkRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 *
 */
class FindLinkByUidTask extends Task
{
    /**
     * @var LinkRepository
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
     * @param  $uid
     * @return mixed
     */
    public function run($uid)
    {
        try {
            $this->repository->pushCriteria(new LimitCriteria(1));
            $this->repository->pushCriteria(new UidCriteria($uid));

            return $this->repository->first();
        } catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
