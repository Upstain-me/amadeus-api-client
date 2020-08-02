<?php

namespace Upstain\AmadeusApiClient\Tests\Integration;

use Codeception\Test\Unit;
use Upstain\AmadeusApiClient\Amadeus;
use Upstain\AmadeusApiClient\Configuration;
use Upstain\AmadeusApiClient\PlumbokTrait;

class AmadeusTest extends Unit
{
    use PlumbokTrait;

    public function testAuthenticate()
    {
        $config = new Configuration();
        $config->setClientId($_ENV['AMADEUS_API_CLIENT_ID']);
        $config->setClientSecret($_ENV['AMADEUS_API_CLIENT_SECRET']);
        $amadeusClient = new Amadeus($config);

        $authenticatedClient = $amadeusClient->authenticate();

        self::assertEquals('Bearer', $authenticatedClient->getTokenType());
    }
}
