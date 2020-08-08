<?php

namespace Upstain\AmadeusApiClient\Tests\Integration;

use Codeception\Test\Unit;
use Upstain\AmadeusApiClient\Amadeus;
use Upstain\AmadeusApiClient\Configuration;
use Upstain\AmadeusApiClient\Model\FlightOffersSearch\FlightOffersSearchRequest;
use Upstain\AmadeusApiClient\PlumbokTrait;

class AmadeusTest extends Unit
{
    use PlumbokTrait;

    public function testAuthenticate()
    {
        $config = new Configuration();
        $config->setClientId($_ENV['AMADEUS_API_CLIENT_ID']);
        $config->setClientSecret($_ENV['AMADEUS_API_CLIENT_SECRET']);
        $amadeus = new Amadeus();
        $authenticatedClient = $amadeus->configure($config)->authenticate();

        self::assertEquals('Bearer', $authenticatedClient->getTokenType());
    }

    public function testFlightOffersSearch()
    {
        $config = new Configuration();
        $config->setClientId($_ENV['AMADEUS_API_CLIENT_ID']);
        $config->setClientSecret($_ENV['AMADEUS_API_CLIENT_SECRET']);
        $amadeus = new Amadeus();
        $authenticatedClient = $amadeus->configure($config)->authenticate();

        $request = new FlightOffersSearchRequest();
        $request->setOriginLocationCode('SYD');
        $request->setDestinationLocationCode('BKK');
        $request->setDepartureDate(new \DateTime());
        $request->setAdults(1);
        $response = $authenticatedClient->shopping()->flightOffersSearch($request);

        self::assertEquals($response->getRawResponse()['data'][0]['type'], 'flight-offer');
    }
}
