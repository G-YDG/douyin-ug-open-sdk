<?php

declare(strict_types=1);

namespace Ydg\DouyinUgOpenSdk\Bff;

use Ydg\DouyinUgOpenSdk\DouyinUgClient;

class Bff extends DouyinUgClient
{
    /**
     * 检索精选联盟商品
     * @param array $params
     * @return array|null
     * @example params['title'] [非必填]商品标题,返回标题中包含某个关键词的商品
     * @example params['first_cids'] [非必填]筛选商品一级类目，例：[1,2,3]
     * @example params['second_cids'] [非必填]筛选商品二级类目，例：[11,22,33]
     * @example params['third_cids'] [非必填]筛选商品三级类目，例：[111,222,333]
     * @example params['price_min']⽤⼾[非必填]筛选价格区间-最小值(单位为分)
     * @example params['price_max']⽤⼾[非必填]筛选价格区间-最大值(单位为分)
     * @example params['sell_num_min']⽤⼾[非必填]筛选历史销量区间-最小值
     * @example params['sell_num_max']⽤⼾[非必填]筛选历史销量区间-最大值
     * @example params['search_type']⽤⼾[必填]召回结果排序条件,0默认排序1历史销量排序2价格排序3佣金金额排序4佣金比例排序;
     * @example params['sort_type']⽤⼾[必填]排序顺序(0升序1降序)
     * @example params['cos_fee_min']⽤⼾[非必填]筛选普通佣金区间-最小值(单位为分)
     * @example params['cos_fee_max']⽤⼾[非必填]筛选普通佣金区间-最大值(单位为分)
     * @example params['cos_ratio_min']⽤⼾[非必填]筛选普通佣金率区间-最小值(乘100,例如1.1%为110)
     * @example params['cos_ratio_max']⽤⼾[非必填]筛选普通佣金率区间-最大值(乘100,例如1.1%为110)
     * @example params['page']⽤⼾[必填]分页(从1开始)
     * @example params['page_size']⽤[必填]每页的数量(小于等于20)
     * @example params['share_status']⽤⼾[非必填]获取商品分销状态。1:仅返回可分销商品;0:返回全量商品
     * @example params['activity_id']⽤⼾[非必填]【废弃】推荐使用tag字段
     * @example params['tag']⽤⼾[非必填]商品标签。0:返回全量商品;1:返回超值购商品;2:返回抖音超市(次日达)商品
     */
    public function alliance_materials_products_search(array $params = [])
    {
        $params['search_type'] = $params['search_type'] ?? 0;
        $params['sort_type'] = $params['sort_type'] ?? 1;
        $params['page'] = $params['page'] ?? 1;
        $params['page_size'] = $params['page_size'] ?? 20;
        return $this->post('/bff/alliance/materials_products_search', $params);
    }

    /**
     * 商品类目查询
     * @param array $params
     * @return array|null
     * @example params['parent_id'] [必填]父类目(0表示查询一级类目列表)
     */
    public function alliance_materials_product_category(array $params)
    {
        return $this->post('/bff/alliance/materials_product_category', $params);
    }

    /**
     * 商品状态查询
     * @param array $params
     * @return array|null
     * @example params['products'] [必填]商品URL列表，不超过50个，例：["https://haohuo.jinritemai.com/views/product/detail?id=798754293457134"]
     */
    public function buyin_materials_product_status(array $params)
    {
        return $this->post('/bff/buyin/materials_product_status', $params);
    }

    /**
     * 批量查询推广商品详情
     * @param array $params
     * @return array|null
     * @example params['product_ids'] [必填]商品ID列表(最多20个)，例：[912374674527677]
     * @example params['fields'] [非必填]字段（需要返回的字段，多个用英文逗号隔开。不传只返回商品基础信息，强烈建议按需获取数据），例："base_info,promotion_info"
     */
    public function buyin_products_detail(array $params)
    {
        return $this->post('/bff/buyin/products_detail', $params);
    }

    /**
     * 商品分销转链
     * @param array $params
     * @return array|null
     * @example params['product_url'] [必填]商品URL/口令/短链接
     * @example params['pid'] [必填]达人PID
     * @example params['external_info'] [非必填]自定义字段,只允许数字、字母和,限制长度为40
     * @example params['need_qr_code'] [非必填]是否需要二维码,需要会导致响应耗时增加
     * @example params['platform'] [非必填]回流端标识0:抖音1:抖音极速版
     * @example params['use_coupon'] [非必填]是否返回商品惠后价领券链接(如果商品有优惠则返回,否则不返回)
     * @example params['need_share_link'] [非必填]是否返回站外H5链接
     * @example params['ins_activity_param'] [非必填]团长参数
     */
    public function buyin_kol_product_share(array $params)
    {
        return $this->post('/bff/buyin/kol_product_share', $params);
    }

