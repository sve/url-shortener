<?php

namespace App\Containers\Link\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use App\Ship\Parents\Models\Model;
use Illuminate\Database\Query\Builder;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class LimitCriteria.
 */
class LimitCriteria extends Criteria
{

    /**
     * @var int
     */
    private $limit;

    /**
     * UidCriteria constructor.
     *
     * @param $limit
     */
    public function __construct(int $limit)
    {
        $this->limit = $limit;
    }

    /**
     * @param Model                                             $model
     * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->limit($this->limit);
    }
}
