<?php

namespace YdgTest\Bff;

use YdgTest\AbstractTest;

class ActivityTest extends AbstractTest
{
    public function test_buyin_douke_activity_material_list()
    {
        $response = $this->getDyUgApp()->bff->buyin_douke_activity_material_list();
        $this->assertIsSuccessResponse($response);
    }

    public function test_buyin_douke_activity_share()
    {
        $activity = $this->getDyUgApp()->bff->buyin_douke_activity_material_list();
        $response = $this->getDyUgApp()->bff->buyin_douke_activity_share([
            'material_id' => $activity['data']['activity_material_list'][0]['material_id'],
            'pid' => $this->getPid(),
        ]);
        $this->assertIsSuccessResponse($response);
    }
}
