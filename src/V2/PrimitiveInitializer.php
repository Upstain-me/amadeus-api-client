<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2;

trait PrimitiveInitializer
{
    /**
     * @param array<mixed, mixed> $data
     * @param string[] $excludedProperties
     */
    public function setProperties(array $data, array $excludedProperties = [])
    {
        foreach ($data as $key => $datum) {
            if (!\in_array($key, $excludedProperties, true)) {
                $this->{$key} = $datum;
            }
        }
    }
}