    /**
     * 检索精选联盟商品
     * @param array $params
     * @return array|null
     * @example params['title'] [非必填]商品标题,返回标题中包含某个关键词的商品
     * @example params['first_cids'] [非必填]筛选商品一级类目，例：[1,2,3]
     * @example params['second_cids'] [非必填]筛选商品二级类目，例：[11,22,33]
     * @example params['third_cids'] [非必填]筛选商品三级类目，例：[111,222,333]
     * @example params['price_min']⽤⼾[非必填]筛选价格区间-最小值(单位为分)
     * @example params['price_max']⽤⼾[非必填]筛选价格区间-最大值(单位为分)
     * @example params['sell_num_min']⽤⼾[非必填]筛选历史销量区间-最小值
     * @example params['sell_num_max']⽤⼾[非必填]筛选历史销量区间-最大值
     * @example params['search_type']⽤⼾[必填]召回结果排序条件,0默认排序1历史销量排序2价格排序3佣金金额排序4佣金比例排序;
     * @example params['sort_type']⽤⼾[必填]排序顺序(0升序1降序)
     * @example params['cos_fee_min']⽤⼾[非必填]筛选普通佣金区间-最小值(单位为分)
     * @example params['cos_fee_max']⽤⼾[非必填]筛选普通佣金区间-最大值(单位为分)
     * @example params['cos_ratio_min']⽤⼾[非必填]筛选普通佣金率区间-最小值(乘100,例如1.1%为110)
     * @example params['cos_ratio_max']⽤⼾[非必填]筛选普通佣金率区间-最大值(乘100,例如1.1%为110)
     * @example params['page']⽤⼾[必填]分页(从1开始)
     * @example params['page_size']⽤[必填]每页的数量(小于等于20)
     * @example params['share_status']⽤⼾[非必填]获取商品分销状态。1:仅返回可分销商品;0:返回全量商品
     * @example params['activity_id']⽤⼾[非必填]【废弃】推荐使用tag字段
     * @example params['tag']⽤⼾[非必填]商品标签。0:返回全量商品;1:返回超值购商品;2:返回抖音超市(次日达)商品
     */
    public function buyin_kol_materials_products_search(array $params = [])
    {
        $params['search_type'] = $params['search_type'] ?? 0;
        $params['sort_type'] = $params['sort_type'] ?? 1;
        $params['page'] = $params['page'] ?? 1;
        $params['page_size'] = $params['page_size'] ?? 20;
        return $this->post('/bff/buyin/kol_materials_products_search', $params);
    }

    /**
     * 达人视角商品详情
     * @param array $params
     * @return array|null
     * @example params['product_ids'] [必填]商品ID列表(最多20个)，例：[912374674527677]
     * @example params['fields'] [非必填]字段（需要返回的字段，多个用英文逗号隔开。不传只返回商品基础信息，强烈建议按需获取数据），例："base_info,promotion_info"
     */
    public function buyin_kol_products_detail(array $params)
    {
        return $this->post('/bff/buyin/kol_products_detail', $params);
    }

    /**
     * 直播间分销物料查询
     * @param array $params
     * @return array|null
     * @example params['author_type'] [非必填]1品牌2达人(默认值)
     * @example params['author_levels'] [非必填]作者电商等级,0-7级,例: [1]
     * @example params['frist_cids'] [非必填]商品行业类目,列表类型,例: [22,33]
     * @example params['author_info'] [非必填]达人昵称或者账号
     * @example params['page'] [必填]分页,1开始
     * @example params['page_size'] [必填]分页大小
     * @example params['sort_by'] [非必填]排序字段:1-综合;2-销量;3-佣金率;4-粉丝数
     * @example params['sort_type'] [非必填]排序方式:0-降序;1-升序
     * @example params['live_status'] [非必填]开关播状态:0:所有,1:开播,2:关播
     */
    public function buyin_live_share_material(array $params = [])
    {
        $params['page'] = $params['page'] ?? 1;
        $params['page_size'] = $params['page_size'] ?? 20;
        return $this->post('/bff/buyin/live_share_material', $params);
    }

    /**
     * 获取达人直播间分享链接
     * @param array $params
     * @return array|null
     * @example params['pid_info'] [必填]PID信息
     * @example params['pid_info']['pid'] [必填]PID信息
     * @example params['pid_info']['external_info'] [非必填]自定义字段，只允许 数字、字母和_，限制长度为40
     * @example params['buyin_id'] [非必填]主播百应ID (buyinId和dy_code最少填一项)
     * @example params['need_qr_code'] [非必填]是否需要二维码(获取二维码将增加响应耗时，推荐false)
     * @example params['dy_code'] [非必填]直播间口令或者短链接（优先级 buyin_id > open_id > dy_code）） (buyinId和dy_code最少填一项)
     * @example params['product_id'] [非必填]直播间绑定的商品id，回流唤起对应商详页
     * @example params['platform'] [非必填回流端标识 0：抖音 1：抖音极速版
     */
    public function buyin_institute_live_share(array $params)
    {
        return $this->post('/bff/buyin/institute_live_share', $params);
    }

