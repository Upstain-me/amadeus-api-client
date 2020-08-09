<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersSearch;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FlightOffers\FlightOffer;
use Upstain\AmadeusApiClient\Model\FlightOffers\Meta;
use Upstain\AmadeusApiClient\Model\ResponseBase;

/**
 * Class FlightOffersSearchResponse
 *
 * @method \Upstain\AmadeusApiClient\Model\FlightOffers\FlightOffer[] getData()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffersSearch\Dictionaries getDictionaries()
 */
class FlightOffersSearchResponse extends ResponseBase
{
    /**
     * @var Meta
     */
    private Meta $meta;

    /**
     * @var \Upstain\AmadeusApiClient\Model\FlightOffers\FlightOffer[]
     * @Getter
     */
    private array $data;

    /**
     * @var Dictionaries
     * @Getter
     */
    private Dictionaries $dictionaries;

    /**
     * @return $this
     */
    public function transformRawResponse(): FlightOffersSearchResponse
    {
        if (isset($this->rawResponse['meta'])) {
            $this->meta = new Meta($this->rawResponse['meta']);
        }
        if (isset($this->rawResponse['dictionaries'])) {
            $this->dictionaries = new Dictionaries($this->rawResponse['dictionaries']);
        }

        if (isset($this->rawResponse['data'])) {
            foreach ($this->rawResponse['data'] as $flightOffer) {
                $offer = new FlightOffer($flightOffer);

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
}
