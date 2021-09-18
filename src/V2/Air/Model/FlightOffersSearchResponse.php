<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

class FlightOffersSearchResponse
{
    /**
     * @var FlightOffer[]
     */
    public array $data = [];


    public function __construct(array $data = [])
    {
        if (\count($data) > 0) {
            foreach ($data as $offer) {
                $this->data[] = new FlightOffer($offer);
            }
        }
    }
}
