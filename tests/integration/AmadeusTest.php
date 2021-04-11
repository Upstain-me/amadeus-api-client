<?php

namespace Upstain\AmadeusApiClient\Tests\Integration;

use Codeception\Test\Unit;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Psr\SimpleCache\CacheInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
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

    public function testAuthenticate(): void
    {
        $cache = $this->prophesize(CacheInterface::class);
        $cache->get(Argument::any())->willReturn(null);
        $cache->set(Argument::any(), Argument::any(), Argument::any())->willReturn(function () {
            // no-op
        });
        $amadeus = new Client($this->config, $cache->reveal(), HttpClient::create());
        $authenticatedClient = $amadeus->authenticate();

        self::assertEquals('Bearer', $authenticatedClient->getTokenType());
    }

    public function testFlightOffersSearch(): void
    {
        $response = $this->getJson('flightOffersSearch/response.json');
        $client = $this->prophesize(HttpClientInterface::class);

        $responseObject = $this->prophesize(ResponseInterface::class);
        $responseObject->toArray()->willReturn($response);
        $client->request(Argument::any(), Argument::any(), Argument::any())->willReturn($responseObject->reveal());

        $cache = $this->prophesize(CacheInterface::class);
        $cache->get(Argument::any())->willReturn([
            'expires_in' => 'expires_in',
            'token_type' => 'token_type',
            'access_token' => 'access_token',
        ]);

        $amadeus = new Client($this->config, $cache->reveal(), $client->reveal());
        $authenticatedClient = $amadeus->authenticate();

        $request = new FlightOffersSearchRequest(
            'SYD',
            'BKK',
            new \DateTime(),
        );
        $request->setAdults(1);
        $response = $authenticatedClient->shopping()->flightOfferSearch()->get($request);
        $response = $response->transformRawResponse();

        self::assertEquals(250, $response->getMeta()->getCount());
        self::assertEquals(
            $response->getRawResponse()['dictionaries']['locations'],
            $response->getDictionaries()->getLocations()
        );
        self::assertEquals('GDS', $response->getData()[0]->getSource());
        self::assertCount(250, $response->getData());
    }

    public function testFlightOffersPricing(): void
    {
        $response = $this->getJson('flightOffersPricing/response.json');

        $client = $this->prophesize(HttpClientInterface::class);

        $responseObject = $this->prophesize(ResponseInterface::class);
        $responseObject->toArray()->willReturn($response);
        $client->request(Argument::any(), Argument::any(), Argument::any())->willReturn($responseObject->reveal());

        $cache = $this->prophesize(CacheInterface::class);
        $cache->get(Argument::any())->willReturn([
            'expires_in' => 'expires_in',
            'token_type' => 'token_type',
            'access_token' => 'access_token',
        ]);

        $amadeus = new Client($this->config, $cache->reveal(), $client->reveal());
        $authenticatedClient = $amadeus->authenticate();

        $request = new FlightOffersPricingRequest();

        $body = $this->getJson('flightOffersPricing/request.json');
        $fromArray = $request->fromArray($body);

        $response = $authenticatedClient->shopping()->flightOfferPricing()->post($fromArray);
        $response = $response->transformRawResponse($response->getRawResponse());

        self::assertEquals('flight-offers-pricing', $response->getRawResponse()['data']['type']);

        self::assertEquals('PricingOrFareBasisDiscrepancyWarning', $response->getWarnings()[0]->getTitle());
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
