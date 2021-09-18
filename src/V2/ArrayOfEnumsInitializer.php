<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2;

trait ArrayOfEnumsInitializer
{
    use EnumInitializer;

    public function initArrayOfEnums(string $className, array $data, string $key, mixed $defaultValue)
    {
        if (isset($data[$key]) && \is_array($data[$key]) && \count($data[$key]) > 0) {
            foreach ($data[$key] as $datum) {
                $this->{$key}[] = $this->initEnum($className, $data[$key], $key, $defaultValue);
            }
        }
    }
}
