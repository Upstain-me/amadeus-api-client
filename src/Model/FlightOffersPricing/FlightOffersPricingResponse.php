<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersPricing;

use Upstain\AmadeusApiClient\Model\FlightOffers\FlightOffer;
use Upstain\AmadeusApiClient\Model\FlightOffers\Warning;
use Upstain\AmadeusApiClient\Model\ResponseBase;

class FlightOffersPricingResponse extends ResponseBase
{
    /**
     * @var Warning[]
     */
    private array $warnings;

    /**
     * @var Data
     */
    private Data $data;

    /**
     * @param array $rawResponse
     * @param callable|null $responseDataAdapter
     *
     * @return $this
     */
    public function transformRawResponse(array $rawResponse, ?callable $responseDataAdapter = null): self
    {
        $this->rawResponse = $rawResponse;
        $this->transformDictionaries($rawResponse);

        if (isset($this->rawResponse['warnings'])) {
            foreach ($this->rawResponse['warnings'] as $warning) {
                $this->warnings[] = new Warning($warning);
            }
        }

        if (isset($this->rawResponse['data'])) {
            $data = $this->rawResponse['data'];
            if (isset($data['flightOffers'])) {
                foreach ($data['flightOffers'] as $flightOffer) {
                    $offer = new FlightOffer($flightOffer);
                    if ($responseDataAdapter !== null) {
                        $offer = $responseDataAdapter($flightOffer);
                    }
                    $flightOffers[] = $offer;
                }
            }

            $this->data = new Data($data['type'], $data['bookingRequirements'], $flightOffers);
        }

        return $this;
    }

    /**
     * @return Warning[]
     */
    public function getWarnings(): array
    {
        // TODO try to regenerate this and Meta.
        return $this->warnings;
    }

    /**
     * @return Data
     */
    public function getData(): Data
    {
        return $this->data;
    }
}
