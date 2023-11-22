<?php

namespace YdgTest;

use PHPUnit\Framework\TestCase;
use Ydg\DouyinUgOpenSdk\DouyinUg;

abstract class AbstractTest extends TestCase
{
    protected static $app = null;

    public function assertIsSuccessResponse($response)
    {
        $this->assertIsArray($response);
        $this->assertArrayHasKey('data', $response);
        $this->assertArrayHasKey('code', $response);
        $this->assertEquals(0, $response['code']);
    }

    public function getPid(): string
    {
        return getenv('PID');
    }

    protected function getDyUgApp(): DouyinUg
    {
        if (!(self::$app instanceof DouyinUg)) {
            self::$app = new DouyinUg($this->getConfig());
        }
        return self::$app;
    }

    public function getConfig(): array
    {
        return [
            'access_key' => getenv('AK'),
            'secret_key' => getenv('SK'),
        ];
    }
}
