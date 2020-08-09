<?php

namespace Upstain\AmadeusApiClient\Model;

class FromArrayModelBase
{
    /**
     * @param mixed $data
     * @param string[] $excludedProperties
     */
    public function __construct($data, array $excludedProperties = [])
    {
        foreach ($data as $key => $datum) {
            if (!\in_array($key, $excludedProperties)) {
                $this->{$key} = $datum;
            }
        }
    }
}
