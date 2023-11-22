<?php

declare(strict_types=1);

namespace Ydg\DouyinUgOpenSdk\Account;

use Ydg\DouyinUgOpenSdk\DouyinUgClient;

class Account extends DouyinUgClient
{
    /**
     * @param array $params
     * @return array|null
     * @example params['cps_account_id'] [非必填]指定乘风计划id，不填会利用ak自动识别
     * @example params['site_name'] [必填]推广位名称(最长10个字符)，每次新建pid需不同
     */
    public function create_pid(array $params)
    {
        return $this->post('/account/create_pid', $params);
    }
}
