<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

class Fee
{
    public string $amount = '';
    public FeeType $feeType = FeeType::TICKETING;
}
