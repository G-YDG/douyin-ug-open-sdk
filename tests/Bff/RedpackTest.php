<?php

namespace YdgTest\Bff;

use YdgTest\AbstractTest;

class RedpackTest extends AbstractTest
{
    public function testDistributionRedpack()
    {
        $materials = $this->getDyUgApp()->bff->buyin_live_share_material([
            'author_type' => 2,
            'page' => 1,
            'page_size' => 100,
            'sort_by' => 2,
            'sort_type' => 0,
            'live_status' => 1
        ]);
        $this->assertIsSuccessResponse($materials);

        $buyin_id = null;
        foreach ($materials['data']['data'] as $material) {
            if ($material['has_redpack']) {
                $buyin_id = $material['buyin_id'];
                break;
            }
        }

        if ($buyin_id) {
            $redpackList = $this->getDyUgApp()->bff->buyin_distribution_redpack_detail_list([
                'buyin_id' => $buyin_id,
            ]);
            $this->assertIsSuccessResponse($redpackList);

            if (!empty($redpackList['data']['redpack_list'])) {
                $shareRedpack = $this->getDyUgApp()->bff->buyin_share_redpack([
                    'redpack_id' => $redpackList['data']['redpack_list'][0]['redpack_id'],
                    'pid' => $this->getPid(),
                ]);
                $this->assertIsSuccessResponse($shareRedpack);
            }
        }
    }
}
