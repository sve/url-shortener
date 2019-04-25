<?php
declare(strict_types=1);

namespace App\Containers\Link\UidManager;

use Illuminate\Config\Repository as ConfigRepository;

final class UidManager implements UidManagerInterface
{
    /**
     * @var \Illuminate\Config\Repository
     */
    private $configRepository;

    /**
     * @param ConfigRepository $configRepository
     */
    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    /**
     * @return string
     */
    public function generate(): string
    {
        return uniqid(
            $this->configRepository->get('link-container.uid-manager.prefix'),
            $this->configRepository->get('link-container.uid-manager.entropy')
        );
    }
}
