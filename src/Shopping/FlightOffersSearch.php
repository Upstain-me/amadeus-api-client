<?php

namespace Upstain\AmadeusApiClient\Shopping;

use Upstain\AmadeusApiClient\CacheConfigInterface;
use Upstain\AmadeusApiClient\Constants\CacheConstant;
use Upstain\AmadeusApiClient\Exception\AmadeusException;
use Upstain\AmadeusApiClient\Model\FlightOffersSearch\FlightOffersSearchRequest;
use Upstain\AmadeusApiClient\Model\FlightOffersSearch\FlightOffersSearchResponse;
use Upstain\AmadeusApiClient\RequestBase;

class FlightOffersSearch extends RequestBase
{
    /**
     * @param FlightOffersSearchRequest $flightOffersSearchRequest
     * @param CacheConfigInterface|null $cacheConfig
     * @return FlightOffersSearchResponse
     * @throws AmadeusException
     */
    public function get(
        FlightOffersSearchRequest $flightOffersSearchRequest,
        ?CacheConfigInterface $cacheConfig = null
    ): FlightOffersSearchResponse {
        $response = new FlightOffersSearchResponse();
        $response->setRawResponse($this->getRawResponse(
            $flightOffersSearchRequest,
            CacheConstant::AMADEUS_FLIGHT_OFFERS_SEARCH_CACHE,
            new \DateInterval('PT12H'),
            $cacheConfig
        ));

        return $response;
    }

    /**
     * {@inheritDoc}
     */
    protected function doRequest($request): array
    {
        if (!$request instanceof FlightOffersSearchRequest) {
            return [];
        }

        $response = $this->httpClient->request(
            'GET',
            $this->client->getConfiguration()->getBaseUrl() . '/v2/shopping/flight-offers',
            [
                'query' => $request->toArray(),
            ],
        );

        return $response->toArray();
    }

    /**
     * {@inheritDoc}
     */
    protected function throwCacheError(\Throwable $e): void
    {
        throw AmadeusException::flightOffersSearchCacheError($e);
    }

    /**
     * {@inheritDoc}
     */
    protected function throwException(\Throwable $e): void
    {
        throw AmadeusException::flightOffersSearchError($e);
    }
}
