<?php

namespace Upstain\AmadeusApiClient\Model\FlightOffersSearch;

use Plumbok\Annotation\Getter;
use Plumbok\Annotation\Setter;

/**
 * Class FlightOffersSearchRequest
 *
 * @method string getOriginLocationCode()
 * @method void setOriginLocationCode(string $originLocationCode)
 * @method string getDestinationLocationCode()
 * @method void setDestinationLocationCode(string $destinationLocationCode)
 * @method \DateTimeInterface getDepartureDate()
 * @method void setDepartureDate(\DateTimeInterface $departureDate)
 * @method \DateTimeInterface|null getReturnDate()
 * @method void setReturnDate(\DateTimeInterface|null $returnDate)
 * @method int getAdults()
 * @method void setAdults(int $adults)
 * @method int getChildren()
 * @method void setChildren(int $children)
 * @method int getInfants()
 * @method void setInfants(int $infants)
 * @method string|null getTravelClass()
 * @method void setTravelClass(string|null $travelClass)
 * @method string[] getIncludedAirlineCodes()
 * @method void setIncludedAirlineCodes(string[] $includedAirlineCodes)
 * @method string[] getExcludedAirlineCodes()
 * @method void setExcludedAirlineCodes(string[] $excludedAirlineCodes)
 * @method bool isNonStop()
 * @method void setNonStop(bool $nonStop)
 * @method string getCurrencyCode()
 * @method void setCurrencyCode(string $currencyCode)
 * @method int|null getMaxPrice()
 * @method void setMaxPrice(int|null $maxPrice)
 * @method int getMax()
 * @method void setMax(int $max)
 */
class FlightOffersSearchRequest
{
    /**
     * @var string
     * @Getter
     * @Setter
     */
    private string $originLocationCode;

    /**
     * @var string
     * @Getter
     * @Setter
     */
    private string $destinationLocationCode;

    /**
     * @var \DateTimeInterface
     * @Getter
     * @Setter
     */
    private \DateTimeInterface $departureDate;

    /**
     * @var \DateTimeInterface|null
     * @Getter
     * @Setter
     */
    private ?\DateTimeInterface $returnDate = null;

    /**
     * @var int
     * @Getter
     * @Setter
     */
    private int $adults = 1;

    /**
     * @var int
     * @Getter
     * @Setter
     */
    private int $children = 0;

    /**
     * @var int
     * @Getter
     * @Setter
     */
    private int $infants = 0;

    /**
     * TODO implement support for enum.
     *
     * @var string|null
     * @Getter
     * @Setter
     */
    private ?string $travelClass = null;

    /**
     * @var array<string>
     * @Getter
     * @Setter
     */
    private array $includedAirlineCodes = [];

    /**
     * @var array<string>
     * @Getter
     * @Setter
     */
    private array $excludedAirlineCodes = [];

    /**
     * @var bool
     * @Getter
     * @Setter
     */
    private bool $nonStop = false;

    /**
     * @var string
     * @Getter
     * @Setter
     */
    private string $currencyCode = 'EUR';

    /**
     * @var int|null
     * @Getter
     * @Setter
     */
    private ?int $maxPrice = null;

    /**
     * @var int
     * @Getter
     * @Setter
     */
    private int $max = 250;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $optionalArguments = [];

        $returnDate = $this->getReturnDate();
        if ($returnDate) {
            $optionalArguments['returnDate'] = $returnDate->format('Y-m-d');
        }

        if ($this->getTravelClass()) {
            $optionalArguments['travelClass'] = $this->getTravelClass();
        }

        if ($this->getIncludedAirlineCodes()) {
            $optionalArguments['includedAirlineCodes'] = \implode(',', $this->getIncludedAirlineCodes());
        }

        if ($this->getExcludedAirlineCodes()) {
            $optionalArguments['excludedAirlineCodes'] = \implode(',', $this->getExcludedAirlineCodes());
        }

        if ($this->getMaxPrice()) {
            $optionalArguments['maxPrice'] = $this->getMaxPrice();
        }

        return \array_merge(
            [
                'originLocationCode' => $this->getOriginLocationCode(),
                'destinationLocationCode' => $this->getDestinationLocationCode(),
                'departureDate' => $this->getDepartureDate()->format('Y-m-d'),
                'adults' => $this->getAdults(),
                'children' => $this->getChildren(),
                'infants' => $this->getInfants(),
                'nonStop' => $this->isNonStop() ? 'true' : 'false',
                'currencyCode' => $this->getCurrencyCode(),
                'max' => $this->getMax(),
            ],
            $optionalArguments
        );
    }
}
