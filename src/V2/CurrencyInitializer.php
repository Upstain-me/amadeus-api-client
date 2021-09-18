<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2;

use Brick\Money\Currency;

trait CurrencyInitializer
{
    /**
     * @param array<mixed, mixed> $data
     * @param string[] $excludedProperties
     */
    public function setCurrencies(array $data, array $includedProperties = [])
    {
        foreach ($includedProperties as $key) {
            if (isset($data[$key])) {
                $this->{$key} = Currency::of($data[$key]);
            }
        }
    }
}
