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
        foreach (\array_diff(\array_keys($data), $excludedProperties) as $key) {
            if (isset($data[$key])) {
                $this->{$key} = $data[$key];
            }
        }
    }
}
