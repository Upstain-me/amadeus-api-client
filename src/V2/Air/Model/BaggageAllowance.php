<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

class BaggageAllowance
{
    public int $quantity = 0;
    public int $weight = 0;
    public WeightUnit $weightUnit = WeightUnit::KG;
}
