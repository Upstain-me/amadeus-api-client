<?php

namespace Upstain\AmadeusApiClient\Shopping;

use Upstain\AmadeusApiClient\Exception\AmadeusException;
use Upstain\AmadeusApiClient\Model\FlightOffersSearch\FlightOffersSearchRequest;
use Upstain\AmadeusApiClient\Model\FlightOffersSearch\FlightOffersSearchResponse;
use Upstain\AmadeusApiClient\RequestBase;

/**
 * @extends RequestBase<FlightOffersSearchRequest>
 */
class FlightOffersSearch extends RequestBase
{
    /**
     * @param FlightOffersSearchRequest $flightOffersSearchRequest
     *
     * @return FlightOffersSearchResponse
     *
     * @throws AmadeusException
     */
    public function get(FlightOffersSearchRequest $flightOffersSearchRequest): FlightOffersSearchResponse
    {
        return new FlightOffersSearchResponse($this->getRawResponse($flightOffersSearchRequest));
    }

    /**
     * {@inheritDoc}
     */
    protected function doRequest($request): array
    {
        if (!$request instanceof FlightOffersSearchRequest) {
            return [];
        }

        $response = $this->client->getHttpClient()->request(
            'GET',
            $this->client->getConfiguration()->getBaseUrl() . '/v2/shopping/flight-offers',
            [
                'query' => $request->toArray(),
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => $this->client->getTokenType() . ' ' . $this->client->getAccessToken(),
                ],
            ]
        );

        return $response->toArray();
    }

    /**
     * {@inheritDoc}
     */
    protected function throwException(\Throwable $e): AmadeusException
    {
        return AmadeusException::flightOffersSearchError($e);
    }
}
