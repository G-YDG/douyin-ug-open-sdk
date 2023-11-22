<?php

declare(strict_types=1);

namespace Ydg\DouyinUgOpenSdk\Bff;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     */
    public function register(Container $pimple)
    {
        $pimple['bff'] = function ($pimple) {
            return new Bff(isset($pimple['config']) ? $pimple['config']->toArray() : []);
        };
    }
}
