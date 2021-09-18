<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2;

trait EnumInitializer
{
    public function initEnum(string $enum, array $data, string $key, mixed $defaultValue): mixed
    {
        $value = $defaultValue;
        if (isset($data[$key])) {
            $enumValue = $enum::tryFrom($data[$key]);

            if ($enumValue !== null) {
                $value = $enumValue;
            }
        }

        return $value;
    }
}
