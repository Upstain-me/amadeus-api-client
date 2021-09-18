<?php

declare(strict_types=1);

namespace Upstain\AmadeusApiClient\V2\Air\Model;

use Brick\Money\Currency;
use Upstain\AmadeusApiClient\V2\ArrayOfObjectsInitializer;
use Upstain\AmadeusApiClient\V2\CurrencyInitializer;
use Upstain\AmadeusApiClient\V2\PrimitiveInitializer;

class Price
{
    use PrimitiveInitializer;
    use CurrencyInitializer;
    use ArrayOfObjectsInitializer;

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

    public function __construct(array $data)
    {
        $this->setProperties($data, ['currency', 'fees', 'taxes']);
        $this->initArray(Fee::class, $data, 'fees');
        $this->initArray(Tax::class, $data, 'taxes');
        $this->setCurrencies($data, ['currency']);
    }
}