    /**
     * 获取直播预告及商品信息列表
     * @param array $params
     * @return array|null
     * @example params['buyin_id'] [必填]要查询的达人的百应ID
     * @example params['need_qr_code'] [非必填]是否需要预告对应的商品信息。需要商品信息会增加接口耗时,默认false
     * @example params['page'] [非必填]分页,1开始
     * @example params['page_size'] [非必填]每页直播预告数量,最大100
     */
    public function buyin_institute_live_preview_list(array $params)
    {
        return $this->post('/bff/buyin/institute_live_preview_list', $params);
    }

    /**
     * 获取达人直播间分享链接
     * @param array $params
     * @return array|null
     * @example params['live_appointment_id'] [必填]直播预告ld
     * @example params['pid'] [必填]PID
     * @example params['buyin_id'] [必填]直播预告对应的达人buyinld
     * @example params['platform'] [非必填]回流端标识 0：抖音 1：抖音极速版
     * @example params['external_info'] [非必填]自定义字段，只允许 数字、字母和_，限制长度为40
     */
    public function buyin_institute_live_preview_share(array $params)
    {
        return $this->post('/bff/buyin/institute_live_preview_share', $params);
    }

    /**
     * 分销直播间商品列表
     * @param array $params
     * @return array|null
     * @example params['author_buyin_id'] [必填]主播的百应ID
     */
    public function buyin_distribution_live_product_list(array $params)
    {
        return $this->post('/bff/buyin/distribution_live_product_list', $params);
    }

    /**
     * 获取活动页物料列表
     * @param array $params
     * @return array|null
     * @example params['page'] [必填]分页（从1开始）
     * @example params['page_size'] [必填]每页的数量（小于等于20）
     * @example params['activity_status'] [非必填]活动状态（不填默认返回进行中活动，1:待开始，2:进行中，3: 已结束）
     */
    public function buyin_douke_activity_material_list(array $params = [])
    {
        $params['page'] = $params['page'] ?? 1;
        $params['page_size'] = $params['page_size'] ?? 20;
        return $this->post('/bff/buyin/douke_activity_material_list', $params);
    }

    /**
     * 活动页转链接口
     * @param array $params
     * @return array|null
     * @example params['material_id'] [必填]活动页物料ID
     * @example params['pid'] [必填]PID
     * @example params['need_qr_code'] [必填]是否需要二维码(生成二维码会增加接口耗时)
     * @example params['external_info'] [非必填]自定义字段，只允许 数字、字母和_，限制长度为40
     * @example params['platform'] [非必填]回流端标识 0：抖音 1：抖音极速版
     * @example params['extra_params'] [非必填]活动页转链自定义参数,json格式,键值都是字符串,例：{"tab_id":"1011"}
     * @example params['product_id'] [非必填]活动页面置顶商品ID(仅支持秒杀、超值购、超市频道)
     */
    public function buyin_douke_activity_share(array $params)
    {
        if (isset($params['extra_params']) && is_array($params['extra_params'])) {
            foreach ($params['extra_params'] as $key => $value) {
                $params['extra_params'][$key] = (string)$value;
            }
            $params['extra_params'] = json_encode($params['extra_params']);
        }
        $params['need_qr_code'] = $params['need_qr_code'] ?? false;
        return $this->post('/bff/buyin/douke_activity_share', $params);
    }

    /**
     * 达人红包详情
     * @param array $params
     * @return array|null
     * @example params['buyin_id'] [必填]查询达人的百应ID
     * @example params['page'] [非必填]起始值为1,不传默认值为1
     * @example params['page_size'] [非必填]最大值20,不传默认值为10
     * @example params['redpack_name'] [非必填]红包名称
     * @example params['start_date'] [非必填]投放开始日期,格式2006-01-02
     * @example params['end_date'] [非必填]投放结束日期,格式2006-01-02
     */
    public function buyin_distribution_redpack_detail_list(array $params)
    {
        return $this->post('/bff/buyin/distribution_redpack_detail_list', $params);
    }

    /**
     * 达人红包详情
     * @param array $params
     * @return array|null
     * @example params['redpack_id'] [必填]红包批次ID
     * @example params['pid'] [必填]pid
     * @example params['external_info'] [非必填]自定义字段，只允许 数字、字母和_，限制长度为40
     * @example params['need_qr_code'] [非必填]是否需要二维码(获取二维码将增加响应耗时,推荐false)
     */
    public function buyin_share_redpack(array $params)
    {
        return $this->post('/bff/buyin/share_redpack', $params);
    }

    /**
     * 解析口令
     * @param array $params
     * @return array|null
     * @example params['command'] [必填]抖口令或短链
     */
    public function buyin_common_share_command_parse(array $params)
    {
        return $this->post('/bff/buyin/common_share_command_parse', $params);
    }

    /**
     * 行业类目查询
     * @param array $params
     * @return array|null
     */
    public function alliance_activity_product_category_list(array $params = [])
    {
        return $this->post('/bff/alliance/activity_product_category_list', $params);
    }
}
