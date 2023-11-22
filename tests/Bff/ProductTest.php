<?php

namespace YdgTest\Bff;

use YdgTest\AbstractTest;

class ProductTest extends AbstractTest
{
    public function test_alliance_materials_products_search()
    {
        $response = $this->allianceMaterialsProductsSearch();
        $this->assertIsSuccessResponse($response);
    }

    protected function allianceMaterialsProductsSearch()
    {
        return $this->getDyUgApp()->bff->alliance_materials_products_search();
    }

    public function test_alliance_materials_product_category()
    {
        $response = $this->getDyUgApp()->bff->alliance_materials_product_category([
            'parent_id' => 0,
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_alliance_materials_product_status()
    {
        $products = $this->allianceMaterialsProductsSearch();
        $response = $this->getDyUgApp()->bff->buyin_materials_product_status([
            'products' => [$products['data']['products'][0]['detail_url']],
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_buyin_products_detail()
    {
        $products = $this->allianceMaterialsProductsSearch();
        $response = $this->getDyUgApp()->bff->buyin_products_detail([
            'product_ids' => [$products['data']['products'][0]['product_id']],
            'fields' => "base_info,promotion_info",
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_buyin_kol_product_share()
    {
        $products = $this->allianceMaterialsProductsSearch();
        $response = $this->getDyUgApp()->bff->buyin_kol_product_share([
            'product_url' => $products['data']['products'][0]['detail_url'],
            'pid' => $this->getPid(),
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_buyin_kol_materials_products_search()
    {
        $response = $this->getDyUgApp()->bff->buyin_kol_materials_products_search();
        $this->assertIsSuccessResponse($response);
    }

    public function test_buyin_kol_products_detail()
    {
        $products = $this->getDyUgApp()->bff->buyin_kol_materials_products_search();
        $response = $this->getDyUgApp()->bff->buyin_kol_products_detail([
            'product_ids' => [$products['data']['products'][0]['product_id']],
            'fields' => "base_info,promotion_info",
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_buyin_common_share_command_parse()
    {
        $products = $this->allianceMaterialsProductsSearch();
        $shareInfo = $this->getDyUgApp()->bff->buyin_kol_product_share([
            'product_url' => $products['data']['products'][0]['detail_url'],
            'pid' => $this->getPid(),
        ]);
        $response = $this->getDyUgApp()->bff->buyin_common_share_command_parse([
            'command' => $shareInfo['data']['dy_password'],
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function test_alliance_activity_product_category_list()
    {
        $response = $this->getDyUgApp()->bff->alliance_activity_product_category_list();
        $this->assertIsSuccessResponse($response);
    }
}
