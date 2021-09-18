<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

use Brick\Money\Currency;

class Price
{
    public Currency $currency;
    public string $total = '';
    public string $base = '';

    /**
     * @var Fee[]
     */
    public array $fees = [];

    /**
     * @var Tax[]
     */
    public array $taxes;

    public string $refundableTaxes = '';
}
