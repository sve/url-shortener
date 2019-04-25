<?php

namespace App\Containers\Link\Actions;

use App\Containers\Link\Tasks\FindLinkUrlByUidTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Transporters\DataTransporter;
use App\Ship\Exceptions\NotFoundException;

/**
 * Class FindLinkUrlByUidAction.
 */
class FindLinkUrlByUidAction extends Action
{
    /**
     * @param  \App\Ship\Transporters\DataTransporter $data
     * @return string
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function run(DataTransporter $data): string
    {
        $link = $this->call(FindLinkUrlByUidTask::class, [$data->uid]);

        if (! $link) {
            throw new NotFoundException();
        }

        return $link;
    }
}
