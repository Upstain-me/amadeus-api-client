<?php

namespace Upstain\AmadeusApiClient\Tests\Unit;

use Codeception\Test\Unit;
use Upstain\AmadeusApiClient\Configuration;
use Upstain\AmadeusApiClient\PlumbokTrait;

class ConfigurationTest extends Unit
{
    use PlumbokTrait;

    public function testConstruction(): void
    {
        $configuration = new Configuration();

        self::assertEquals('https://test.api.amadeus.com', $configuration->getBaseUrl());
    }
}
