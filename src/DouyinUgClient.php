<?php

declare(strict_types=1);

namespace Ydg\DouyinUgOpenSdk;

use Ydg\DouyinUgOpenSdk\Support\Utils;
use Ydg\FoudationSdk\FoundationApi;
use Ydg\FoudationSdk\Traits\HasAttributes;

class DouyinUgClient extends FoundationApi
{
    use HasAttributes;

    protected $baseUri = 'https://usergrowth.com.cn/ecom/open_api';

    /**
     * @param string $method
     * @param array $param
     * @return array|null
     */
    public function post(string $method, array $param)
    {
        $sign = $this->makeSign('auth-v1', $this->offsetGet('access_key'), $this->offsetGet('secret_key'), $param);
        $response = $this->getHttpClient()->json($this->getUri($method), $param, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Agw-Auth' => $sign,
            ],
        ]);
        return Utils::jsonResponseToArray($response);
    }

    protected function makeSign($ver, $ak, $sk, $data, $expiration = 1800): string
    {
        $timestamp = time();
        $signKeyInfo = sprintf("%s/%s/%d/%d", $ver, $ak, $timestamp, $expiration);
        $signKey = Utils::sha256hmac($sk, $signKeyInfo);
        $signResult = Utils::sha256hmac($signKey, json_encode($data));
        return sprintf("%s/%s", $signKeyInfo, $signResult);
    }

    public function getUri(string $method): string
    {
        return $this->getBaseUri() . $method;
    }

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    public function setBaseUri(string $baseUri)
    {
        $this->baseUri = $baseUri;
    }

    public function getHttpClientDefaultOptions(): array
    {
        return [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'verify' => false,
        ];
    }
}
