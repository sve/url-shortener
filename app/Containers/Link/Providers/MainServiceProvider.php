<?php

namespace App\Containers\Link\Providers;

use App\Containers\Link\UidManager\UidManager;
use App\Containers\Link\UidManager\UidManagerInterface;
use App\Ship\Parents\Providers\MainProvider;

/**
 * Class MainServiceProvider.
 *
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class MainServiceProvider extends MainProvider
{

    /**
     * Container Service Providers.
     *
     * @var array
     */
    public $serviceProviders = [
        // InternalServiceProviderExample::class,
        // ...
    ];

    /**
     * Container Aliases
     *
     * @var array
     */
    public $aliases = [

    ];

    /**
     * Register anything in the container.
     */
    public function register()
    {
        parent::register();

         $this->app->bind(UidManagerInterface::class, UidManager::class);
    }
}
