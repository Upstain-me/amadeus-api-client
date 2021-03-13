<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffers;

use Upstain\AmadeusApiClient\Model\FromArrayModelBase;

class Price extends FromArrayModelBase
{
    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $total;

    /**
     * @var string
     */
    protected $base;

    /**
     * @var Fee[]
     */
    protected $fees;

    /**
     * @var string
     */
    protected $grandTotal;

    /**
     * @var AdditionalService[]
     */
    protected $additionalServices;

    /**
     * @var string
     */
    protected $refundableTaxes;

    /**
     * @var Tax[]
     */
    protected $taxes;

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

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @return Fee[]
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * @return string
     */
    public function getGrandTotal()
    {
        return $this->grandTotal;
    }

    /**
     * @return AdditionalService[]
     */
    public function getAdditionalServices()
    {
        return $this->additionalServices;
    }

    /**
     * @return string
     */
    public function getRefundableTaxes()
    {
        return $this->refundableTaxes;
    }

    /**
     * @return Tax[]
     */
    public function getTaxes()
    {
        return $this->taxes;
    }
}
