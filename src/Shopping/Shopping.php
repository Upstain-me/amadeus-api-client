<?php

namespace Upstain\AmadeusApiClient\Shopping;

use Psr\Cache\CacheItemInterface;
use Psr\Cache\InvalidArgumentException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Upstain\AmadeusApiClient\AuthenticatedClient;
use Upstain\AmadeusApiClient\CacheConfigInterface;
use Upstain\AmadeusApiClient\Constants\CacheConstant;
use Upstain\AmadeusApiClient\Exception\AmadeusException;
use Upstain\AmadeusApiClient\Model\FlightOffersSearch\FlightOffersSearchRequest;
use Upstain\AmadeusApiClient\Model\FlightOffersSearch\FlightOffersSearchResponse;

class Shopping
{
    /**
     * @var AuthenticatedClient
     */
    private AuthenticatedClient $client;

    /**
     * @param AuthenticatedClient $client
     */
    public function __construct(AuthenticatedClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param FlightOffersSearchRequest $flightOffersSearchRequest
     * @param CacheConfigInterface|null $cacheConfig
     * @return FlightOffersSearchResponse
     * @throws AmadeusException
     */
    public function flightOffersSearch(
        FlightOffersSearchRequest $flightOffersSearchRequest,
        ?CacheConfigInterface $cacheConfig = null
    ): FlightOffersSearchResponse {
        if ($cacheConfig) {
            try {
                return $cacheConfig->getCache()->get(
                    \implode('_', [
                        CacheConstant::AMADEUS_FLIGHT_OFFERS_SEARCH_CACHE,
                        $cacheConfig->getCacheKeyGenerator()->generate()
                    ]),
                    fn (CacheItemInterface $item): FlightOffersSearchResponse => $this->cacheCallback(
                        $item,
                        $flightOffersSearchRequest
                    )
                );
            } catch (InvalidArgumentException $e) {
                throw AmadeusException::flightOffersSearchCacheError($e);
            }
        }

        return $this->request($flightOffersSearchRequest);
    }

    /**
     * @param CacheItemInterface $item
     * @param FlightOffersSearchRequest $flightOffersSearchRequest
     * @return FlightOffersSearchResponse
     * @throws AmadeusException
     */
    protected function cacheCallback(
        CacheItemInterface $item,
        FlightOffersSearchRequest $flightOffersSearchRequest
    ): FlightOffersSearchResponse {
        $token = $this->request($flightOffersSearchRequest);
        $item->expiresAfter(new \DateInterval('P1D'));

        return $token;
    }

    /**
     * @param FlightOffersSearchRequest $flightOffersSearchRequest
     * @return FlightOffersSearchResponse
     * @throws AmadeusException
     */
    protected function request(FlightOffersSearchRequest $flightOffersSearchRequest): FlightOffersSearchResponse
    {
        try {
            $client = HttpClient::create([
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => $this->client->getTokenType() . ' ' . $this->client->getAccessToken(),
                ],
            ]);

            $response = $client->request(
                'GET',
                $this->client->getConfiguration()->getBaseUrl() . '/v2/shopping/flight-offers',
                [
                    'query' => $flightOffersSearchRequest->toArray(),
                ],
            );
            $content = $response->toArray(false);

            $response = new FlightOffersSearchResponse();
            $response->setRawResponse($content);

            return $response;
        } catch (ClientExceptionInterface |
            DecodingExceptionInterface |
            RedirectionExceptionInterface |
            ServerExceptionInterface |
            TransportExceptionInterface $e
        ) {
            throw AmadeusException::flightOffersSearchError($e);
        }
    }
}
