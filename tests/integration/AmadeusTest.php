<?php

namespace Upstain\AmadeusApiClient\Tests\Integration;

use Codeception\Test\Unit;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Psr\SimpleCache\CacheInterface;
use Upstain\AmadeusApiClient\AuthenticatedClient;
use Upstain\AmadeusApiClient\Client;
use Upstain\AmadeusApiClient\Configuration;
use Upstain\AmadeusApiClient\Model\FlightOffersPricing\FlightOffersPricingRequest;
use Upstain\AmadeusApiClient\Model\FlightOffersSearch\FlightOffersSearchRequest;

class AmadeusTest extends Unit
{
    use ProphecyTrait;

    /**
     * @var Configuration
     */
    private $config;

    public function _before(): void
    {
        $this->config = new Configuration(
            'https://test.api.amadeus.com',
            $_ENV['AMADEUS_API_CLIENT_ID'],
            $_ENV['AMADEUS_API_CLIENT_SECRET'],
        );
    }

    public function testAuthenticate(): AuthenticatedClient
    {
        $cache = $this->prophesize(CacheInterface::class);
        $cache->get(Argument::any())->willReturn(null);
        $cache->set(Argument::any(), Argument::any())->willReturn(function () {
            // no-op
        });
        $amadeus = new Client($this->config, $cache->reveal());
        $authenticatedClient = $amadeus->authenticate();

        self::assertEquals('Bearer', $authenticatedClient->getTokenType());

        return $authenticatedClient;
    }

    /**
     * @depends testAuthenticate
     * @param AuthenticatedClient $authenticatedClient
     * @throws \Upstain\AmadeusApiClient\Exception\AmadeusException
     */
    public function testFlightOffersSearch(AuthenticatedClient $authenticatedClient)
    {
        $request = new FlightOffersSearchRequest();
        $request->setOriginLocationCode('SYD');
        $request->setDestinationLocationCode('BKK');
        $request->setDepartureDate(new \DateTime());
        $request->setAdults(1);
        $response = $authenticatedClient->shopping()->flightOfferSearch()->get($request, $this->getCacheConfig())->transformRawResponse();

        self::assertEquals(250, $response->getMeta()->getCount());
        self::assertEquals($response->getRawResponse()['dictionaries']['locations'], $response->getDictionaries()->getLocations());
        self::assertEquals('GDS', $response->getData()[0]->getSource());
        self::assertCount(250, $response->getData());
    }

    /**
     * @depends testAuthenticate
     */
    public function testFlightOffersPricing(AuthenticatedClient $authenticatedClient)
    {
        $request = new FlightOffersPricingRequest();

        $body = $this->getJson('flightOffersPricing/request.json');
        $fromArray = $request->fromArray($body);

        $response = $authenticatedClient->shopping()->flightOfferPricing()->post($fromArray, $this->getCacheConfigPricing());

        self::assertEquals('flight-offers-pricing', $fromArray->getData()->getType());
        self::assertEquals('flight-offer', $fromArray->getData()->getFlightOffers()[0]->getType());

        self::assertEquals('flight-offers-pricing', $response->getRawResponse()['data']['type']);

        self::assertEquals('PricingOrFareBasisDiscrepancyWarning', $response->transformRawResponse()->getWarnings()[0]->getTitle());
    }

    /**
     * @return \Prophecy\Prophecy\ObjectProphecy|CacheConfigInterface
     * @throws \JsonException
     * @throws \Psr\Cache\InvalidArgumentException
     */
    private function getCacheConfigPricing()
    {
        $response = $this->getJson('flightOffersPricing/response.json');
        $cache = $this->prophesize(CacheInterface::class);
        $cache->get(Argument::any(), Argument::any())->willReturn($response);

        $cacheKeyGenerator = $this->prophesize(CacheKeyGeneratorInterface::class);
        $cacheKeyGenerator->generate()->willReturn('test');

        $cacheConfig = $this->prophesize(CacheConfigInterface::class);
        $cacheConfig->getCacheKeyGenerator()->willReturn($cacheKeyGenerator->reveal());
        $cacheConfig->getCache()->willReturn($cache->reveal());

        return $cacheConfig->reveal();
    }

    /**
     * @return object|CacheInterface
     * @throws \JsonException
     * @throws \Psr\Cache\InvalidArgumentException
     */
    private function mockCache()
    {
        $response = $this->getJson('flightOffersSearch/response.json');
        $cache = $this->prophesize(CacheInterface::class);
        $cache->get(Argument::any())->willReturn($response);

        return $cache->reveal();
    }

    /**
     * @param string $relativePath
     *   Relative path to the _data folder.
     * @return mixed
     * @throws \JsonException
     */
    private function getJson(string $relativePath)
    {
        return \json_decode(
            \file_get_contents(__DIR__ . '/../_data/' . $relativePath),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }
}
