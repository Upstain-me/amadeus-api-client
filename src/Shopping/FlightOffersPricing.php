<?php

namespace Upstain\AmadeusApiClient\Shopping;

use Upstain\AmadeusApiClient\Exception\AmadeusException;
use Upstain\AmadeusApiClient\Model\FlightOffersPricing\FlightOffersPricingRequest;
use Upstain\AmadeusApiClient\Model\FlightOffersPricing\FlightOffersPricingResponse;
use Upstain\AmadeusApiClient\RequestBase;

/**
 * @extends RequestBase<FlightOffersPricingRequest>
 */
class FlightOffersPricing extends RequestBase
{
    /**
     * @param FlightOffersPricingRequest $flightOffersPricingRequest
     *
     * @return FlightOffersPricingResponse
     *
     * @throws AmadeusException
     */
    public function post(FlightOffersPricingRequest $flightOffersPricingRequest): FlightOffersPricingResponse
    {
        return new FlightOffersPricingResponse(
            $this->getRawResponse($flightOffersPricingRequest)
        );
    }

    /**
     * {@inheritDoc}
     */
    protected function doRequest($request): array
    {
        if (!$request instanceof FlightOffersPricingRequest) {
            return [];
        }

        $response = $this->client->getHttpClient()->request(
            'POST',
            $this->client->getConfiguration()->getBaseUrl() . '/v1/shopping/flight-offers/pricing',
            [
                'body' => \json_encode($request->toArray(), JSON_THROW_ON_ERROR),
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => $this->client->getTokenType() . ' ' . $this->client->getAccessToken(),
                ],
            ],
        );

        return $response->toArray();
    }

    /**
     * {@inheritDoc}
     */
    protected function throwException(\Throwable $e): AmadeusException
    {
        return AmadeusException::flightOffersPricingError($e);
    }
}
