<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

class FlightOffer extends FromArrayModelBase
{
    public string $type = 'flight-offer';
    public string $id = '';
    public FlightOfferSource $source = FlightOfferSource::GDS;
    public bool $instantTicketingRequired = false;
    public bool $disablePricing = false;
    public bool $nonHomogeneous = false;
    public bool $oneWay = false;
    public bool $paymentCardRequired = false;
    public \DateTimeInterface $lastTicketingDate;
    public int $numberOfBookableSeats = 1;

    /**
     * @var Itinerary[]
     */
    public array $itineraries = [];

    public ExtendedPrice $price;
    public PricingOptions $pricingOptions;

    /**
     * @var string[]
     */
    public array $validatingAirlineCodes = [];

    /**
     * @var TravelerPricing[]
     */
    public array $travelerPricings = [];

    public function __construct(array $data)
    {
        $excludedProperties = [
            'source',
            'lastTicketingDate',
            'itineraries',
            'price',
            'pricingOptions',
            'travelerPricings',
        ];
        parent::__construct($data, $excludedProperties);

        if (isset($data['source'])) {
            $source = FlightOfferSource::tryFrom($data['source']);
            if ($source !== null) {
                $this->source = $source;
            }
        }

        if (isset($data['lastTicketingDate'])) {
            $this->lastTicketingDate = new \DateTimeImmutable($data['lastTicketingDate']);
        }

        if (isset($data['itineraries']) && \is_array($data['itineraries']) && \count($data['itineraries']) > 0) {
            foreach ($data['itineraries'] as $itinerary) {
                $this->itineraries[] = new Itinerary($itinerary);
            }
        }

        $test = 0;
    }
}
