<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2;

trait ArrayOfObjectsInitializer
{
    public function initArray(string $className, array $data, string $key)
    {
        if (isset($data[$key]) && \is_array($data[$key]) && \count($data[$key]) > 0) {
            foreach ($data[$key] as $datum) {
                $this->{$key}[] = new $className($datum);
            }
        }
    }
}
