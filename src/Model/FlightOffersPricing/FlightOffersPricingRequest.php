<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersPricing;

use Plumbok\Annotation\Getter;

/**
 * Class FlightOffersPricingRequest
 *
 * @method \Upstain\AmadeusApiClient\Model\FlightOffersPricing\FlightOffersPricing getData()
 */
class FlightOffersPricingRequest
{
    /**
     * @var FlightOffersPricing
     * @Getter
     */
    protected FlightOffersPricing $data;

    /**
     * @var array<string, mixed>
     */
    protected array $rawData;

    /**
     * @param array<string, mixed> $flightOffersSearchResult
     * @return FlightOffersPricingRequest
     */
    public function fromArray(array $flightOffersSearchResult): FlightOffersPricingRequest
    {
        $this->rawData = $flightOffersSearchResult;
        $this->data = new FlightOffersPricing([
            'type' => 'flight-offers-pricing',
            'flightOffers' => $flightOffersSearchResult,
        ]);

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'data' => [
                'type' => 'flight-offers-pricing',
                'flightOffers' => $this->rawData,
            ],
        ];
    }
}
