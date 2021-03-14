<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersSearch;

use Upstain\AmadeusApiClient\Model\FlightOffers\FlightOffer;
use Upstain\AmadeusApiClient\Model\FlightOffers\Meta;
use Upstain\AmadeusApiClient\Model\ResponseBase;

class FlightOffersSearchResponse extends ResponseBase
{
    /**
     * @var Meta
     */
    private Meta $meta;

    /**
     * @var FlightOffer[]
     */
    protected array $data;

    /**
     * @param array $rawResponse
     * @param callable|null $responseDataAdapter
     *
     * @return self
     */
    public function transformRawResponse(array $rawResponse, ?callable $responseDataAdapter = null): self
    {
        $this->rawResponse = $rawResponse;
        $this->transformDictionaries($rawResponse);

        if (isset($this->rawResponse['meta'])) {
            $this->meta = new Meta($this->rawResponse['meta']);
        }

        if (isset($this->rawResponse['data'])) {
            foreach ($this->rawResponse['data'] as $flightOffer) {
                $offer = new FlightOffer($flightOffer);

                if ($responseDataAdapter !== null) {
                    $offer = $responseDataAdapter($flightOffer);
                }
                $this->data[] = $offer;
            }
        }

        return $this;
    }

    /**
     * @return Meta
     */
    public function getMeta(): Meta
    {
        return $this->meta;
    }

    /**
     * @return FlightOffer[]|mixed
     */
    public function getData()
    {
        return $this->data;
    }
}
