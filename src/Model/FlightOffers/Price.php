<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Plumbok\Annotation\Getter;
use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

/**
 * Class Price
 *
 * @method string getCurrency()
 * @method string getTotal()
 * @method string getBase()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffers\Fee[] getFees()
 * @method string getGrandTotal()
 * @method \Upstain\AmadeusApiClient\Model\FlightOffers\AdditionalService[] getAdditionalServices()
 * @method string getRefundableTaxes()
 */
class Price extends FromArrayModelBase
{
    /**
     * @var string
     * @Getter
     */
    protected string $currency;

    /**
     * @var string
     * @Getter
     */
    protected string $total;

    /**
     * @var string
     * @Getter
     */
    protected string $base;

    /**
     * @var Fee[]
     * @Getter
     */
    protected array $fees;

    /**
     * @var string
     * @Getter
     */
    protected string $grandTotal;

    /**
     * @var AdditionalService[]
     * @Getter
     */
    protected array $additionalServices;

    /**
     * @var string
     * @Getter
     */
    protected string $refundableTaxes;

    /**
     * @var Tax[]
     */
    protected array $taxes;

    public function __construct($data)
    {
        $excludedProperties = [
            'fees',
            'additionalServices',
        ];
        parent::__construct($data, $excludedProperties);

        if (isset($data['fees'])) {
            foreach ($data['fees'] as $fee) {
                $this->fees[] = new Fee($fee);
            }
        }

        if (isset($data['additionalServices'])) {
            foreach ($data['additionalServices'] as $additionalService) {
                $this->additionalServices[] = new AdditionalService($additionalService);
            }
        }

        // Needed for flight offers pricing API.
        if (isset($data['taxes'])) {
            foreach ($data['taxes'] as $tax) {
                $this->taxes[] = new Tax($tax);
            }
        }
    }
}
