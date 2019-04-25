<?php

namespace App\Containers\Link\Actions;

use App\Containers\Link\Models\Link as LinkModel;
use App\Containers\Link\Tasks\FindLinkByIdTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action;
use App\Ship\Transporters\DataTransporter;

/**
 * Class FindLinkByIdAction.
 */
class FindLinkByIdAction extends Action
{
    /**
     * @param DataTransporter $data
     *
     * @return LinkModel
     * @throws \App\Ship\Exceptions\NotFoundException
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function run(DataTransporter $data): LinkModel
    {
        $link = $this->call(FindLinkByIdTask::class, [$data->id]);

        if (! $link) {
            throw new NotFoundException();
        }

        return $link;
    }
}
