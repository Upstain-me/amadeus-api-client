<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

class FlightOffer
{
    public string $type = 'flight-offer';
    public string $id = '';
    public FlightOfferSource $flightOfferSource = FlightOfferSource::GDS;
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
}
