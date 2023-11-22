<?php

declare(strict_types=1);

namespace Ydg\DouyinUgOpenSdk;

use Ydg\FoudationSdk\ServiceContainer;

/**
 * @property Account\Account $account
 * @property Bff\Bff $bff
 * @property Order\Order $order
 */
class DouyinUg extends ServiceContainer
{
    protected $providers = [
        Account\ServiceProvider::class,
        Bff\ServiceProvider::class,
        Order\ServiceProvider::class,
    ];
}
