<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

use Upstain\AmadeusApiClient\V2\PrimitiveInitializer;

/**
 * Information about the operating flight
 */
class OperatingFlight
{
    use PrimitiveInitializer;

    public string $carrierCode;

    public function __construct(array $data)
    {
        $this->setProperties($data);
    }
}
