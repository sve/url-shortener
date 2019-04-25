<?php

namespace App\Containers\Link\Actions;

use App\Containers\Link\Models\Link;
use App\Containers\Link\Tasks\CreateLinkTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Transporters\DataTransporter;

/**
 * Class CreateLinkAction.
 */
class CreateLinkAction extends Action
{
    /**
     * @param  \App\Ship\Transporters\DataTransporter $data
     * @return \App\Containers\Link\Models\Link
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function run(DataTransporter $data): Link
    {
        return $this->call(
            CreateLinkTask::class, [
                $data->url,
            ]
        );
    }
}
