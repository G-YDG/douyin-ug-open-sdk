# douyin-ug-open-sdk
let php developer easier to access douyin ug open api

Install the latest version with

```bash
$ composer require ydg/douyin-ug-open-sdk
```

## Basic Usage

```php
<?php

use Ydg\DouyinUgOpenSdk\DouyinUg;

$app = new DouyinUg([
    'access_key' => 'your access_key',
    'secret_key' => 'your secret_key',
]);
$app->bff->alliance_materials_products_search();
```