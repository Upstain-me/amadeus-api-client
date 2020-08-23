<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersSearch;

use Upstain\AmadeusApiClient\FlightOffersSearchResponseDecoratorInterface;
use Upstain\AmadeusApiClient\Model\FlightOffers\FlightOffer;
use Upstain\AmadeusApiClient\Model\FlightOffers\Meta;
use Upstain\AmadeusApiClient\Model\ResponseBase;

/**
 * @template T of FlightOffer
 * @package Upstain\AmadeusApiClient\Model\FlightOffersSearch
 */
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
     * @var FlightOffersSearchResponseDecoratorInterface<T>|null
     */
    protected ?FlightOffersSearchResponseDecoratorInterface $decorator = null;

    /**
     * @return $this
     */
    public function transformRawResponse(): FlightOffersSearchResponse
    {
        parent::transformRawResponse();

        if (isset($this->rawResponse['meta'])) {
            $this->meta = new Meta($this->rawResponse['meta']);
        }

        if (isset($this->rawResponse['data'])) {
            foreach ($this->rawResponse['data'] as $flightOffer) {
                $offer = new FlightOffer($flightOffer);

                if ($this->decorator) {
                    $offer = $this->decorator->decorate($flightOffer);
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
     * @return FlightOffer[]
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param FlightOffersSearchResponseDecoratorInterface<T>|null $decorator
     * @return $this
     */
    public function setDecorator(?FlightOffersSearchResponseDecoratorInterface $decorator): FlightOffersSearchResponse
    {
        $this->decorator = $decorator;
        return $this;
    }
}
