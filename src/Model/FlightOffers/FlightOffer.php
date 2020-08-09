<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

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
 * @method \Upstain\AmadeusApiClient\Model\FlightOffers\Itinerary[] getItineraries()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffers\Price getPrice()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffers\PricingOptions getPricingOptions()
 * @method string[] getValidatingAirlineCodes()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffers\TravelerPricing[] getTravelerPricings()
 */
class FlightOffer extends FromArrayModelBase
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
            'travelerPricings',
        ];
        parent::__construct($data, $excludedProperties);

        if ($data['itineraries']) {
            foreach ($data['itineraries'] as $itinerary) {
                $this->itineraries[] = new Itinerary($itinerary);
            }
        }

        if ($data['price']) {
            $this->price = new Price($data['price']);
        }

        if ($data['pricingOptions']) {
            $this->pricingOptions = new PricingOptions($data['pricingOptions']);
        }

        if ($data['travelerPricings']) {
            foreach ($data['travelerPricings'] as $travelerPricing) {
                $this->travelerPricings[] = new TravelerPricing($travelerPricing);
            }
        }
    }
}
