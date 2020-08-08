<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersSearch;

use Plumbok\Annotation\Getter;
use Plumbok\Annotation\Setter;

/**
 * Class FlightOffersSearchResponse
 *
 * @method array getRawResponse()
 * @method void setRawResponse(array $rawResponse)
 * @method \Upstain\AmadeusApiClient\Model\FlightOffersSearch\Meta getMeta()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffersSearch\FlightOffer[] getData()
 * @method void setData(\Upstain\AmadeusApiClient\Model\FlightOffersSearch\FlightOffer[] $data)
 * @method \Upstain\AmadeusApiClient\Model\FlightOffersSearch\Dictionaries getDictionaries()
 */
class FlightOffersSearchResponse
{
    /**
     * @var array<mixed>
     * @Getter
     * @Setter
     */
    private array $rawResponse;

    /**
     * @var Meta
     * @Getter
     */
    private Meta $meta;

    /**
     * @var FlightOffer[]
     * @Getter
     * @Setter
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
        $this->meta = new Meta($this->rawResponse['meta']);
        $this->dictionaries = new Dictionaries($this->rawResponse['dictionaries']);

        foreach ($this->rawResponse['data'] as $flightOffer) {
            $offer = new FlightOffer($flightOffer);

            $this->data[] = $offer;
        }

        return $this;
    }
}
