<?php

declare(strict_types=1);

namespace Ydg\DouyinUgOpenSdk\Order;

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
        $pimple['order'] = function ($pimple) {
            return new Order(isset($pimple['config']) ? $pimple['config']->toArray() : []);
        };
    }
}
