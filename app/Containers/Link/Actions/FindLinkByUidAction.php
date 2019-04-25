<?php

namespace App\Containers\Link\Actions;

use App\Containers\Link\Tasks\FindLinkByUidTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Transporters\DataTransporter;
use App\Ship\Exceptions\NotFoundException;

/**
 * Class FindLinkByUidAction.
 */
class FindLinkByUidAction extends Action
{
    /**
     * @param  \App\Ship\Transporters\DataTransporter $data
     * @return mixed
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function run(DataTransporter $data)
    {
        $link = $this->call(FindLinkByUidTask::class, [$data->uid]);

        if (! $link) {
            throw new NotFoundException();
        }

        return $link;
    }
}
