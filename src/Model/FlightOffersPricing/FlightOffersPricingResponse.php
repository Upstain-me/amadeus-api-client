<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersPricing;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FlightOffers\Warning;
use Upstain\AmadeusApiClient\Model\ResponseBase;

/**
 * Class FlightOffersPricingResponse
 *
 * @method \Upstain\AmadeusApiClient\Model\FlightOffersPricing\Data getData()
 */
class FlightOffersPricingResponse extends ResponseBase
{
    /**
     * @var Warning[]
     */
    private array $warnings;

    /**
     * @var Data
     * @Getter
     */
    private Data $data;

    /**
     * @return $this
     */
    public function transformRawResponse(): FlightOffersPricingResponse
    {
        parent::transformRawResponse();
        if (isset($this->rawResponse['warnings'])) {
            foreach ($this->rawResponse['warnings'] as $warning) {
                $this->warnings[] = new Warning($warning);
            }
        }

        if (isset($this->rawResponse['data'])) {
            $this->data = new Data($this->rawResponse['data']);
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
}
