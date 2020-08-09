<?php

namespace Upstain\AmadeusApiClient\Shopping;

use Upstain\AmadeusApiClient\CacheConfigInterface;
use Upstain\AmadeusApiClient\Constants\CacheConstant;
use Upstain\AmadeusApiClient\Exception\AmadeusException;
use Upstain\AmadeusApiClient\Model\FlightOffersPricing\FlightOffersPricingRequest;
use Upstain\AmadeusApiClient\Model\FlightOffersPricing\FlightOffersPricingResponse;
use Upstain\AmadeusApiClient\RequestBase;

class FlightOffersPricing extends RequestBase
{
    /**
     * @param FlightOffersPricingRequest $flightOffersPricingRequest
     * @param CacheConfigInterface|null $cacheConfig
     * @return FlightOffersPricingResponse
     * @throws AmadeusException
     */
    public function post(
        FlightOffersPricingRequest $flightOffersPricingRequest,
        ?CacheConfigInterface $cacheConfig = null
    ): FlightOffersPricingResponse {
        $response = new FlightOffersPricingResponse();
        $response->setRawResponse($this->getRawResponse(
            $flightOffersPricingRequest,
            CacheConstant::AMADEUS_FLIGHT_OFFERS_PRICING_CACHE,
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
        if (!$request instanceof FlightOffersPricingRequest) {
            return [];
        }

        $response = $this->httpClient->request(
            'POST',
            $this->client->getConfiguration()->getBaseUrl() . '/v1/shopping/flight-offers/pricing',
            [
                'body' => \json_encode($request->toArray(), JSON_THROW_ON_ERROR),
            ],
        );

        return $response->toArray();
    }

    /**
     * {@inheritDoc}
     */
    protected function throwCacheError(\Throwable $e): void
    {
        throw AmadeusException::flightOffersPricingCacheError($e);
    }

    /**
     * {@inheritDoc}
     */
    protected function throwException(\Throwable $e): void
    {
        throw AmadeusException::flightOffersPricingError($e);
    }
}
