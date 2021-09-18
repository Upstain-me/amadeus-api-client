<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

use Upstain\AmadeusApiClient\V2\EnumInitializer;
use Upstain\AmadeusApiClient\V2\PrimitiveInitializer;

class Fee
{
    use PrimitiveInitializer;
    use EnumInitializer;

    public string $amount = '';
    public FeeType $feeType = FeeType::TICKETING;

    public function __construct(array $data)
    {
        $this->setProperties($data, ['feeType']);
        $this->initEnumProperty(FeeType::class, $data, 'feeType', FeeType::TICKETING);
    }
}
