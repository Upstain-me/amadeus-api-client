<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

class TravelerPricing
{
    public string $travelerId = '';
    public FareOption $fareOption = FareOption::STANDARD;
    public TravelerType $travelerType = TravelerType::ADULT;

    /**
     * if type="HELD_INFANT", corresponds to the adult traveler's id who will share the seat
     */
    public string $associatedAdultId = '';
    public Price $price;

    /**
     * @var FareDetailsBySegment[]
     */
    public array $fareDetailsBySegment = [];
}
