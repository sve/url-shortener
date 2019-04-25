<?php

namespace App\Containers\Link\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use App\Ship\Parents\Models\Model;
use Illuminate\Database\Query\Builder;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class UidCriteria.
 */
class UidCriteria extends Criteria
{

    /**
     * @var string
     */
    private $uid;

    /**
     * UidCriteria constructor.
     *
     * @param $uid
     */
    public function __construct($uid)
    {
        $this->uid = $uid;
    }

    /**
     * @param Model                                             $model
     * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where('uid', $this->uid);
    }
}
