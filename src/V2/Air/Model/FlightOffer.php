<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

use Upstain\AmadeusApiClient\Model\FromArrayModelBase;
use Upstain\AmadeusApiClient\V2\ArrayOfObjectsInitializer;
use Upstain\AmadeusApiClient\V2\EnumInitializer;
use Upstain\AmadeusApiClient\V2\ObjectInitializer;

class FlightOffer extends FromArrayModelBase
{
    use ArrayOfObjectsInitializer;
    use EnumInitializer;
    use ObjectInitializer;

    public string $type = 'flight-offer';
    public string $id = '';
    public FlightOfferSource $source = FlightOfferSource::GDS;
    public bool $instantTicketingRequired = false;
    public bool $disablePricing = false;
    public bool $nonHomogeneous = false;
    public bool $oneWay = false;
    public bool $paymentCardRequired = false;
    public ?\DateTimeInterface $lastTicketingDate;
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

        $this->initEnumProperty(FlightOfferSource::class, $data, 'source', FlightOfferSource::GDS);
        $this->initArray(Itinerary::class, $data, 'itineraries');
        $this->initObjectProperty(\DateTimeImmutable::class, $data, 'lastTicketingDate');
        $this->initObjectProperty(ExtendedPrice::class, $data, 'price');
        $this->initObjectProperty(PricingOptions::class, $data, 'pricingOptions');
        $this->initArray(TravelerPricing::class, $data, 'travelerPricings');
    }
}
