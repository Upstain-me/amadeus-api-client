<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

class AdditionalService
{
    public string $amount = '';
    public AdditionalServiceType $type = AdditionalServiceType::OTHER_SERVICES;
}
