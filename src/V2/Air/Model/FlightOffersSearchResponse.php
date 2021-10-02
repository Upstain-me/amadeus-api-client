<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

class FlightOffersSearchResponse
{
    /**
     * @var FlightOffer[]
     */
    public array $data = [];

    /**
     * TODO add raw response and add format method
     * each flight offer should contain the raw offer as well, so that we can use it on the price endpoint
     * it will be nice for logging purposes as well
     * TODO it's possible that this will have to be a service, because it will have to log
     * TODO release schedule of library could involve just all the APIs with raw data format and then formatters afterwards
     * if we have formatters, then those need to be services, and maybe added to the Amadeus entry point object
     */
    public function __construct(array $data = [])
    {
        if (\count($data) > 0) {
            foreach ($data as $offer) {
                $this->data[] = new FlightOffer($offer);
            }
        }
    }
}
