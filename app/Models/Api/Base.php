<?php

namespace App\Models\Api;

use Illuminate\Support\Facades\Http;

class Base
{
    /**
     * @var string $domainName
     */
    protected $domainName;

    /**
     * @var string $apiKey
     */
    protected $apiKey;

    /**
     * @var int $pageNumber
     * default: 1
     */
    private $pageNumber = 1;

    /**
     * @var int $pageSize
     * default: 30
     */
    private $pageSize = 30;

    public function __construct()
    {
        $this->domainName = config('api.url');
        $this->apiKey = request()->has('apiKey') ? request()->api_key : $this->apiKey;
        $this->pageNumber = request()->has('page.number') ? request()->get('page')['number'] : $this->pageNumber;
        $this->pageSize = request()->has('page.size') ? request()->get('page')['size'] : $this->pageSize;
    }

    /**
     * Get response from api call
     *
     * @param string $url
     * @return \Illuminate\Http\Client\Response
     */
    public function get($url = '')
    {
        return Http::get($this->domainName . $url, [
            'page[number]' => $this->pageNumber,
            'page[size]' => $this->pageSize,
            'api_key' => $this->apiKey
        ]);
    }
}
