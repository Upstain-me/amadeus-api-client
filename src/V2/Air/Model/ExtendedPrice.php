<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

use Brick\Money\Currency;
use Upstain\AmadeusApiClient\V2\ArrayOfObjectsInitializer;
use Upstain\AmadeusApiClient\V2\CurrencyInitializer;
use Upstain\AmadeusApiClient\V2\PrimitiveInitializer;

class ExtendedPrice
{
    use PrimitiveInitializer;
    use CurrencyInitializer;
    use ArrayOfObjectsInitializer;

    /**
     * BOOK step ONLY - The price margin percentage (plus or minus) that the booking can tolerate.
     * When set to 0, then no price margin is tolerated.
     */
    public string $margin = '';
    public string $grandTotal = '';
    public ?Currency $billingCurrency = null;

    /**
     * @var AdditionalService[]
     */
    public array $additionalServices = [];

    public ?Currency $currency = null;
    public string $total = '';
    public string $base = '';

    /**
     * @var Fee[]
     */
    public array $fees = [];

    /**
     * @var Tax[]
     */
    public array $taxes = [];

    public string $refundableTaxes = '';

    public function __construct(array $data)
    {
        $excludedProperties = [
            'billingCurrency',
            'currency',
            'additionalServices',
            'fees',
            'taxes',
        ];
        $this->setProperties($data, $excludedProperties);
        $this->setCurrencies($data, ['billingCurrency', 'currency']);
        $this->initArray(AdditionalService::class, $data, 'additionalServices');
        $this->initArray(Fee::class, $data, 'fees');
        $this->initArray(Tax::class, $data, 'tax');
    }
}
