<?php

namespace YdgTest\Order;

use YdgTest\AbstractTest;

class OrderTest extends AbstractTest
{
    public function test_douke_order_ads()
    {
        $response = $this->getDyUgApp()->order->douke_order_ads([
            'pid' => $this->getPid(),
            'start_time' => date('Y-m-d H:i:s', time() - 60),
            'end_time' => date('Y-m-d H:i:s', time()),
        ]);
        $this->assertIsSuccessResponse($response);
    }
}
