<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

class Co2Emission
{
    public int $weight = 0;
    public WeightUnit $weightUnit = WeightUnit::KG;
    public TravelClass $cabin = TravelClass::ECONOMY;
}
