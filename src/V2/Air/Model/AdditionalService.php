<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

use Upstain\AmadeusApiClient\V2\EnumInitializer;
use Upstain\AmadeusApiClient\V2\PrimitiveInitializer;

class AdditionalService
{
    use PrimitiveInitializer;
    use EnumInitializer;

    public string $amount = '';
    public AdditionalServiceType $type = AdditionalServiceType::OTHER_SERVICES;

    public function __construct(array $data)
    {
        $this->setProperties($data, ['type']);
        $this->initEnumProperty(AdditionalServiceType::class, $data, 'type', AdditionalServiceType::OTHER_SERVICES);
    }
}
