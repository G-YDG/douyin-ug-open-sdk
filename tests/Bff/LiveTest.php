<?php

namespace YdgTest\Bff;

use YdgTest\AbstractTest;

class LiveTest extends AbstractTest
{
    public function test_buyin_live_share_material()
    {
        $response = $this->buyinLiveShareMaterial();
        $this->assertIsSuccessResponse($response);
    }

    protected function buyinLiveShareMaterial($params = [])
    {
        return $this->getDyUgApp()->bff->buyin_live_share_material($params);
    }

    public function test_buyin_institute_live_share()
    {
        $materials = $this->buyinLiveShareMaterial();
        $response = $this->getDyUgApp()->bff->buyin_institute_live_share([
            'pid_info' => [
                'pid' => $this->getPid(),
                'external_info' => 'test_dy_ug_open_sdk',
            ],
            'buyin_id' => $materials['data']['data'][0]['buyin_id'],
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_buyin_institute_live_preview_list()
    {
        $materials = $this->buyinLiveShareMaterial();
        $response = $this->getDyUgApp()->bff->buyin_institute_live_preview_list([
            'buyin_id' => $materials['data']['data'][0]['buyin_id'],
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_buyin_institute_live_preview_share()
    {
        $materials = $this->buyinLiveShareMaterial([
            'page' => 1,
            'page_size' => 100,
            'sort_by' => 2,
            'sort_type' => 0,
            'live_status' => 2
        ]);
        $this->assertIsSuccessResponse($materials);

        $preview_id = null;
        foreach ($materials['data']['data'] as $material) {
            if (!$material['is_live'] && $material['live_preview_auth']) {
                $livePreviewList = $this->getDyUgApp()->bff->buyin_institute_live_preview_list([
                    'buyin_id' => $material['buyin_id'],
                ]);
                if (!empty($livePreviewList['data']['previews'])) {
                    $preview_id = $livePreviewList['data']['previews'][0]['preview_id'];
                    break;
                }
            }
        }

        if ($preview_id) {
            $response = $this->getDyUgApp()->bff->buyin_institute_live_preview_share([
                'live_appointment_id' => $preview_id,
                'pid' => $this->getPid(),
            ]);
            $this->assertIsSuccessResponse($response);
        }
    }

    public function test_buyin_distribution_live_product_list()
    {
        $materials = $this->buyinLiveShareMaterial();
        $response = $this->getDyUgApp()->bff->buyin_distribution_live_product_list([
            'author_buyin_id' => $materials['data']['data'][0]['buyin_id'],
        ]);
        $this->assertIsSuccessResponse($response);
    }
}
