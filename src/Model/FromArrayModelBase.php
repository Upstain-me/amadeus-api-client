<?php

namespace Upstain\AmadeusApiClient\Model;

class FromArrayModelBase
{
    /**
     * @param array<mixed, mixed> $data
     * @param string[] $excludedProperties
     */
    public function __construct(array $data, array $excludedProperties = [])
    {
        foreach ($data as $key => $datum) {
            if (!\in_array($key, $excludedProperties, true)) {
                $this->{$key} = $datum;
            }
        }
    }
}
