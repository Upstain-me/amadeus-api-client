<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2;

trait ObjectInitializer
{
    public function initObjectProperty(string $className, array $data, string $key): void
    {
        if (isset($data[$key])) {
            $this->{$key} = new $className($data[$key]);
        }
    }
}
