<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

class FlightOffer extends FromArrayModelBase
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $source;

    /**
     * @var bool
     */
    protected $instantTicketingRequired;

    /**
     * @var bool
     */
    protected $nonHomogeneous;

    /**
     * @var bool
     */
    protected $oneWay;

    /**
     * @var string
     */
    protected $lastTicketingDate;

    /**
     * @var int
     */
    protected $numberOfBookableSeats;

    /**
     * @var Itinerary[]
     */
    protected $itineraries;

    /**
     * @var Price
     */
    protected $price;

    /**
     * @var PricingOptions
     */
    protected $pricingOptions;

    /**
     * @var string[]
     */
    protected $validatingAirlineCodes;

    /**
     * @var TravelerPricing[]
     */
    protected $travelerPricings;

    /**
     * @var bool
     */
    protected $paymentCardRequired;

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

        if (isset($data['itineraries'])) {
            foreach ($data['itineraries'] as $itinerary) {
                $this->itineraries[] = new Itinerary($itinerary);
            }
        }

        if (isset($data['price'])) {
            $this->price = new Price($data['price']);
        }

        if (isset($data['pricingOptions'])) {
            $this->pricingOptions = new PricingOptions($data['pricingOptions']);
        }

        if (isset($data['travelerPricings'])) {
            foreach ($data['travelerPricings'] as $travelerPricing) {
                $this->travelerPricings[] = new TravelerPricing($travelerPricing);
            }
        }
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return bool
     */
    public function isInstantTicketingRequired()
    {
        return $this->instantTicketingRequired;
    }

    /**
     * @return bool
     */
    public function isNonHomogeneous()
    {
        return $this->nonHomogeneous;
    }

    /**
     * @return bool
     */
    public function isOneWay()
    {
        return $this->oneWay;
    }

    /**
     * @return string
     */
    public function getLastTicketingDate()
    {
        return $this->lastTicketingDate;
    }

    /**
     * @return int
     */
    public function getNumberOfBookableSeats()
    {
        return $this->numberOfBookableSeats;
    }

    /**
     * @return Itinerary[]
     */
    public function getItineraries()
    {
        return $this->itineraries;
    }

    /**
     * @return Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return PricingOptions
     */
    public function getPricingOptions()
    {
        return $this->pricingOptions;
    }

    /**
     * @return string[]
     */
    public function getValidatingAirlineCodes()
    {
        return $this->validatingAirlineCodes;
    }

    /**
     * @return TravelerPricing[]
     */
    public function getTravelerPricings()
    {
        return $this->travelerPricings;
    }

    /**
     * @return bool
     */
    public function isPaymentCardRequired()
    {
        return $this->paymentCardRequired;
    }
}
