<?php

namespace App\Models\Api;

class Property extends Base
{
    /**
     * @var $urlPath
     */
    protected $urlPath = 'api/properties';

    /**
     * Get list of properties
     *
     * @return array|mixed
     */
    public function getProperties()
    {
        return $this->get($this->urlPath)->json();
    }
}
