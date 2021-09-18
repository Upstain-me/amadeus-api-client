<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

use Upstain\AmadeusApiClient\V2\PrimitiveInitializer;

class Tax
{
    use PrimitiveInitializer;

    public string $amount = '';
    public string $code = '';

    public function __construct(array $data)
    {
        $this->setProperties($data);
    }
}
