<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

use Upstain\AmadeusApiClient\V2\EnumInitializer;
use Upstain\AmadeusApiClient\V2\ObjectInitializer;
use Upstain\AmadeusApiClient\V2\PrimitiveInitializer;

class TravelerPricing
{
    use PrimitiveInitializer;
    use EnumInitializer;
    use ObjectInitializer;

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

    public function __construct(array $data)
    {
        $this->setProperties($data, ['fareOption', 'travelerType', 'price', 'fareDetailsBySegment']);
        $this->initEnumProperty(FareOption::class, $data, 'fareOption', FareOption::STANDARD);
        $this->initEnumProperty(TravelerType::class, $data, 'travelerType', TravelerType::ADULT);
        $this->initObjectProperty(Price::class, $data, 'price');
    }
}
