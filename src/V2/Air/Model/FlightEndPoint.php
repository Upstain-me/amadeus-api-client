<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

class FlightEndPoint extends FromArrayModelBase
{
    public string $iataCode = '';
    public string $terminal = '';
    public ?\DateTimeInterface $at;

    public function __construct(array $data)
    {
        $excludedProperties = [
            'at',
        ];
        parent::__construct($data, $excludedProperties);
        $this->at = isset($data['at']) ? new \DateTimeImmutable($data['at']) : null;
    }
}
