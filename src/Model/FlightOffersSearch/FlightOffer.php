<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersSearch;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\ResponseModelBase;

/**
 * Class FlightOffer
 *
 * @method string getType()
 * @method string getId()
 * @method string getSource()
 * @method bool isInstantTicketingRequired()
 * @method bool isNonHomogeneous()
 * @method bool isOneWay()
 * @method string getLastTicketingDate()
 * @method int getNumberOfBookableSeats()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffersSearch\Itinerary[] getItineraries()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffersSearch\Price getPrice()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffersSearch\PricingOptions getPricingOptions()
 * @method string[] getValidatingAirlineCodes()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffersSearch\TravelerPricing[] getTravelerPricings()
 */
class FlightOffer extends ResponseModelBase
{
    /**
     * @var string
     * @Getter
     */
    protected string $type;

    /**
     * @var string
     * @Getter
     */
    protected string $id;

    /**
     * @var string
     * @Getter
     */
    protected string $source;

    /**
     * @var bool
     * @Getter
     */
    protected bool $instantTicketingRequired;

    /**
     * @var bool
     * @Getter
     */
    protected bool $nonHomogeneous;

    /**
     * @var bool
     * @Getter
     */
    protected bool $oneWay;

    /**
     * @var string
     * @Getter
     */
    protected string $lastTicketingDate;

    /**
     * @var int
     * @Getter
     */
    protected int $numberOfBookableSeats;

    /**
     * @var Itinerary[]
     * @Getter
     */
    protected array $itineraries;

    /**
     * @var Price
     * @Getter
     */
    protected Price $price;

    /**
     * @var PricingOptions
     * @Getter
     */
    protected PricingOptions $pricingOptions;

    /**
     * @var string[]
     * @Getter
     */
    protected array $validatingAirlineCodes;

    /**
     * @var TravelerPricing[]
     * @Getter
     */
    protected array $travelerPricings;

    /**
     * @param mixed $data
     */
    public function __construct($data)
    {
        $excludedProperties = [
            'itineraries',
            'price',
            'pricingOptions',
            'validatingAirlineCodes',
            'travelerPricings',
        ];
        parent::__construct($data, $excludedProperties);

        foreach ($data['itineraries'] as $itinerary) {
            $this->itineraries[] = new Itinerary($itinerary);
        }
    }
}
