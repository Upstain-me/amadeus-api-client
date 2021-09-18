<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

class AdditionalServicesRequest
{
    public BaggageAllowance $chargeableCheckedBags;
    public string $chargeableSeatNumber = '';

    /**
     * @var ServiceName[]
     */
    public array $otherServices = [];
}
