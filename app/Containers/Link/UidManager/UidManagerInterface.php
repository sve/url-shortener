<?php
declare(strict_types=1);

namespace App\Containers\Link\UidManager;

interface UidManagerInterface
{
    public function generate(): string;
}
