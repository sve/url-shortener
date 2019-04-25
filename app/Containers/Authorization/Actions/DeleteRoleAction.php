<?php

namespace App\Containers\Authorization\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Authorization\Tasks\FindRoleTask;
use App\Ship\Parents\Actions\Action;
use App\Ship\Transporters\DataTransporter;
use Spatie\Permission\Contracts\Role;

/**
 * Class DeleteRoleAction.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class DeleteRoleAction extends Action
{

    /**
     * @param \App\Ship\Transporters\DataTransporter $data
     *
     * @return \Spatie\Permission\Contracts\Role
     *
     * @throws \Dto\Exceptions\UnstorableValueException
     */
    public function run(DataTransporter $data): Role
    {
        $role = $this->call(FindRoleTask::class, [$data->id]);

        $this->call('Authorization@DeleteRoleTask', [$role]);

        return $role;
    }
}
