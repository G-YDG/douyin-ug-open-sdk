<?php

declare(strict_types=1);

namespace Ydg\DouyinUgOpenSdk\Support;

use Psr\Http\Message\ResponseInterface;

class Utils
{
    public static function sha256hmac($key, $data)
    {
        $hash = hash_hmac('sha256', $data, $key, true);
        $hex = unpack('H*', $hash);
        return array_shift($hex);
    }

    public static function arrayToJson(array $params): string
    {
        return json_encode($params, 320);
    }

    public static function jsonResponseToArray(ResponseInterface $response)
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}
