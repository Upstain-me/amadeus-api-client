<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

use Brick\Money\Currency;

class ExtendedPrice
{
    /**
     * BOOK step ONLY - The price margin percentage (plus or minus) that the booking can tolerate.
     * When set to 0, then no price margin is tolerated.
     */
    public string $margin = '';
    public string $grandTotal = '';
    public Currency $billingCurrency;

    /**
     * @var AdditionalService[]
     */
    public array $additionalServices = [];

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
