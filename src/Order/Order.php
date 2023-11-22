<?php

declare(strict_types=1);

namespace Ydg\DouyinUgOpenSdk\Order;

use Ydg\DouyinUgOpenSdk\DouyinUgClient;

class Order extends DouyinUgClient
{
    /**
     * 分销订单查询
     * @param array $params
     * @return array|null
     * @example params['size'] [非必填]每页订单数目，取值区间： [1, 200]
     * @example params['cursor'] [非必填]下一页索引（第一页传"0"）
     * @example params['start_time'] [非必填]支付时间开始，最早支持90天前，格式：Y-m-d H:i:s
     * @example params['end_time'] [非必填]支付时间结束，格式：Y-m-d H:i:s
     * @example params['order_ids'] [非必填]订单号。多个订单号用英文,分隔，最多支持10个订单号
     * @example params['pid'] [必填]PID
     * @example params['distribution_type'] [非必填]分销类型。Live-直播间，ProductDetail-商品详情，Activity-统一使用ActivityMaterial字段查询活动物料分销订单,超级红包-SuperRedpack
     * @example params['time_type'] [必填]查询时间类型。pay: 支付时间（默认）; update：联盟侧更新时间，非订单状态更新时间
     * @example params['query_order_type'] [必填]不填或者填0：查询分销订单，1：查询比价订单
     */
    public function douke_order_ads(array $params)
    {
        if (isset($params['order_ids']) && is_array($params['order_ids'])) {
            $params['order_ids'] = implode(',', $params['order_ids']);
        }
        $params['size'] = $params['size'] ?? 20;
        $params['cursor'] = $params['cursor'] ?? "0";
        $params['time_type'] = $params['time_type'] ?? 'pay';
        $params['query_order_type'] = $params['query_order_type'] ?? 0;
        return $this->post('/order/douke_order_ads', $params);
    }
}
