<?php

namespace App\Containers\Link\Tasks;

use App\Containers\Link\UidManager\UidManagerInterface;
use App\Containers\Link\Models\Link as LinkModel;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Redis\RedisManager;
use Predis\Connection\ConnectionException;

/**
 *
 */
class MakeLinkModelTask extends Task
{
    /**
     * @var UidManagerInterface
     */
    protected $hashManager;

    /**
     * @var RedisManager
     */
    protected $redisManager;

    /**
     * @param UidManagerInterface $hashManager
     * @param RedisManager        $redisManager
     */
    public function __construct(UidManagerInterface $hashManager, RedisManager $redisManager)
    {
        $this->hashManager = $hashManager;
        $this->redisManager = $redisManager;
    }

    /**
     * @param  string $url
     * @return LinkModel
     */
    public function run(string $url): LinkModel
    {
        try {
            return new LinkModel(
                [
                'url' => $url,
                'uid' => $this->hashManager->generate(),
                ]
            );
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
