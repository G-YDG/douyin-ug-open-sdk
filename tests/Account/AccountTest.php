<?php

namespace YdgTest\Account;

use YdgTest\AbstractTest;

class AccountTest extends AbstractTest
{
    public function test_create_pid()
    {
        $response = $this->getDyUgApp()->account->create_pid([
            'site_name' => 'test_sdk'
        ]);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('data', $response);
        $this->assertArrayHasKey('code', $response);
        $this->assertArrayHasKey('message', $response);

        if ($response['code'] == 500) {
            $this->assertTrue(str_starts_with($response['message'], 'Error 1062 (23000): Duplicate entry')); // PID已存在
        } else {
            $this->assertEquals(0, $response['code']);
        }
    }
}
