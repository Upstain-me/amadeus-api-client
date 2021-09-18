<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

use Upstain\AmadeusApiClient\V2\EnumInitializer;

class Co2Emission
{
    use EnumInitializer;

    public int $weight = 0;
    public WeightUnit $weightUnit = WeightUnit::KG;
    public TravelClass $cabin = TravelClass::ECONOMY;

    public function __construct(array $data)
    {
        $this->weight = $data['weight'] ?? 0;
        $this->weightUnit = $this->initEnum(WeightUnit::class, $data, 'weightUnit', WeightUnit::KG);
        $this->cabin = $this->initEnum(TravelClass::class, $data, 'cabin', TravelClass::ECONOMY);
    }
}
